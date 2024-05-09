<?php 

if (!isset($_POST['btn_search'])) {
    $list_order = get_detail_ordered_customer();
}
else {
    $info = $_POST['info'];



    $sql = "
    with tab as (
        select tbl_user.user_id, sum(tbl_orderdetail.quantity) sl 
        from tbl_orderdetail 
             inner join tbl_order on tbl_orderdetail.order_id = tbl_order.order_id
             inner join tbl_user on tbl_order.user_id = tbl_user.user_id
        GROUP by tbl_user.user_id
    )
    select distinct * 
    from tbl_user inner join tbl_order on tbl_user.user_id = tbl_order.user_id
        inner join tab on tab.user_id = tbl_user.user_id
    where fullname like '%$info%' or tbl_user.phone_num like '%$info%'
    or tbl_user.email like '%$info%' or tbl_user.address like '%$info%'";


    $result = mysqli_query($con, $sql);
    $list_order = array();
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($list_order, $row);
        }
    }
}

?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
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
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Đơn hàng</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (count($list_order) > 0) { $count=0; foreach ($list_order as $item) { $count++;?>
                                <tr>
                                    <td><span class="tbody-text"><?= $count; ?></h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?= $item['fullname'] ?></a>
                                        </div>
                                    </td>
                                    <td><span class="tbody-text"><?= $item['phone_num'] ?></span></td>
                                    <td><span class="tbody-text"><?= $item['email'] ?></span></td>
                                    <td><span class="tbody-text"><?= $item['address'] ?></span></td>
                                    <td><span class="tbody-text"><?= $item['sl'] ?></span></td>
                                </tr>
                                </td>
                                </tr>
                                <?php }}?>
                                
                                
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>