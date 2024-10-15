<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".//assets/style/product-create.css">
    <title>Add Product</title>
</head>

<body>
    <h1>Add product</h1>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr>
                <td>Mô tả ngắn</td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="image"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>