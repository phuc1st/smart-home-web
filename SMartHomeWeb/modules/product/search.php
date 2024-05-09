<?php 
if (isset($_POST['btn-search'])) {
    $info = $_POST['info'];
    $list_product = get_list_product_by_seach($info);
}
if (isset($_GET['info'])) {
    $info = $_GET['info'];
    $list_product = get_list_product_by_seach($info);
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
                        <a href="?mode=home&act=main" title="">Sản phẩm tìm kiếm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right" style="width: 100%;">
            <h2 style="font-size: 20px; margin: 15px 0;">Sản phẩm tìm kiếm</h2>
            <div class="section" id="list-product-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php 
                        if(isset($list_product))   
                            if (count($list_product) > 0) 
                                include('list_product.php');
                            else
                                echo '<li>Sản phẩm không tồn tại </li></ul>
                                </div>
                            </div>';
                        ?>                
        </div>
    </div>
</div>
<?php get_component('footer'); ?>