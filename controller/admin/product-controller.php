<?php

class ProductController
{
    public function listing()
    {
        session_start();
        if(!isset($_SESSION['admin_logged_in'])){
            header('location: index.php?route=admin/login');
            exit();
        }

        require_once('./model/product.php');
        $productModel = new Product();
        $products = $productModel->getAllProduct();

        include('view/admin/header.php');
        include('view/admin/product-listing.php');
    }

    public function create()
    {
        require_once('./model/product.php');

        if (isset($_POST['submit'])) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';

            // Xử lý upload ảnh
            $fileImage = $_FILES['image'];
            $imageName = '';

            if (getimagesize($fileImage['tmp_name']) !== false) {
                $imageName = time() . $fileImage['name'];
                $sourceFile = $fileImage['tmp_name'];
                $targetFile = 'assets/image/' . $imageName;

                echo "imageName: " . $imageName . "<br>";
                echo "Target File: " . $targetFile;

                if (move_uploaded_file($sourceFile, $targetFile)) {
                    echo "Ảnh đã được upload thành công!";
                } else {
                    echo "Có lỗi xảy ra khi upload ảnh.";
                }
            } else {
                echo "File không phải là ảnh hợp lệ";
            }

            $productModel = new Product();
            $mess = $productModel->store($name, $description, $price, $imageName);
            header("location:index.php?route=admin/product/listing");
            exit();
        }

        include('view/admin/product-create.php');
        include('view/admin/footer.php');
    }

    public function delete()
    {
        require_once('./model/product.php');

        $productModel = new Product();

        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($id > 0) {
            $productModel->deleteProductByID($id);

            header('location: index.php?route=admin/product/listing');
            exit();
        } else {
            echo "id không hợp lệ";
        }
    }

    public function update()
    {
        require_once('./model/product.php');

        $productModel = new Product();
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $product = $productModel->getProductByID($id);

        if (isset($_POST['submit'])) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';

            $fileImage = $_FILES['image'];
            $imageName = '';

            if ($fileImage['tmp_name'] !== '') {
                if (getimagesize($fileImage['tmp_name']) !== false) {
                    $imageName = time() . $fileImage['name'];
                    $sourceFile = $fileImage['tmp_name'];
                    $targetFile = './assets/image/' . $imageName;
                    move_uploaded_file($sourceFile, $targetFile);
                } else {
                    echo "File không phải là ảnh hợp lệ";
                }
            } else {
                $imageName = $_POST['old_image'];
            }

            $productModel = new Product();
            $productModel->updateProduct($id, $name, $description, $price, $imageName);

            header("location:index.php?route=admin/product/listing");
            exit();
        }

        include('view/admin/product-edit.php');
        include('view/admin/footer.php');
    }


    public function login()
    {
        require_once('./model/admin.php');

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = "mihtam";
            $pass = "280904";

            $adminModel = new Admin();
            $admin = $adminModel->getAdminByUsername($username);

            if ($user == $username && $pass == $password) {
                session_start();
                $_SESSION['admin_logged_in'] = true;

                header('location: index.php?route=admin/product/listing');
                exit();
            } else {
                echo "Invalid User name or Password";
            }
        }

        include('./view/admin/admin-login.php');

    }


    public function logout()
    {
        session_start();
        unset($_SESSION['admin_logged_in']);
        header('location: index.php');
        exit();
    }
}