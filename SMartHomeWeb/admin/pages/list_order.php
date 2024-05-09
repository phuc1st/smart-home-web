<?php 


if (!isset($_POST['btn_search'])) {
    $list_order = get_detail_order();
}
else {
    $info = $_POST['info'];
    $sql = "
    with tab as (
        select order_id, sum(quantity) sl from tbl_orderdetail GROUP BY order_id
    )
    select distinct * 
    from tbl_user inner join tbl_order on tbl_user.user_id = tbl_order.user_id
        inner join tab on tab.order_id = tbl_order.order_id
    where fullname like '%$info%' or tbl_order.order_id like '%$info%'";


    $result = mysqli_query($con, $sql);
    $list_order = array();
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($list_order, $row);
        }
    }
};

?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">                       
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="info" id="s">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số sản phẩm</span></td>
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($list_order) > 0) { $count=0; foreach ($list_order as $item) { $count++;?>
                                    <tr>                              
                                        <td><span class="tbody-text"><?= $count;?></h3></span>
                                        <td><span class="tbody-text"><?= $item['order_id'];?></h3></span>
                                        <td>
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><?= $item['fullname'];?></a>
                                            </div>
                                            
                                        </td>
                                        <td><span class="tbody-text"><?= $item['sl'];?></span></td>
                                        <td><span class="tbody-text"><?= $item['total_price'];?></span></td>
                                        <td><span class="tbody-text"><?= $item['status'];?></span></td>
                                        <td><span class="tbody-text"><?= $item['date'];?></span></td>
                                        <td><a href="?page=detail_order&order_id=<?= $item['order_id'];?>" title="" class="tbody-text">Chi tiết</a></td>
                                    </tr>
                                <?php }}?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>                   
                </div>
            </div>
        </div>
    </div>
</div>