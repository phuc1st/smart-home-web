<?php
    $id=$_GET['id'];
    $brand_name=$_POST['brand_name'];
    $brand_name = mysqli_escape_string($con, $brand_name);
    $sql_update="UPDATE tbl_brand SET brand_name='$brand_name' WHERE brand_id='$id'";
    mysqli_query($con,$sql_update);
    echo "<script>alert('Bạn đã sửa thành công!')</script>";
    require("list_brand.php");
?>
