<div class="w-full overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="p-6 border-b border-gray-200">
        <h1 class="mb-3">Grafik Penjualan</h1>
        <div class="chart" id="chart"></div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30,40,35,50,49,60,70,91,125]
            }],
            xaxis: {
                categories: [2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023]
            }
            }

            var chart = new ApexCharts(document.querySelector("#chart"), options);

            chart.render();
        </script>
    </div>
</div>