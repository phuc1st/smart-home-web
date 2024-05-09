<?php 
$vl = array(0,1,2,3,4);
$list_product = "";
if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    if(isset($_GET['brand_id']))
    {
        $brand_id = $_GET['brand_id'];
        $list_product = get_list_product_by_catid_brand_id($cat_id, $brand_id);
    }
    else
        $list_product = get_list_product_by_catid($cat_id);
}
else {
    $list_product = get_list_product();
}
?>
<?php get_component('header'); ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp" style="margin-bottom: 40px;">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home&act=main" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><?= isset($_GET['cat_id'])?get_category_by_catid($cat_id):"Sản phẩm"?></a>
                    </li>
                    <?php
                        if(isset($_GET['brand_id']))
                        {
                            echo '<li> <a href="javascript:void(0)">';
                            get_brand_by_brandid($brand_id);
                            echo '</a> </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right" style="width: 100%;">
            <div class="section" id="list-product-wp">
                <div class="section-head" style="display: flex;align-items: center;justify-content: space-between;margin-bottom: 20px;">
                    <h3 class="section-title fl-left"><?= isset($_GET['cat_id'])?get_category_by_catid($cat_id):"Sản phẩm"?>
                    <?php
                        if(isset($_GET['brand_id']))
                        {
                            echo '<i class="fa-solid fa-angle-right"></i> ';
                            get_brand_by_brandid($brand_id);
                        }
                    ?>
                    </h3>
                    <div class="filter-wp fl-right">
                        <!-- <p class="desc">Hiển thị 45 trên 50 sản phẩm</p> -->
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                            
                                <option value='<?=$vl[1]?>' selected>Từ A-Z</option>;
                                <option value='<?=$vl[2]?>' selected>Từ Z-A</option>;
                                <option value='<?=$vl[3]?>' selected>Giá cao xuống thấp</option>;
                                <option value='<?=$vl[4]?>' selected>Giá thấp lên cao</option>;
                                
                                </select>
                                <button type="submit" name="btn-filter" value="">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                        <?php 
                            if (!isset($_POST['btn-filter'])) {
                                if (count($list_product) > 0) 
                                { ?>
                                    <?php include('list_product.php') ?>
                                <?php }
                                else
                                    echo '<h3 style="font-size: 20px;padding: 0 0 40px 0;">Sản phẩm trống</h3>';
                                ?>
                            <?php } else {?>
                                <?php
                                    $list_product = filter_product();
                                    $value = $_POST['select']; 
                                    if (count($list_product) > 0) 
                                        include('list_product.php');
                                    else echo '<h3 style="font-size: 20px;padding: 0 0 40px 0;">Sản phẩm trống</h3>';
                                }?>                   
        </div>
    </div>
</div>
<?php get_component('footer'); ?>