<?php
  if(is_array($load_all_name_tinhtrang)){
   extract($load_all_name_tinhtrang);
    }
  if(is_array($load_name_danhmuc)){
    extract($load_name_danhmuc);
    }


?>
<div class="main-panel">
    <div class="content-wrapper">
<div class="container">
  
  <h4>Danh sách sản phẩm</h4>
  <a href="index.php?act=addsp" class="btn btn-success">Thêm sản phẩm</a>
  <table class="table table table-bordered" border="1">
  <div class="search" style="display: flex; justify-content:center;padding:8px;">
    <form action="index.php?act=listsp" method="post">
    <input style="width:400px;height:30px" type="text" name="keyword" placeholder="Từ khóa ...">
    <select style="width:150px;height:30px;margin:0px 5px" name="namedm">
    <option value="0">Tất cả sản phẩm</option>
    <?php
   
      foreach($load_all_danhmuc as $value){
        extract($value);
        echo '
        <option value="'.$id.'">'.$name.'</option>
        ';
      }
    

    ?>    </select>
    <button class="btn btn-primary" name="search">Tìm Kiếm</button>
    </form> 
    </div>
    <thead>
      <tr>
        <!-- <th>Số thứ tự</th> -->
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Giá khuyến mãi</th>
        <th>Hình ảnh</th>
        <!-- <th>Hình ảnh mô tả</th> -->
        <!-- <th>Mô tả ngắn</th> -->
        <!-- <th>Mô tả dài</th> -->
        <!-- <th>Lượt xem</th> -->
        <!-- <th>Tình trạng</th> -->
        <!-- <th>Xuất xứ</th> -->
        <!-- <th>Trọng lượng</th> -->
        <!-- <th>Số lượng</th> -->
        <!-- <th>Yêu thích</th> -->
        <th>Danh mục</th>
        <th>Ngày đăng</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
        <?php

        if(isset($search_sanpham_keyword_iddm)&&is_array($search_sanpham_keyword_iddm)){
          if(count($search_sanpham_keyword_iddm) === 0){
            $found_sanpham = "Không tìm thấy sản phẩm";
          }
       
            foreach($search_sanpham_keyword_iddm as $key => $value){
                extract($value);
                echo '
                <tr>
          
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$price.'</td>
                <td>'.$price_saleoff.'</td>
                <td><img width=100px; src="../upload/'.$img.'" alt=""></td>
              
                ';
                ?>
              
<!--           
                if(isset($load_all_image_mota)){
                
                  foreach($load_all_image_mota as $value){
                  extract($value);
                  if($id_pro_img == $id){
                   
                    echo '
                    <img width="100px" src="../upload/'.$img_thum.'">';
                    
                  }
                </td><td>'.$mota_short.'</td>
                <td>'.$mota_long.'</td>
                <td>'.$luotxem.'</td>
                <td>
                '.$tinhtrang.'
                </td>
                <td>'.$xuatxu.'</td>
                <td>'.$trongluong.'</td>
                <td>'.$soluong.'</td>
                <td>'.$luotyeuthich.'</td>
                  }
                } -->
             
                <?php
  
                echo
                
                '
                <td>'.$tendanhmuc.'</td>
                <td>'.$ngaydang.'</td>
                <td>
                <a class="btn btn-primary" href="index.php?act=editsp&id='.$id.'">Sửa</a>
                <a onclick = "return xoa()" class="btn btn-danger" href="index.php?act=deletesp&id='.$id.'">Xóa</a>
                </td>
                
        
              </tr>
            
                ';
            }
        }

        if(isset($found_sanpham) && $found_sanpham!=''){
          ?>
          <h4><?php echo $found_sanpham?></h4>
          

          <?php

        }
      
        ?>
    
      
    </tbody>   
  </table>
  

  <ul class="pagination pagination-lg">
    <?php
    if ($total_pages > 1) {
        if ($page > 1) {
            echo '<li class="page-item"><a class="page-link" href="index.php?act=listsp&page=' . ($page - 1) . '">Previous</a></li>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="index.php?act=listsp&page=' . $i . '">' . $i . '</a></li>';
        }

        if ($page < $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="index.php?act=listsp&page=' . ($page + 1) . '">Next</a></li>';
        }
    }
    ?>
</ul>

</div>
</div>
<script>
        function xoa() {

          return confirm('Bạn chắc chắc muốn xóa không');
        }
    </script>
<!-- <script>
      function toggleImages() {
        var imageContainer = document.getElementById("imageContainer");
        if (imageContainer.style.maxHeight === "50px") {
            imageContainer.style.maxHeight = "none";
        } else {
            imageContainer.style.maxHeight = "50px";
        }
    }
</script> -->