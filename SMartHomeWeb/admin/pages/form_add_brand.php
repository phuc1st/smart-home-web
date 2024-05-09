<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; 
        $list_cat = get_category();?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm danh mục phụ</h3>
                </div>              
                <p class="success" style="color:lawngreen"><?php if (isset($success1)) {echo $success1;} ?>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?page=add_brand" method="POST">
                    <label>Tên danh mục</label>
                    <select name="cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php 
                                foreach ($list_cat as $cat_item) {?>
                                    <option value="<?php echo $cat_item['cat_id']?>"><?php echo $cat_item['cat_name']?></option>
                                <?php
                                }
                            ?>
                        </select>                      
                        <label for="brand_name">Tên danh mục phụ</label>
                        <input type="text" name="brand_name" id="brand_name">
                        <button type="submit"name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

