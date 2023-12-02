<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
</figure>
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 510px;
        max-width: 1200px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>

<script>
    let result_filter = JSON.parse('<?= $result_filter ?>');
    console.log(result_filter);
    result_filter.doanhthu=result_filter.doanhthu.map((value)=>(parseInt(value)));
    result_filter.so_donhang=result_filter.so_donhang.map((value)=>(parseInt(value)));
    Highcharts.chart('container', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Biểu đồ thống kê theo doanh thu và số đơn hàng',
            align: 'left'
        },
        xAxis: [{
            categories: result_filter.date
            ,
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            title: {
                text: 'Số đơn hàng thành công',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            allowDecimals: false // Số đơn hàng không có phần thập phân
        }, { // Secondary yAxis
            title: {
                text: 'Doanh thu',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value}.000VNĐ',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            opposite: true,
            allowDecimals: false // Doanh thu không có phần thập phân
        }],
        tooltip: {
            shared: true
        },
        legend: {
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 60,
            floating: true,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || 'rgba(255,255,255,0.25)'
        },
        series: [{
            name: 'Tổng số đơn hàng',
            type: 'column',
            yAxis: 0,
            data:  result_filter.so_donhang,
            tooltip: {
                valueSuffix: ' đơn'
            }
        }, {
            name: 'Doanh thu',
            type: 'spline',
            yAxis: 1,
            data: result_filter.doanhthu,
            tooltip: {
                valueSuffix: '.000VNĐ'
            }
        }]
    });
</script>
