<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=".//assets/style/product-listing.css">
    <link rel="stylesheet" href=".//assets/style/product-style.css">
</head>

<body>
    <h1>Danh sách sp</h1>
    <a href="index.php?route=admin/logout" class="btn">Logout</a>
    <a href="http://localhost/PHP_1/Lab/Lab_5/index.php?route=admin/product/create" class="btn">Thêm sản phẩm</a>
    <table class="styled-table">
        <tr class="active-row">
            <th>Ảnh đại diện</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả ngắn</th>
            <th>Giá</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($products as $row): ?>
            <tr>
                <td><img src="./assets/image/<?= $row['image'] ?>" alt="<?= $row['name'] ?>" style="width:100px;"></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['price'] ?></td>
                <td>
                    <form action="index.php?route=admin/product/delete&id=<?= $row['id'] ?>" method="post">
                        <button type="submit">Xóa</button>
                    </form>
                </td>
                <td>
                    <form action="index.php?route=admin/product/update&id=<?= $row['id'] ?>" method="post">
                        <button type="submit">Sửa</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>