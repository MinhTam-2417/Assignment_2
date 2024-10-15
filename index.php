<?php

$route = isset($_GET['route']) ? $_GET['route'] : '';
require_once('./controller/home-controller.php');
require_once('./controller/admin/product-controller.php');
$product = new ProductController();
$homeProduct = new Home_controller();

switch ($route) {
    case 'admin/login':
        $product->login();
        break;
    case 'admin/logout':
        $product->logout();
        break;
    case 'admin/product/listing':
        $product->listing();
        break;
    case 'admin/product/create':
        $product->create();
        break;
    case 'admin/product/update':
        $product->update();
        break;
    case 'admin/product/delete':
        $product->delete();
        break;
    default:
        $homeProduct->ListProduct();
        break;
}