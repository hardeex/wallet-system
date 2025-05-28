<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-gray-900">WalletPay</h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 text-gray-400 hover:text-gray-500 relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 h-3 w-3 bg-red-500 rounded-full"></span>
                    </button>
                    <div class="flex items-center space-x-3">
                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile">
                        <span class="text-sm font-medium text-gray-700 hidden sm:block">John Doe</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Balance Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Main Balance -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-6 text-white col-span-1 md:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-blue-100">Total Balance</h3>
                    <i class="fas fa-wallet text-blue-200"></i>
                </div>
                <div class="mb-2">
                    <span class="text-3xl font-bold">$12,847.50</span>
                </div>
                <div class="flex items-center space-x-4 text-sm text-blue-100">
                    <span class="flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>
                        +5.2% from last month
                    </span>
                </div>
            </div>

            <!-- Income -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-600">Income</h3>
                    <div class="p-2 bg-green-100 rounded-lg">
                        <i class="fas fa-arrow-down text-green-600"></i>
                    </div>
                </div>
                <div class="mb-2">
                    <span class="text-2xl font-bold text-gray-900">$4,850.00</span>
                </div>
                <span class="text-sm text-green-600">+12% this month</span>
            </div>

            <!-- Expenses -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-600">Expenses</h3>
                    <div class="p-2 bg-red-100 rounded-lg">
                        <i class="fas fa-arrow-up text-red-600"></i>
                    </div>
                </div>
                <div class="mb-2">
                    <span class="text-2xl font-bold text-gray-900">$2,340.00</span>
                </div>
                <span class="text-sm text-red-600">+8% this month</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Quick Actions</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <button class="flex flex-col items-center p-4 rounded-xl bg-blue-50 hover:bg-blue-100 transition-colors group">
                            <div class="p-3 bg-blue-600 rounded-full mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-paper-plane text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Send Money</span>
                        </button>
                        <button class="flex flex-col items-center p-4 rounded-xl bg-green-50 hover:bg-green-100 transition-colors group">
                            <div class="p-3 bg-green-600 rounded-full mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-download text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Request</span>
                        </button>
                        <button class="flex flex-col items-center p-4 rounded-xl bg-purple-50 hover:bg-purple-100 transition-colors group">
                            <div class="p-3 bg-purple-600 rounded-full mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Add Money</span>
                        </button>
                        <button class="flex flex-col items-center p-4 rounded-xl bg-orange-50 hover:bg-orange-100 transition-colors group">
                            <div class="p-3 bg-orange-600 rounded-full mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-credit-card text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Pay Bills</span>
                        </button>
                    </div>
                </div>

                <!-- Spending Chart -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-gray-900">Spending Overview</h2>
                        <select class="text-sm border border-gray-300 rounded-lg px-3 py-1 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Last 7 days</option>
                            <option>Last 30 days</option>
                            <option>Last 3 months</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <canvas id="spendingChart"></canvas>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-gray-900">Recent Transactions</h2>
                        <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</a>
                    </div>
                    <div class="space-y-4">
                        <!-- Transaction Item -->
                        <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="p-2 bg-green-100 rounded-full">
                                    <i class="fas fa-arrow-down text-green-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Payment from Sarah Wilson</p>
                                    <p class="text-sm text-gray-500">Today, 2:30 PM</p>
                                </div>
                            </div>
                            <span class="font-semibold text-green-600">+$250.00</span>
                        </div>

                        <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="p-2 bg-red-100 rounded-full">
                                    <i class="fas fa-arrow-up text-red-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Netflix Subscription</p>
                                    <p class="text-sm text-gray-500">Yesterday, 6:15 AM</p>
                                </div>
                            </div>
                            <span class="font-semibold text-red-600">-$15.99</span>
                        </div>

                        <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="p-2 bg-blue-100 rounded-full">
                                    <i class="fas fa-shopping-cart text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Amazon Purchase</p>
                                    <p class="text-sm text-gray-500">Dec 15, 3:45 PM</p>
                                </div>
                            </div>
                            <span class="font-semibold text-red-600">-$89.99</span>
                        </div>

                        <div class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center space-x-4">
                                <div class="p-2 bg-purple-100 rounded-full">
                                    <i class="fas fa-coffee text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Starbucks</p>
                                    <p class="text-sm text-gray-500">Dec 14, 8:20 AM</p>
                                </div>
                            </div>
                            <span class="font-semibold text-red-600">-$5.45</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-8">
                <!-- Cards -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">My Cards</h2>
                    
                    <!-- Primary Card -->
                    <div class="bg-gradient-to-r from-gray-900 to-gray-700 rounded-2xl p-6 text-white mb-4 relative overflow-hidden">
                        <div class="flex justify-between items-start mb-8">
                            <div>
                                <p class="text-gray-300 text-sm">Balance</p>
                                <p class="text-2xl font-bold">$8,450.00</p>
                            </div>
                            <i class="fab fa-cc-mastercard text-3xl"></i>
                        </div>
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-gray-300 text-xs mb-1">CARD HOLDER</p>
                                <p class="font-medium">JOHN DOE</p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-300 text-xs mb-1">EXPIRES</p>
                                <p class="font-medium">12/26</p>
                            </div>
                        </div>
                        <p class="text-xl font-mono mt-4 tracking-wider">•••• •••• •••• 4532</p>
                    </div>

                    <button class="w-full p-3 border-2 border-dashed border-gray-300 rounded-xl text-gray-500 hover:border-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Add New Card
                    </button>
                </div>

                <!-- Goals -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-gray-900">Savings Goals</h2>
                        <button class="text-blue-600 hover:text-blue-700">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Goal Item -->
                        <div class="p-4 bg-blue-50 rounded-xl">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium text-gray-900">Vacation Fund</h3>
                                <span class="text-sm text-gray-500">75%</span>
                            </div>
                            <div class="w-full bg-blue-200 rounded-full h-2 mb-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                            <p class="text-sm text-gray-600">$3,750 of $5,000</p>
                        </div>

                        <div class="p-4 bg-green-50 rounded-xl">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium text-gray-900">Emergency Fund</h3>
                                <span class="text-sm text-gray-500">60%</span>
                            </div>
                            <div class="w-full bg-green-200 rounded-full h-2 mb-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 60%"></div>
                            </div>
                            <p class="text-sm text-gray-600">$6,000 of $10,000</p>
                        </div>
                    </div>
                </div>

                <!-- Activity -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Activity</h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="p-1 bg-green-100 rounded-full mt-1">
                                <div class="w-2 h-2 bg-green-600 rounded-full"></div>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900">Payment received from Alex Johnson</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="p-1 bg-blue-100 rounded-full mt-1">
                                <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900">Card payment at Target</p>
                                <p class="text-xs text-gray-500">5 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="p-1 bg-purple-100 rounded-full mt-1">
                                <div class="w-2 h-2 bg-purple-600 rounded-full"></div>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900">Monthly salary deposited</p>
                                <p class="text-xs text-gray-500">1 day ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize spending chart
        const ctx = document.getElementById('spendingChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Spending',
                    data: [120, 190, 80, 250, 180, 320, 200],
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#3B82F6',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 5
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
                    y: {
                        beginAtZero: true,
                        grid: {
                            borderDash: [5, 5],
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 8
                    }
                }
            }
        });

        // Add hover effects and interactions
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-1px)';
            });
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>