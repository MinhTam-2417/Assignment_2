<?php

class Home_controller
{
    public function ListProduct()
    {
        require_once('./model/product.php');

        //khởi tạo đối tượng product và lấy all sản phẩm
        $productModel = new Product();
        $products = $productModel->getAllProduct();

        include('./view/admin/header.php');
        include('./view/list-product.php');
        include('./view/admin/footer.php');
    }
}