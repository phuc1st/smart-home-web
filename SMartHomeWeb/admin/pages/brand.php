<?php 
    require '../db/connect.php';
    require '../../lib/product.php';
    $list_brand = get_brand_by_cat_id($_POST['catid']);
    echo '<option value="">-- Chọn danh mục --</option>';
    foreach($list_brand as $brand_item)
    {
        echo'<option value="'.$brand_item["brand_id"].'">'.$brand_item["brand_name"].'</option>';
    }
?>