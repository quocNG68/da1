<div class="container">
<h3 style="background: #7978e9; padding:16px; color:white;text-transform:uppercase;font-size:22px;border-radius:5px;">Thống kê theo hàng</h3>

  <table class="table">
    <thead>
      <tr>
        <th>Mã Danh mục</th>
        <th>Tên danh mục</th>
        <th>Số lượng</th>
        <th>Giá cao nhất</th>
        <th>Giá thấp nhất</th>
        <th>Giá trung bình</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($thongke_danhmuc as $value){
        extract($value);
        echo'
        <tr>
        <td>'.$madanhmuc.'</td>
        <td>'.$tendanhmuc.'</td>
        <td>'.$soluong_sp.'</td>
        <td>'.number_format($maxprice,3, '.', ',') . 'VNĐ'.'</td>
        <td>'.number_format($minprice,3, '.', ',') . 'VNĐ'.'</td>
        <td>'.number_format($avgprice,3, '.', ',') . 'VNĐ'.'</td>
      </tr>
        ';
      }
      ?>
    </tbody>
  </table>
</div>