<?php
        $brand_name=$_POST['brand_name'];
        $cat_id = $_POST['cat'];
        $brand_name = mysqli_escape_string($con, $brand_name);
        if(!empty($brand_name))
        {
            $sql1="SELECT brand_name FROM tbl_brand WHERE brand_name='$brand_name'";
            $rs=mysqli_query($con,$sql1);
            $list=array();
            while($r=mysqli_fetch_array($rs))
            {
                $list[]=$r;
            }
            if(count($list)<=0)
            {
                $sql="INSERT INTO tbl_brand(brand_name, cat_id) VALUES ('$brand_name','$cat_id')";
                mysqli_query($con,$sql);
                echo "<script>alert('Bạn đã thêm thành công!')</script>";
                require("list_brand.php");
    
            }
            else{
                $success1="Tên danh mục này đã tồn tại";
            }

        }
        else{
            $success1="Tên danh mục không bỏ trống";
        }
?>