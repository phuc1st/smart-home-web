<?php
$id=$_GET['id'];
$delete="DELETE FROM tbl_brand WHERE brand_id=$id";
mysqli_query($con,$delete);
require("list_brand.php");
?>
