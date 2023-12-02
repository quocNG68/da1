
<script src="https://www.gstatic.com/charts/loader.js"></script>
<style>
        /* Thêm quy tắc CSS cho biểu đồ */
        #myChart {
            width: 100%;
            max-width: 900px;
            height: 500px;
            margin: 0 auto; /* Để căn giữa biểu đồ */
        }
    </style>
<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
  <?php
  $tongdm = count($thongke_danhmuc);
  $i=1;

foreach($thongke_danhmuc as $value){

    extract($value);
    if($i == $tongdm)
        $dauplay = "";
    else
        $dauplay =",";

        echo "['".$value['tendanhmuc']."',".$value['soluong_sp']."]".$dauplay;
$i=+1;
    }


?>
]);

// Set Options

const options = {
  title:'Biểu đồ thống kê danh mục sản phẩm',
  is3D:true
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);
}
</script>