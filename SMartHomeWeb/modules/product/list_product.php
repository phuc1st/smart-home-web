<?php 
    echo '<ul class="list-item clearfix">';
                   
    $so_du_lieu = 16;
	if(!isset($_GET['trang'])){$vtbd=0; $_GET['trang']=1;}else{$vtbd=($_GET['trang']-1)*$so_du_lieu;}
    $vtkt = $vtbd + $so_du_lieu -1;
    if ($vtkt >= count($list_product))  $vtkt =  count($list_product) -1; 
    $so_trang = ceil(count($list_product)/$so_du_lieu);
    for ($i = $vtbd; $i <= $vtkt; $i++ )
    {
        $item = $list_product[$i]; ?>
        <li>
                <a href="?mod=product&act=detail&id=<?= $item['pro_id']?>&cat_id=<?= $item['cat_id'] ?>" title="" class="thumb" style="width:100%" height="350px">
                    <img src="<?= $item['pro_image'] ?>" style="object-fit: contain;width: 100%;height: 174px"> 
                </a>
                <a href="?mod=product&act=detail&id=<?= $item['pro_id']?>&cat_id=<?= $item['cat_id'] ?>" title="" class="product-name"><?= $item['pro_name'] ?></a>
                <div class="price">
                    <span class="old"><?= currency_format($item['original_price']) ?></span>
                    <span class="new"><?= currency_format($item['promotional_price'])?></span>
                </div>
                <div class="action clearfix">
                    <a href="?mod=cart&act=add&pro_id=<?= $item['pro_id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                    <a href="?mod=cart&act=add&pro_id=<?= $item['pro_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                </div>
            </li>
        
    <?php }
    $link = "?mod=product&act=main"; 
    if (isset($_GET['cat_id'])) {
        $link.= "&cat_id=".$_GET['cat_id'];
    }
    echo '</ul> </div> </div>';
    
    if($so_trang > 1)
    {
        echo '<div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">';
                        for($i=1;$i<=$so_trang;$i++)
                        {   
                            if($i==$_GET['trang'])
                                echo '<li>
                                <a href="javascript:void(0)">'.$i.'</a>
                                </li>';
                            else
                                echo '<li>
                                <a href="'.$link.'&trang='.$i.'">'.$i.'</a>
                                </li>';
                        }
                            
        echo '      </ul>
                </div>
            </div>';
    }
	
    ?>


                               