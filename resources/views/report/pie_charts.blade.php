<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Chart Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
            margin: auto;
        }
        .chart-container {
            width: 45%;
            margin-bottom: 30px;
        }
        .chart-footer {
            text-align: center;
            margin-top: 10px;
        }
        .total-chart {
            width: 100%;
            margin: auto;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<!-- Form filter tanggal -->
<form method="GET" action="/reportkeseluruhan">
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" value="{{ $startDate }}">
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" value="{{ $endDate }}">
    <button type="submit">Search</button>
</form>
 <!-- Tombol Download PDF -->
 <form method="GET" action="/pie-charts/download">
    <input type="hidden" name="start_date" value="{{ $startDate }}">
    <input type="hidden" name="end_date" value="{{ $endDate }}">
    <button type="submit">Download PDF</button>
</form>

<div class="container">
    <!-- Pie chart pertama: Gaji Pegawai -->
    <div class="chart-container">
        <canvas id="pieChart1"></canvas>
        <div class="chart-footer">
            <h3>Total Gaji Pegawai</h3>
            @foreach($labels1 as $index => $label)
                <p>{{ $label }}: {{ number_format($data1[$index], 2) }} IDR ({{ number_format(($data1[$index] / array_sum($data1)) * 100, 2) }}%)</p>
            @endforeach
        </div>
    </div>

    <!-- Pie chart kedua: Biaya Operasional Non Budgeting -->
    <div class="chart-container">
        <canvas id="pieChart2"></canvas>
        <div class="chart-footer">
            <h3>Total Biaya Operasional</h3>
            @foreach($labels2 as $index => $label)
                <p>{{ $label }}: {{ number_format($data2[$index], 2) }} IDR ({{ number_format(($data2[$index] / array_sum($data2)) * 100, 2) }}%)</p>
            @endforeach
        </div>
    </div>

    <!-- Pie chart ketiga: Detail Biaya Operasional Proyek -->
    <div class="chart-container">
        <canvas id="pieChart3"></canvas>
        <div class="chart-footer">
            <h3>Total Biaya Operasional Proyek</h3>
            @foreach($labels3 as $index => $label)
                <p>{{ $label }}: {{ number_format($data3[$index], 2) }} IDR ({{ number_format(($data3[$index] / array_sum($data3)) * 100, 2) }}%)</p>
            @endforeach
        </div>
    </div>

    <!-- Pie chart keempat: Biaya Pribadi -->
    <div class="chart-container">
        <canvas id="pieChart4"></canvas>
        <div class="chart-footer">
            <h3>Total Biaya Pribadi</h3>
            @foreach($labels4 as $index => $label)
                <p>{{ $label }}: {{ number_format($data4[$index], 2) }} IDR ({{ number_format(($data4[$index] / array_sum($data4)) * 100, 2) }}%)</p>
            @endforeach
        </div>
    </div>

    <!-- Pie chart kelima: Biaya Lain-lain -->
    <div class="chart-container">
        <canvas id="pieChart5"></canvas>
        <div class="chart-footer">
            <h3>Total Biaya Lain-lain</h3>
            @foreach($labels5 as $index => $label)
                <p>{{ $label }}: {{ number_format($data5[$index], 2) }} IDR ({{ number_format(($data5[$index] / array_sum($data5)) * 100, 2) }}%)</p>
            @endforeach
        </div>
    </div>

    <!-- Pie chart total dari semua data berdasarkan 4 huruf pertama -->
    <div class="total-chart">
        <canvas id="totalPieChart"></canvas>
        <div class="chart-footer">
            <h3>Total Berdasarkan Kode (4 Huruf Pertama)</h3>
            @foreach($totalData as $label => $value)
                <p>{{ $label }}: {{ number_format($value, 2) }} IDR ({{ number_format(($value / array_sum($totalData)) * 100, 2) }}%)</p>
            @endforeach
        </div>
    </div>
</div>

<script>
    function createPieChart(ctx, labels, data) {
        var total = data.reduce((a, b) => a + b, 0);
        return new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 
                        'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 
                        'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)',
                        'rgba(199, 199, 199, 0.2)', 'rgba(255, 99, 71, 0.2)',   
                        'rgba(144, 238, 144, 0.2)', 'rgba(255, 140, 0, 0.2)',  
                        'rgba(147, 112, 219, 0.2)', 'rgba(30, 144, 255, 0.2)', 
                        'rgba(220, 20, 60, 0.2)',   'rgba(255, 228, 181, 0.2)',
                        'rgba(128, 128, 0, 0.2)',   'rgba(244, 164, 96, 0.2)',
                        'rgba(0, 128, 128, 0.2)',   'rgba(135, 206, 250, 0.2)', 
                        'rgba(218, 165, 32, 0.2)',  'rgba(255, 215, 0, 0.2)'    
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 
                        'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 
                        'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)',
                        'rgba(199, 199, 199, 1)', 'rgba(255, 99, 71, 1)',   
                        'rgba(144, 238, 144, 1)', 'rgba(255, 140, 0, 1)',  
                        'rgba(147, 112, 219, 1)', 'rgba(30, 144, 255, 1)', 
                        'rgba(220, 20, 60, 1)',   'rgba(255, 228, 181, 1)',
                        'rgba(128, 128, 0, 1)',   'rgba(244, 164, 96, 1)',
                        'rgba(0, 128, 128, 1)',   'rgba(135, 206, 250, 1)', 
                        'rgba(218, 165, 32, 1)',  'rgba(255, 215, 0, 1)'    
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total) * 100).toFixed(2);
                                return tooltipItem.label + ': ' + value.toLocaleString() + ' IDR (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
        });
    }

    // Create individual pie charts
    createPieChart(document.getElementById('pieChart1').getContext('2d'), @json($labels1), @json($data1));
    createPieChart(document.getElementById('pieChart2').getContext('2d'), @json($labels2), @json($data2));
    createPieChart(document.getElementById('pieChart3').getContext('2d'), @json($labels3), @json($data3));
    createPieChart(document.getElementById('pieChart4').getContext('2d'), @json($labels4), @json($data4));
    createPieChart(document.getElementById('pieChart5').getContext('2d'), @json($labels5), @json($data5));

    // Create total pie chart
    var totalLabels = @json(array_keys($totalData));
    var totalValues = @json(array_values($totalData));
    createPieChart(document.getElementById('totalPieChart').getContext('2d'), totalLabels, totalValues);
</script>

</body>
</html>
