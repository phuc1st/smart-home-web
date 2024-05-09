<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục phụ</h3>
                    <a href="?page=form_add_brand" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                                <tr>
                                    <th><span class="thead-text">STT</span></th>
                                    <th><span class="thead-text">Danh mục</span></th>
                                    <th><span class="thead-text">Danh mục phụ</span></th>
                                    <th><span class="thead-text">Tùy chọn</span></th>
                                </tr>
                                <?php
                                $sql="SELECT cat_name, brand_name, brand_id FROM tbl_brand INNER JOIN(tbl_category) on tbl_brand.cat_id = tbl_category.cat_id;";
                                $rs=mysqli_query($con,$sql);
                                $count=0;
                                while($r=mysqli_fetch_assoc($rs))
                                {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><?=$count?></td>
                                        <td><?=$r['cat_name']?></td>
                                        <td><?=$r['brand_name']?></td>                                        
                                        <td>
                                        <a href="?page=form_edit_brand&id=<?=$r['brand_id']?>&name=<?=$r['brand_name']?>" title="Sửa" class="edit" style=margin:10px><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="?page=delete_brand&id=<?=$r['brand_id']?>" title="Xóa" class="delete" style=margin:10px><i class="fa fa-trash" aria-hidden="true"  onclick='return confirm("Bạn chắc chắn muốn tiếp tục xóa không?")'></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                        </table>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>