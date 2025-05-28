   <!-- Stats and Goals -->
   <div class="mt-8 mb-12 grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Spending Analysis -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-200">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Spending Analysis</h3>
        </div>
        <div class="p-6">
            <canvas id="spendingChart" class="w-full h-64"></canvas>
        </div>
    </div>

    <!-- Savings Goals -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-200">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Savings Goals</h3>
        </div>
        <div class="p-6 space-y-4">
            <!-- Goal 1 -->
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-base font-medium text-gray-700">Vacation</span>
                    <span class="text-sm font-medium text-gray-500">NGN  1,200 / NGN  3,000</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-indigo-600 h-2 rounded-full" style="width: 40%"></div>
                </div>
            </div>
            
            <!-- Goal 2 -->
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-base font-medium text-gray-700">New Laptop</span>
                    <span class="text-sm font-medium text-gray-500">NGN  850 / NGN  1,500</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-indigo-600 h-2 rounded-full" style="width: 57%"></div>
                </div>
            </div>
            
            <!-- Goal 3 -->
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-base font-medium text-gray-700">Emergency Fund</span>
                    <span class="text-sm font-medium text-gray-500">NGN  5,300 / NGN 10,000</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-indigo-600 h-2 rounded-full" style="width: 53%"></div>
                </div>
            </div>
            
            <!-- Add New Goal Button -->
            <button class="mt-4 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Add New Goal
            </button>
        </div>
    </div>
</div>


  <!-- JavaScript for Charts -->
  <script>
    // Initialize Feather Icons
    feather.replace();
    
    // Balance Chart
    const balanceCtx = document.getElementById('balanceChart').getContext('2d');
    const balanceChart = new Chart(balanceCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Balance',
                data: [6200, 6800, 7400, 8100, 8459],
                borderColor: 'rgba(255, 255, 255, 0.8)',
                backgroundColor: 'rgba(255, 255, 255, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    display: false
                },
                y: {
                    display: false
                }
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        }
    });

    // Spending Chart
    const spendingCtx = document.getElementById('spendingChart').getContext('2d');
    const spendingChart = new Chart(spendingCtx, {
        type: 'doughnut',
        data: {
            labels: ['Housing', 'Food', 'Transportation', 'Entertainment', 'Utilities', 'Others'],
            datasets: [{
                data: [35, 20, 15, 10, 12, 8],
                backgroundColor: [
                    '#4f46e5',
                    '#818cf8',
                    '#a5b4fc',
                    '#c7d2fe',
                    '#ddd6fe',
                    '#f5f3ff'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
</script>

