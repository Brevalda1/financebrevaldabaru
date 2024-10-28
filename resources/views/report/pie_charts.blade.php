<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pie Chart Report</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .chart-page {
            width: 100%;
            margin: auto;
            page-break-after: always;
            padding: 20px;
            box-sizing: border-box;
        }
        .chart-container {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
        .chart-container img {
            width: auto;
            max-width: 100%;
            height: auto;
            max-height: 300px; /* Adjust this value to control the chart height */
        }
        .chart-footer {
            text-align: center;
            margin-top: 10px;
        }
        /* Tambahan styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }
        h1, h3 {
            text-align: center;
            margin-bottom: 5px;
        }
        /* Styling untuk legend */
        .legend-color-box {
            display: inline-block;
            width: 12px;
            height: 12px;
            margin-right: 5px;
            border: 1px solid #000;
        }
        /* Ensure the content doesn't overflow */
        .content-wrapper {
            max-height: 100%;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <h1>Report Keseluruhan</h1>
    <!-- Form filter tanggal -->
    <form method="GET" action="/reportkeseluruhan">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="{{ $startDate }}">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="{{ $endDate }}">
    </form>

    <!-- Chart 1 -->
    <div class="chart-page">
        <div class="chart-container">
            @if(!empty($chartImages['chart1']))
                <img src="data:image/png;base64,{{ $chartImages['chart1'] }}" alt="Chart 1">
            @else
                <p>Chart tidak tersedia.</p>
            @endif
        </div>
        <div class="chart-footer">
            <h3>Total Gaji Pegawai</h3>
            <table>
                <tr>
                    <th>Warna</th>
                    <th>Kode Perusahaan</th>
                    <th>Total Gaji (IDR)</th>
                    <th>Persentase (%)</th>
                </tr>
                @foreach($labels1 as $index => $label)
                    <tr>
                        <td>
                            <div class="legend-color-box" style="background-color: {{ $chartColors['chart1'][$label] }}"></div>
                        </td>
                        <td>{{ $label }}</td>
                        <td>{{ number_format($data1[$index], 2) }}</td>
                        <td>{{ number_format(($data1[$index] / array_sum($data1)) * 100, 2) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Chart 2 -->
    <div class="chart-page">
        <div class="chart-container">
            @if(!empty($chartImages['chart2']))
                <img src="data:image/png;base64,{{ $chartImages['chart2'] }}" alt="Chart 2">
            @else
                <p>Chart tidak tersedia.</p>
            @endif
        </div>
        <div class="chart-footer">
            <h3>Total Biaya Operasional</h3>
            <table>
                <tr>
                    <th>Warna</th>
                    <th>Kode Operasional</th>
                    <th>Total Biaya (IDR)</th>
                    <th>Persentase (%)</th>
                </tr>
                @foreach($labels2 as $index => $label)
                    <tr>
                        <td>
                            <div class="legend-color-box" style="background-color: {{ $chartColors['chart2'][$label] }}"></div>
                        </td>
                        <td>{{ $label }}</td>
                        <td>{{ number_format($data2[$index], 2) }}</td>
                        <td>{{ number_format(($data2[$index] / array_sum($data2)) * 100, 2) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Chart 3 -->
    <div class="chart-page">
        <div class="chart-container">
            @if(!empty($chartImages['chart3']))
                <img src="data:image/png;base64,{{ $chartImages['chart3'] }}" alt="Chart 3">
            @else
                <p>Chart tidak tersedia.</p>
            @endif
        </div>
        <div class="chart-footer">
            <h3>Total Biaya Operasional Proyek</h3>
            <table>
                <tr>
                    <th>Warna</th>
                    <th>Kode Detail</th>
                    <th>Total Biaya (IDR)</th>
                    <th>Persentase (%)</th>
                </tr>
                @foreach($labels3 as $index => $label)
                    <tr>
                        <td>
                            <div class="legend-color-box" style="background-color: {{ $chartColors['chart3'][$label] }}"></div>
                        </td>
                        <td>{{ $label }}</td>
                        <td>{{ number_format($data3[$index], 2) }}</td>
                        <td>{{ number_format(($data3[$index] / array_sum($data3)) * 100, 2) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Chart 4 -->
    <div class="chart-page">
        <div class="chart-container">
            @if(!empty($chartImages['chart4']))
                <img src="data:image/png;base64,{{ $chartImages['chart4'] }}" alt="Chart 4">
            @else
                <p>Chart tidak tersedia.</p>
            @endif
        </div>
        <div class="chart-footer">
            <h3>Total Biaya Pribadi</h3>
            <table>
                <tr>
                    <th>Warna</th>
                    <th>Kode Pribadi</th>
                    <th>Total Biaya (IDR)</th>
                    <th>Persentase (%)</th>
                </tr>
                @foreach($labels4 as $index => $label)
                    <tr>
                        <td>
                            <div class="legend-color-box" style="background-color: {{ $chartColors['chart4'][$label] }}"></div>
                        </td>
                        <td>{{ $label }}</td>
                        <td>{{ number_format($data4[$index], 2) }}</td>
                        <td>{{ number_format(($data4[$index] / array_sum($data4)) * 100, 2) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Chart 5 -->
    <div class="chart-page">
        <div class="chart-container">
            @if(!empty($chartImages['chart5']))
                <img src="data:image/png;base64,{{ $chartImages['chart5'] }}" alt="Chart 5">
            @else
                <p>Chart tidak tersedia.</p>
            @endif
        </div>
        <div class="chart-footer">
            <h3>Total Biaya Lain-lain</h3>
            <table>
                <tr>
                    <th>Warna</th>
                    <th>Kode Lain</th>
                    <th>Total Biaya (IDR)</th>
                    <th>Persentase (%)</th>
                </tr>
                @foreach($labels5 as $index => $label)
                    <tr>
                        <td>
                            <div class="legend-color-box" style="background-color: {{ $chartColors['chart5'][$label] }}"></div>
                        </td>
                        <td>{{ $label }}</td>
                        <td>{{ number_format($data5[$index], 2) }}</td>
                        <td>{{ number_format(($data5[$index] / array_sum($data5)) * 100, 2) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Total Chart -->
    <div class="chart-page" style="page-break-after: avoid;">
        <div class="chart-container">
            @if(!empty($chartImages['chartTotal']))
                <img src="data:image/png;base64,{{ $chartImages['chartTotal'] }}" alt="Total Chart">
            @else
                <p>Chart tidak tersedia.</p>
            @endif
        </div>
        <div class="chart-footer">
            <h3>Total Perbandingan Pengeluaran Keseluruhan</h3>
            <table>
                <tr>
                    <th>Warna</th>
                    <th>Kode</th>
                    <th>Total (IDR)</th>
                    <th>Persentase (%)</th>
                </tr>
                @php
                    $totalSum = array_sum($totalData);
                @endphp
                @foreach($totalData as $label => $value)
                    <tr>
                        <td>
                            <div class="legend-color-box" style="background-color: {{ $chartColors['chartTotal'][$label] }}"></div>
                        </td>
                        <td>{{ $label }}</td>
                        <td>{{ number_format($value, 2) }}</td>
                        <td>{{ number_format(($value / $totalSum) * 100, 2) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>
</html>
