<?php

class Product
{
    public function getAllProduct()
    {
        require_once('connect.php');
        $stmt = $conn->prepare('SELECT * FROM products');
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function store($name = '', $description = '', $price = '', $image = '')
    {
        require_once('connect.php');
        $mess = "";
        if ($name != "") {
            $sql = "INSERT INTO products (name, description, price, image)
                    VALUES ('" . $name . "', '" . $description . "', '" . $price . "', '" . $image . "')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $mess = "Thêm thành công";
        } else {
            $mess = "không được để rỗng tên";
        }
        return $mess;
    }

    public function deleteProductByID($id)
    {
        require_once('connect.php');

        $stmt = $conn->prepare('DELETE FROM products WHERE id = :id');
        $stmt->bindParam('id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getProductByID($id)
    {
        require_once('connect.php');

        $stmt = $conn->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $description, $price, $image)
    {

        $host = 'localhost'; // Máy chủ
        $dbname = 'dblab5'; // Tên cơ sở dữ liệu
        $username = 'root'; // Tên người dùng
        $password = ''; // Mật khẩu

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'Lỗi kết nối' . $e->getMessage();
        }


        if ($image !== '') {
            $sql = "UPDATE products SET name = :name, description = :description, price = :price, image = :image WHERE id = :id";
        } else {
            // Nếu không có ảnh mới, bỏ qua việc cập nhật ảnh
            $sql = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id";
        }


        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        if ($image !== '') {
            $stmt->bindParam(':image', $image);
        }
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}