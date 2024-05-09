<?php
    global $con;
    $info = $_POST['inputValue'];
    $info = mysqli_escape_string($con, $info);
    $sql = "select pro_name from tbl_product where pro_name like '%$info%' limit 10";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_row($result)) {
           echo '<p> <a href="?mod=product&act=search&info='.$row[0].'">'.$row[0].'</a></p>';
        }
    }  
?>
