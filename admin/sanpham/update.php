<?php
    if(is_array($sanpham)){
        extract($sanpham);
    }
$hinhpath="../upload/".$img;
if(is_file($hinhpath)){
    $hinhpath="<img src='".$hinhpath."' width='100px' header='100px'>";
}else{
    $hinhpath="Lỗi";
}
?>
<div class="row2">
         <div class="row2 font_title">
          <h1>CẬP NHẬT SẢN PHẨM</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
              <div class="row2 mb10 form_content_container">
                  <label> Danh mục </label> <br>
                  <select name="iddm" id="">
<!--                      <option value="">Danh mục 1</option>-->
<!--                      <option value="">Danh mục 2</option>-->
                      <?php
                      foreach ($listdanhmuc as $danhmuc){
                          extract($danhmuc);
                          echo '<option value="'.$id.'">'.$name.'</option>';
                      }
                      ?>
                  </select>
              </div>
           <div class="row2 mb10 form_content_container">
           <label> Tên sản phẩm </label> <br>
            <input type="text" name="tensp" value="<?=$name?>">
           </div>
           <div class="row2 mb10">
            <label>Giá sản phẩm </label> <br>
            <input type="text" name="giasp" value="<?=$price?>">
           </div>
              <div class="row2 mb10">
                  <label>Hình ảnh </label> <br>
                  <input type="file" name="hinh" >
                  <?php echo $hinhpath?>
              </div>
              <div class="row2 mb10">
                  <label>Mô tả </label> <br>
                  <textarea name="mota" cols="30" rows="10"  value="<?=$mota?>">></textarea>
              </div>
           <div class="row mb10 ">
         <input type="hidden" name="id"  value="<?=$id?>">
         <input class="mr20" name="themmoi" type="submit" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
              <?php
              if(isset($thanhcong)&& ($thanhcong!="")){
                  echo $thanhcong;
              }

              ?>
          </form>
         </div>
        </div>