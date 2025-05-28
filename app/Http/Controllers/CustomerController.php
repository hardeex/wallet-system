<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        return view('welcome');
    }


    public function showCreateForm()
    {
        return view('customers.create');
    }


    public function dashboard()
    {
        return view('dashboard');
    }
    /**
     * Create a new Paystack customer
     *
     * @param Request $request
     * @return JsonResponse
     */
   
   
   public function createCustomer2(Request $request): RedirectResponse
{
    try {
        // Validate incoming request data
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'metadata' => 'nullable|array',
            'metadata.*.key' => 'nullable|string|max:255',
            'metadata.*.value' => 'nullable|string|max:255',
        ]);

        // Prepare payload for Paystack API
        $payload = [
            'email' => $validatedData['email'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
        ];

        // Only include metadata if it has valid key-value pairs
        $metadata = $this->formatMetadata($validatedData['metadata'] ?? []);
        if (!empty($metadata)) {
            $payload['metadata'] = $metadata;
        }

        // Check for duplicate
        $existingCustomer = Customer::where('email', $validatedData['email'])->first();
        if ($existingCustomer) {
            return redirect()->back()->with('error', 'Customer with this email already exists.');
        }

        // Get Paystack API configuration
        $apiUrl = config('api.base_url') . '/customer';
        $secretKey = env('PAYSTACK_SECRET_KEY');

        // Log the payload for debugging
        Log::info('Paystack customer creation payload', [
            'email' => $validatedData['email'],
            'url' => $apiUrl,
            'payload' => $payload
        ]);

        // Log the raw JSON payload
        Log::debug('Paystack raw request payload', [
            'payload' => json_encode($payload)
        ]);

        // Make API request to Paystack
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secretKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($apiUrl, $payload);

        // Handle API response
        if ($response->successful()) {
            $responseData = $response->json();

            if (isset($responseData['status']) && $responseData['status'] === true) {
                $customerData = $responseData['data'];

                // Save to database
                $customer = Customer::create([
                    'customer_code' => $customerData['customer_code'],
                    'email' => $customerData['email'],
                    'first_name' => $validatedData['first_name'],
                    'last_name' => $validatedData['last_name'],
                    'phone' => $validatedData['phone'],
                    'metadata' => !empty($metadata) ? $metadata : null,
                    'integration' => $customerData['integration'] ?? null,
                ]);

                // Store customer data securely in cache (optional)
                $customerId = $customerData['customer_code'];
                $encryptedCustomerData = Crypt::encrypt([
                    'customer_code' => $customerId,
                    'email' => $customerData['email'],
                    'integration' => $customerData['integration'] ?? null,
                ]);

                Cache::put(
                    'customer_' . $customerId,
                    $encryptedCustomerData,
                    now()->addHours(24)
                );

                // Store minimal data in session for immediate use
                session([
                    'customer_id' => $customerId,
                    'customer_email' => $customerData['email'],
                ]);

                // Redirect back with success message
                return redirect()->back()->with('success', 'Customer created successfully with ID: ' . $customerId);
            }

            // Handle unexpected successful response format
            Log::warning('Unexpected Paystack response format', [
                'response' => $responseData
            ]);

            return redirect()->back()->with('error', 'Unable to process customer creation. Please try again.');
        }

        // Handle API errors
        $errorData = $response->json();
        Log::error('Paystack API error', [
            'status' => $response->status(),
            'error' => $errorData
        ]);

        $errorMessage = $errorData['message'] ?? 'Failed to create customer. Please try again.';

        return redirect()->back()->with('error', $errorMessage);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();

    } catch (\Exception $e) {
        Log::error('Unexpected error in customer creation', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}

/**
 * Format metadata to ensure it's an associative array (encodes to JSON object)
 */
private function formatMetadata2(array $metadata): array
{
    $formatted = [];
    foreach ($metadata as $item) {
        if (isset($item['key'], $item['value']) && is_string($item['key']) && $item['key'] !== '') {
            $formatted[$item['key']] = $item['value'];
        }
    }
    return $formatted;
}




public function createCustomer(Request $request): RedirectResponse
{
    // Require authentication
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please log in to create a customer.');
    }

    try {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'metadata' => 'nullable|array',
            'metadata.*.key' => 'nullable|string|max:255',
            'metadata.*.value' => 'nullable|string|max:255',
        ]);

        // Check for existing customer with this email for the user
        $existingCustomer = Customer::where('email', $validatedData['email'])
            ->where('user_id', auth()->id())
            ->first();
        if ($existingCustomer) {
            return redirect()->back()->with('error', 'Customer with this email already exists.');
        }

        $payload = [
            'email' => $validatedData['email'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
        ];

        $metadata = $this->formatMetadata($validatedData['metadata'] ?? []);
        if (!empty($metadata)) {
            $payload['metadata'] = $metadata;
        }

        $apiUrl = config('api.base_url') . '/customer';
        $secretKey = env('PAYSTACK_SECRET_KEY');

        Log::info('Paystack customer creation payload', [
            'email' => $validatedData['email'],
            'url' => $apiUrl,
            'payload' => $payload
        ]);

        Log::debug('Paystack raw request payload', [
            'payload' => json_encode($payload)
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secretKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($apiUrl, $payload);

        if ($response->successful()) {
            $responseData = $response->json();

            if (isset($responseData['status']) && $responseData['status'] === true) {
                $customerData = $responseData['data'];

                // Save to database
                $customer = Customer::create([
                    'user_id' => auth()->id(),
                    'customer_code' => $customerData['customer_code'],
                    'email' => $customerData['email'],
                    'first_name' => $validatedData['first_name'],
                    'last_name' => $validatedData['last_name'],
                    'phone' => $validatedData['phone'],
                    'metadata' => !empty($metadata) ? $metadata : null,
                    'integration' => $customerData['integration'] ?? null,
                ]);

                // Cache customer data
                $customerId = $customerData['customer_code'];
                $encryptedCustomerData = Crypt::encrypt([
                    'customer_code' => $customerId,
                    'email' => $customerData['email'],
                    'integration' => $customerData['integration'] ?? null,
                ]);

                Cache::put(
                    'customer_' . $customerId,
                    $encryptedCustomerData,
                    now()->addHours(24)
                );

                session([
                    'customer_id' => $customerId,
                    'customer_email' => $customerData['email'],
                ]);

                return redirect()->back()->with('success', 'Customer created successfully with ID: ' . $customerId);
            }

            Log::warning('Unexpected Paystack response format', [
                'response' => $responseData
            ]);

            return redirect()->back()->with('error', 'Unable to process customer creation. Please try again.');
        }

        $errorData = $response->json();
        Log::error('Paystack API error', [
            'status' => $response->status(),
            'error' => $errorData
        ]);

        $errorMessage = $errorData['message'] ?? 'Failed to create customer. Please try again.';
        return redirect()->back()->with('error', $errorMessage);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        Log::error('Unexpected error in customer creation', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}

private function formatMetadata(array $metadata): array
{
    $formatted = [];
    foreach ($metadata as $item) {
        if (isset($item['key'], $item['value']) && is_string($item['key']) && $item['key'] !== '') {
            $formatted[$item['key']] = $item['value'];
        }
    }
    return $formatted;
}



// end of the class
}
