<div class="main-panel">
    <div class="content-wrapper">
<div class="container">
  <form onsubmit="return add_sp()" enctype="multipart/form-data" action="index.php?act=addsp" method="post">
    <div class="form-group">
      <label for="email">Tên sản phẩm</label>
      <input type="text" class="form-control" id="namesp" name="namesp" placeholder="Tên sản phẩm ...">

        <span id="err_namesp" style="color: red;"></span>


    </div>

    <div class="form-group">
      <label for="pwd">Giá Gốc</label>
      <input type="text" class="form-control" id="old_price" name="price" placeholder="Giá ...">
    
        <span id="err_old_price" style="color: red;"></span>
    
    </div>
    <div class="form-group">
      <label for="pwd">Giá khuyến mãi</label>
      <input type="text" class="form-control" id="price_saleoff" name="price_saleoff" placeholder="Giá ...">
  
    
        <span id="err_price_saleoff" style="color: red;"></span>
   
      
    </div>
    <div class="form-group">
      <label for="pwd">Hình ảnh</label>
      <input id="image" type="file" name="image" class="form-control">
   
        <span id="err_image" style="color: red;"><?= $err_filename??"" ?></span>

    </div>

    <div class="form-group">
      <label for="pwd">Hình ảnh mô tả</label>
      <input id ="images" type="file" name="images[]" class="form-control" multiple>

        <span id="err_images" style="color: red;"><?= $err_filenames??"" ?></span>

    </div>
    <div class="form-group">
      <label for="pwd">Mô tả ngắn</label>
      <textarea id="mota_short" class="form-control" name="mota_short"  cols="30" rows="10" placeholder="Mô tả ngắn ..."></textarea>
     
        <span id="err_mota_short" style="color: red;"></span>
       
    </div>
    <div class="form-group">
      <label for="pwd">Mô tả dài</label>
      <textarea id="mota_long" class="form-control" name="mota_long"  cols="30" rows="10" placeholder="Mô tả dài ..."></textarea>
    
        <span id="err_mota_long" style="color: red;"></span>
     
    </div>
    <div class="form-group">
      <label for="pwd">Tình trạng</label>
    
      <select class="form-control" name="status" >
      <?php
      if(is_array($load_all_tinhtrang)){
        foreach($load_all_tinhtrang as $value){
          extract($value);
          echo '
          <option value='.$id.'>'.$tinhtrang.'</option>
          ';
        }
       
      }
      ?>
     
      </select>
    </div>
    <div class="form-group">
      <label for="pwd">Xuất xứ</label>
      <input  type="text" class="form-control" id="xuatxu" name="xuatxu" placeholder="Xuất xứ sản phẩm ...">

        <span id="err_xuatxu" style="color: red;"></span>

    </div>
    <div class="form-group">
      <label for="pwd">Trọng lượng</label>
      <input  type="text" class="form-control" id="trongluong" name="trongluong" placeholder="Nhập trọng lượng ...">
 
        <span id="err_trongluong" style="color: red;"></span>
    
    </div>

    <div class="form-group">
      <label for="pwd">Số lượng</label>
      <input type="text" class="form-control" id="soluong" name="soluong" placeholder="Nhập số lượng ...">

        <span id="err_soluong" style="color: red;"></span>

    </div>
    <div class="form-group">
      <label for="pwd">Danh mục chính</label>
      <select class="form-control" name="danhmuc">
        <?php
        if(is_array($load_all_danhmuc)){
          foreach($load_all_danhmuc as $value){
            extract($value);
            echo '
            <option value='.$id.'>'.$name.'</option>
            ';
          }
        }
        ?>
      </select>
    </div>
    <input type="hidden" name="date">
    
    <button type="submit" name="addsp" class="btn btn-success">Thêm sản phẩm</button>
    <a class="btn btn-primary" href="index.php?act=listsp">Danh sách sản phẩm</a>
  </form>
</div>
</div>

