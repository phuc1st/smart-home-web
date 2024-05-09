<?php
session_start();
require '../db/connect.php';
require 'lib/order.php';
require '../lib/product.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'list_order';
$path = "./pages/{$page}.php";
 
require '../lib/user.php';
require '../lib/is_admin.php'; 
if(!is_login() && !is_admin()) 
{
    // echo "<script>alert('".is_login()."');</script>";
    header('Location: ../index.php');     

}

        
require './inc/header.php';
require "{$path}";


require './inc/footer.php';
?>