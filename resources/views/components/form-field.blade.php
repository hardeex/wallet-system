<!-- resources/views/components/form-field.blade.php -->
<div class="{{ $colSpan ?? 'sm:col-span-3' }}">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }} @if($required)<span class="text-red-500">*</span>@endif</label>
    <div class="mt-1 {{ $icon ? 'relative' : '' }} rounded-md shadow-sm">
        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <x-icon :name="$icon" class="h-5 w-5 text-gray-400" />
            </div>
        @endif
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            @if($required) required @endif
            class="focus:ring-blue-500 focus:border-blue-500 block w-full {{ $icon ? 'pl-10' : '' }} sm:text-sm border-gray-300 rounded-md"
            placeholder="{{ $placeholder }}"
            value="{{ old($name) }}"
        >
    </div>
    <p class="error-message mt-1 text-sm text-red-600 hidden" id="{{ $name }}-error"></p>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>