<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Sales Overview -->
                <h3 class="text-lg font-semibold mb-4">Sales Overview</h3>
                <div class="mb-6">
                    <canvas id="salesChart" width="400" height="200"></canvas>
                </div>

                <!-- Top Selling Books -->
                <h3 class="text-lg font-semibold mb-4">Top Selling Books</h3>
                <div class="mb-6">
                    <canvas id="topBooksChart" width="400" height="200"></canvas>
                </div>

                <!-- Customer Engagement -->
                <h3 class="text-lg font-semibold mb-4">Customer Engagement</h3>
                <div class="mb-6">
                    <canvas id="customerEngagementChart" width="400" height="200"></canvas>
                </div>

                <!-- Inventory Status -->
                <h3 class="text-lg font-semibold mb-4">Inventory Status</h3>
                <div class="mb-6">
                    <canvas id="inventoryStatusChart" width="400" height="200"></canvas>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Sales',
                    data: [500, 400, 300, 700, 600, 800],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Top Selling Books Chart
        const topBooksCtx = document.getElementById('topBooksChart').getContext('2d');
        const topBooksChart = new Chart(topBooksCtx, {
            type: 'bar', // Updated to 'bar' for consistency
            data: {
                labels: ['One Piece', 'Slam Dunk', 'X-Men'],
                datasets: [{
                    label: 'Sales',
                    data: [500, 450, 400],
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // This makes the bar chart horizontal
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Customer Engagement Chart
        const customerEngagementCtx = document.getElementById('customerEngagementChart').getContext('2d');
        const customerEngagementChart = new Chart(customerEngagementCtx, {
            type: 'doughnut',
            data: {
                labels: ['New Customers', 'Returning Customers'],
                datasets: [{
                    label: 'Customers',
                    data: [150, 800],
                    backgroundColor: ['rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(255, 159, 64, 1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Inventory Status Chart
        const inventoryStatusCtx = document.getElementById('inventoryStatusChart').getContext('2d');
        const inventoryStatusChart = new Chart(inventoryStatusCtx, {
            type: 'pie',
            data: {
                labels: ['Books Sold', 'Books Added', 'Books in Inventory'],
                datasets: [{
                    label: 'Inventory',
                    data: [1200, 800, 10000],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
</x-app-layout>
