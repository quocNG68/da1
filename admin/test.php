<?php
$result_filter =  statistical($date_start ?? "2023-11-01", $date_end ?? "2023-11-30", $type ?? "date");
foreach ($result_filter as $key => $value) {
    if ($value['so_donhang'] == null) {
        $result_filter[$key]['so_donhang'] = 0;
    }
    if ($value['doanhthu'] == null) {
        $result_filter[$key]['doanhthu'] = 0;
    }
}
$date = array_column($result_filter, 'date');
$so_donhang = array_column($result_filter, 'so_donhang');
$doanhthu = array_column($result_filter, 'doanhthu');
$result_filter = [];
$result_filter['date'] = $date;
$result_filter['so_donhang'] = $so_donhang;
$result_filter['doanhthu'] = $doanhthu;
$result_filter = json_encode($result_filter);