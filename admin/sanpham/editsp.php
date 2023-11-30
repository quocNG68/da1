<div class="main-panel">
  <div class="content-wrapper">
    <?php
    if (isset($load_one_sanpham) && is_array($load_one_sanpham)) {
      extract($load_one_sanpham);
    }
    ?>
    <div class="container">
      <form onsubmit="return update_sp_admin()" enctype="multipart/form-data" action="index.php?act=updatesp" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên sản phẩm</label>
          <input type="text" class="form-control" id="namesp" name="namesp" placeholder="Nhập tên sản phẩm ..." value="<?= $name ?>">
          <span id="err_namesp" style="color: red;"></span>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Giá gốc</label>
          <input type="text" class="form-control" id="old_price" name="price" placeholder="Nhập giá ..." value="<?= $price ?>">
          <span id="err_old_price" style="color: red;"></span>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Giá khuyến mãi</label>
          <input type="text" class="form-control" id="price_saleoff" name="price_saleoff" placeholder="Nhập giá ..." value="<?= $price_saleoff ?>">
          <span id="err_price_saleoff" style="color: red;"></span>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Hình ảnh</label>
          <input id="image" type="file" class="form-control" name="image">
          <img width="100px" src="../upload/<?= $img ?>" alt="">
          <span id="err_image" style="color: red;"><?= $_COOKIE['err_image'] ?? "" ?></span>



        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Hình ảnh mô tả</label>
          <input type="file" class="form-control" id="images" name="images[]" multiple>
          <span id="err_images" style="color: red;"><?= $_COOKIE['err_images'] ?? "" ?></span>

          <?php
          if (isset($load_all_image_mota) && is_array($load_all_image_mota)) {
            foreach ($load_all_image_mota as $value) {
              extract($value);
              if ($id_pro_img == $id) {
                echo '
                        <img width="100px" src="../upload/' . $img_thum . '" alt="">
                        ';
              }
            }
          }
          ?>

        </div>
        <!-- chỗ này là hình ảnh mô tả làm sau -->

        <div class="form-group">
          <label for="exampleInputEmail1">Mô tả ngắn</label>
          <textarea class="form-control" name="mota_short" id="mota_short" placeholder="Nhập mô tả ngắn ..." cols="30" rows="10">
            <?= $mota_short ?>
            </textarea>
          <span id="err_mota_short" style="color: red;"></span>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Mô tả dài</label>
          <textarea id="mota_long" class="form-control" name="mota_long" placeholder="Nhập mô tả dài ..." cols="30" rows="10">
            <?= $mota_long ?>
            </textarea>
          <span id="err_mota_long" style="color: red;"></span>
        </div>
        <div class="form-group">
          <label for="">Tình trạng</label>
          <select name="status" class="form-control">
            <?php
            if (is_array($load_tinhtrang_in_list)) {
              foreach ($load_tinhtrang_in_list as $value) {
                extract($value);
                if ($matinhtrang == $id_tinhtrang) {
                  echo '<option value="' . $matinhtrang . '" selected>' . $tentinhtrang . '</option>';
                } else {
                  echo '<option value="' . $matinhtrang . '">' . $tentinhtrang . '</option>';
                }
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Xuất xứ</label>
          <input type="text" class="form-control" id="xuatxu" name="xuatxu" placeholder="Nhập tên sản phẩm ..." value="<?= $xuatxu ?>">
          <span id="err_xuatxu" style="color: red;"></span>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Trọng lượng</label>
          <input type="text" class="form-control" id="trongluong" name="trongluong" placeholder="Trọng lượng ..." value="<?= $trongluong ?>">
          <span id="err_trongluong" style="color: red;"></span>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Số lượng</label>
          <input type="text" class="form-control" id="soluong" name="soluong" placeholder="Số lượng ..." value="<?= $soluong ?>">
          <span id="err_soluong" style="color: red;"></span>
        </div>
        <div class="form-group">
          <label for="">Danh mục</label>
          <select name="danhmuc" class="form-control">
            <?php
            if (is_array($load_danhmuc_chinh_in_list)) {
              foreach ($load_danhmuc_chinh_in_list as $value) {
                extract($value);
                if ($madanhmucchinh == $iddm) {
                  echo '
                            <option value="' . $madanhmucchinh . '" selected>' . $tendanhmucchinh . '</option>
                            ';
                } else {
                  echo '
                            <option value="' . $madanhmucchinh . '">' . $tendanhmucchinh . '</option>
                            ';
                }
              }
            }
            ?>
          </select>
        </div>
    </div>



    <button type="submit" name="updatesp" class="btn btn-primary">Cập nhật</button>
    </form>
  </div>

  <script>
    function update_sp_admin() {
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

      // Check file format
      var allowedFormats = ['jpg', 'jpeg', 'png', 'gif']; // Add more formats as needed
      var fileName = image.files[0].name;
      var fileExtension = fileName.split('.').pop().toLowerCase();

      if (allowedFormats.indexOf(fileExtension) === -1) {
        err_image.textContent = 'Định dạng tệp không hợp lệ. Vui lòng chọn các định dạng sau: ' + allowedFormats.join(', ');
        err_image.style.color = 'red';
        count++;
      } else {
        // Check file size
        var imageSize = image.files[0].size; // in bytes
        var maxSize = 1048576; // 1MB (you can adjust this value as needed)

        if (imageSize > maxSize) {
          err_image.textContent = 'Kích thước ảnh vượt quá giới hạn. Vui lòng chọn ảnh nhỏ hơn ' + maxSize / 1048576 + 'MB';
          err_image.style.color = 'red';
          count++;
        } else {
          err_image.textContent = '';
        }
      }



      // Validate Hình ảnh mô tả
      // Validate Hình ảnh mô tả
      // Check file formats and sizes for multiple files
      var allowedFormats = ['jpg', 'jpeg', 'png', 'gif']; // Add more formats as needed
      var maxSize = 1048576; // 1MB (you can adjust this value as needed)

      for (var i = 0; i < images.files.length; i++) {
        var fileName = images.files[i].name;
        var fileExtension = fileName.split('.').pop().toLowerCase();
        var imageSize = images.files[i].size; // in bytes

        if (allowedFormats.indexOf(fileExtension) === -1) {
          err_images.textContent = 'Định dạng tệp không hợp lệ. Vui lòng chọn các định dạng sau: ' + allowedFormats.join(', ');
          err_images.style.color = 'red';
          count++;
          break; // Stop checking further files on the first invalid file
        } else if (imageSize > maxSize) {
          err_images.textContent = 'Kích thước ảnh vượt quá giới hạn. Vui lòng chọn ảnh nhỏ hơn ' + maxSize / 1048576 + 'MB';
          err_images.style.color = 'red';
          count++;
          break; // Stop checking further files on the first invalid file
        } else {
          err_images.textContent = '';
        }
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