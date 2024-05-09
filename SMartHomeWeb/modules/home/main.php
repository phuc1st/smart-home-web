<?php get_component('header'); ?>
<?php 
$list_camera = get_list_product_by_catid(1);
$list_autogate = get_list_product_by_catid(0);
$list_sensor = get_list_product_by_catid(2);
$list_led = get_list_product_by_catid(3);
$list_ot_product = get_list_outstanding_product();//sản phẩm nổi bậc
$list_cat =  get_category();
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/sli4.webp" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/sli2.webp" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/sli5.webp" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sản phẩm nổi bật  -->
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                    <?php if (count($list_ot_product) > 0) {
                            for ($i = 0; $i < 10; $i++) {?>
                                <li>
                                <a href="?mod=product&act=detail&id=<?= $list_ot_product[$i]['pro_id']?>&cat_id=<?= $list_ot_product[$i]['cat_id']?>" title="" class="thumb">
                                    <img src="<?= $list_ot_product[$i]['pro_image'] ?>" style="object-fit: contain;width: 100%;height: 174px;">
                                </a>
                                <a href="?mod=product&act=detail&id=<?= $list_ot_product[$i]['pro_id']?>&cat_id=<?= $list_ot_product[$i]['cat_id']?>" title="" class="product-name"><?=$list_ot_product[$i]['pro_name']?></a>
                                <div class="price">
                                    <span class="new"><?=currency_format($list_ot_product[$i]['promotional_price'])?></span>
                                    <span class="old"><?=currency_format($list_ot_product[$i]['original_price'])?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?mod=cart&act=add&pro_id=<?=$list_ot_product[$i]['pro_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=cart&act=add&pro_id=<?=$list_ot_product[$i]['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                    <?php }?>
                    <?php } ?>
                    </ul>
                </div>
            </div>

            <!-- Danh sách sản phẩm  -->
            <?php
                if(!empty($list_cat))
                {
                    foreach($list_cat as $row){
                        $list_product = get_list_product_by_catid($row['cat_id']);
                        if(!empty($list_product)){ ?>                            
                            <div class="section" id="list-product-wp">
                                <div class="section-head">
                                    <h3 class="section-title" style="margin-top: 0;"><?=$row['cat_name']?></h3>
                                </div>
                                <div class="section-detail">
                                    <ul class="list-item clearfix">
                                <?php        
                                    $end = count($list_product);
                                    $end = $end < 4 ? $end : 4;
                                    for ($i = 0; $i < $end; $i++) {?>
                                        <li>
                                        <a href="?mod=product&act=detail&id=<?= $list_product[$i]['pro_id']?>&cat_id=<?= $list_product[$i]['cat_id']?>" title="" class="thumb">
                                            <img src="<?= $list_product[$i]['pro_image'] ?>" style="object-fit: contain;width: 100%;height: 174px;">
                                        </a>
                                        <a href="?mod=product&act=detail&id=<?= $list_product[$i]['pro_id']?>&cat_id=<?= $list_product[$i]['cat_id']?>" title="" class="product-name"><?=$list_product[$i]['pro_name']?></a>
                                        <div class="price">
                                            <span class="new"><?=currency_format($list_product[$i]['promotional_price'])?></span>
                                            <span class="old"><?=currency_format($list_product[$i]['original_price'])?></span>
                                        </div>
                                        <div class="action clearfix">
                                            <a href="?mod=cart&act=add&pro_id=<?=$list_product[$i]['pro_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                            <a href="?mod=cart&act=add&pro_id=<?=$list_product[$i]['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </li>
                                            <?php }?>
                                    </ul>
                                </div>
                        </div>
            <?php            
                        }
                    }
                }
            ?>                   

        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                            if(!empty($list_cat))
                            {
                                foreach($list_cat as $row){                                    
                                    echo "<li data-catid='{$row['cat_id']}'><a href='?mod=product&act=main&cat_id={$row['cat_id']}'>{$row['cat_name']}</a></li>";
                                }
                            }
                        ?>                       
                    </ul>
                    <?php
                         if(!empty($list_cat))
                         {
                             foreach($list_cat as $row){                                    
                                 $list_brand = get_brand_by_cat_id($row['cat_id']);
                                 if(!empty($list_brand))
                                 {
                                    echo '<div class="sub__category" data-catid="'.$row["cat_id"].'">';
                                    foreach($list_brand as $brand)
                                    {
                                    ?>
                                        <p><a href="?mod=product&act=main&cat_id=<?=$brand['cat_id']?>&brand_id=<?=$brand['brand_id']?>"><?=$brand['brand_name']?></a></p>
                                    
                    <?php           } 
                                    echo '</div>';        
                                 }
                             }
                         }
                    ?>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php if (count($list_ot_product) > 0) {
                            for ($i = 0; $i < 6; $i++) {?>
                            <li class="clearfix">
                            <a href="?mod=product&act=detail&id=<?= $list_ot_product[$i]['pro_id']?>&cat_id=<?= $list_ot_product[$i]['cat_id']?>" title="" class="thumb fl-left">
                                <img src="<?= $list_ot_product[$i]['pro_image']?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" 
                                href="?mod=product&act=detail&id=<?= $list_ot_product[$i]['pro_id']?>&cat_id=<?= $list_ot_product[$i]['cat_id']?>" title="" class="product-name"> <?=$list_ot_product[$i]['pro_name']?></a>
                                <div class="price">
                                    <span class="new"><?=currency_format($list_ot_product[$i]['promotional_price'])?></span>
                                    <span class="old"><?=currency_format($list_ot_product[$i]['original_price'])?></span>
                                </div>
                                <a href="?mod=cart&act=main" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <?php }}?>
                    </ul>
                </div>
            </div>
          
        </div>
    </div>
</div>
<?php get_component('footer'); ?>