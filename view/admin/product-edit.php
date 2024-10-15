<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".//assets/style/product-edit.css">
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Product</h1>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="name" value="<?= $product['name'] ?>"></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="price" value="<?= $product['price'] ?>"></td>
            </tr>
            <tr>
                <td>Mô tả ngắn</td>
                <td><input type="text" name="description" value="<?= $product['description'] ?>"></td>
            </tr>
            <tr>
                <td>Hình ảnh hiện tại</td>
                <td><img src="/ASM_2/assets/image/<?= $product['image'] ?>" alt="<?= $product['name'] ?>"
                        style="width:100px;"></td>
            </tr>
            <tr>
                <td>Chọn hình ảnh mới (nếu muốn thay đổi)</td>
                <td><input type="file" name="image"></td>
            </tr>
            <input type="hidden" name="old_image" value="<?= $product['image'] ?>">
        </table>
        <button type="submit" name="submit">Cập nhật</button>
    </form>
</body>

</html>