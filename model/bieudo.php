<?php
// include "../model/pdo.php";
function statistical($date_start,$date_end,$type='date'){
    $sql="WITH RECURSIVE dates AS (
      SELECT DATE('$date_start') AS date
      UNION ALL
      SELECT DATE_ADD(date, INTERVAL 1 DAY)
      FROM dates
      WHERE DATE_ADD(date, INTERVAL 1 DAY) <= '$date_end'
    )
    ";
    $sql.=" SELECT ".($type == 'MONTH' ? "DATE_FORMAT(dates.date, '%Y-%m')" : "$type(dates.date)")." AS date, COUNT(DISTINCT donhang.id) AS so_donhang, SUM((chitiet_donhang.amount * chitiet_donhang.price)) AS doanhthu
    FROM dates
    LEFT JOIN donhang ON DATE(donhang.ngaymua) = DATE(dates.date) and donhang.trangthai = 4
    LEFT JOIN chitiet_donhang ON chitiet_donhang.id_order=donhang.id
    GROUP BY $type(dates.date)";
    return query($sql);
}
