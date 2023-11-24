<div class="main-panel">
    <div class="content-wrapper">
<div class="container">
  <h4>Danh sách tình trạng</h4>
  <table class="table table table-bordered" border="1">
    <thead>
      <tr>
        <th>id</th>
        <th>Tình trạng</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
        <?php
        if(is_array($load_all_tinhtrang)){
            foreach($load_all_tinhtrang as $value){
                extract($value);
                echo '
                <tr>
                <td>'.$id.'</td>
                <td>'.$tinhtrang.'</td>
                <td>
                <a class="btn btn-primary" href="index.php?act=edittt&id='.$id.'">Sửa</a>
                <a class="btn btn-danger" href="index.php?act=deletett&id='.$id.'">Xóa</a>
            </td>
              </tr>
            
                ';
            }
        }
        ?>
    
      
    </tbody>
   
  </table>
  <a class="btn btn-success" href="index.php?act=addtt">Thêm tình trạng</a>
</div>
</div>