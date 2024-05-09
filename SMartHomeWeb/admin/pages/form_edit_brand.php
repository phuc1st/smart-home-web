<?php
$id=$_GET['id'];
$brand_name = $_GET['name'];
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa danh mục phụ</h3>
                </div>                
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?page=edit_brand&id=<?=$id?>"method="POST" id="my-form">
                        <label for="brand_name">Tên danh mục phụ</label>
                        <input type="text" name="brand_name" id="brand_name" value="<?=$brand_name?>">
                        <button  name="btn-submit" id="btn-submit"> Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  document.getElementById("btn-submit").addEventListener("click", function(event) {
    event.preventDefault(); // Ngăn chặn gửi dữ liệu form mặc định

    var inputField = document.getElementById("brand_name");
    if (inputField.value.trim() === "") {
      alert("Trường input không được để trống");
    } else {      
      document.getElementById("my-form").submit();
    }
  });
</script>