<script>
  function add_sp() {
    var namesp = document.getElementById('namesp');
    var err_namesp = document.getElementById('err_namesp');
    var old_price = document.getElementById('old_price');
    var err_old_price = document.getElementById('err_old_price');
    var price_saleoff = document.getElementById('price_saleoff');
    var err_price_saleoff = document.getElementById('err_price_saleoff');
    var image = document.getElementById('image');
    var err_image = document.getElementById('err_image');
    var images = document.getElementById('images');
    var err_images = document.getElementById('err_images');
    var mota_short = document.getElementById('mota_short');
    var err_mota_short = document.getElementById('err_mota_short');
    var mota_long = document.getElementById('mota_long');
    var err_mota_long = document.getElementById('err_mota_long');
    var xuatxu = document.getElementById('xuatxu');
    var err_xuatxu = document.getElementById('err_xuatxu');
    var trongluong = document.getElementById('trongluong');
    var err_trongluong = document.getElementById('err_trongluong');
    var soluong = document.getElementById('soluong');
    var err_soluong = document.getElementById('err_soluong');

    var count = 0;

    // Validate Tên sản phẩm
    if (namesp.value === '') {
      err_namesp.textContent = 'Vui lòng nhập tên sản phẩm';
      err_namesp.style.color = 'red';
      count++;
    } else {
      err_namesp.textContent = '';
    }

    // Validate Giá Gốc
    if (old_price.value === '') {
      err_old_price.textContent = 'Vui lòng nhập giá';
      err_old_price.style.color = 'red';
      count++;
    } else if (isNaN(old_price.value)) {
      err_old_price.textContent = 'Giá phải là số';
      err_old_price.style.color = 'red';
      count++;
    } else {
      err_old_price.textContent = '';
    }

    // Validate Giá khuyến mãi
    if (price_saleoff.value !== '' && (isNaN(price_saleoff.value) || parseInt(price_saleoff.value) >= parseInt(old_price.value))) {
      err_price_saleoff.textContent = 'Giảm giá phải là số và nhỏ hơn giá gốc';
      err_price_saleoff.style.color = 'red';
      count++;
    } else {
      err_price_saleoff.textContent = '';
    }

    // Validate Hình ảnh
    if (image.value === '') {
      err_image.textContent = 'Vui lòng chọn ảnh';
      err_image.style.color = 'red';
      count++;
    } else {
      err_image.textContent = '';
    }

    // Validate Hình ảnh mô tả
    if (images.files.length === 0) {
      err_images.textContent = 'Vui lòng chọn ít nhất một ảnh mô tả';
      err_images.style.color = 'red';
      count++;
    } else {
      err_images.textContent = '';
    }

    // Validate Mô tả ngắn
    if (mota_short.value === '') {
      err_mota_short.textContent = 'Nhập mô tả ngắn';
      err_mota_short.style.color = 'red';
      count++;
    } else {
      err_mota_short.textContent = '';
    }

    // Validate Mô tả dài
    if (mota_long.value === '') {
      err_mota_long.textContent = 'Nhập mô tả dài';
      err_mota_long.style.color = 'red';
      count++;
    } else {
      err_mota_long.textContent = '';
    }

    // Validate Xuất xứ
    if (xuatxu.value === '') {
      err_xuatxu.textContent = 'Nhập xuất xứ';
      err_xuatxu.style.color = 'red';
      count++;
    } else {
      err_xuatxu.textContent = '';
    }

    // Validate Trọng lượng
    if (trongluong.value === '') {
      err_trongluong.textContent = 'Nhập trọng lượng';
      err_trongluong.style.color = 'red';
      count++;
    } else {
      err_trongluong.textContent = '';
    }

    // Validate Số lượng
    if (soluong.value === '') {
      err_soluong.textContent = 'Nhập số lượng';
      err_soluong.style.color = 'red';
      count++;
    } else if (isNaN(soluong.value)) {
      err_soluong.textContent = 'Số lượng phải là số';
      err_soluong.style.color = 'red';
      count++;
    } else {
      err_soluong.textContent = '';
    }

    if (count > 0) {
      return false;
    } else {
      return true;
    }
  }
</script>