<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href=".//assets/style/list-product.css">
    <link rel="stylesheet" href=".//assets/style/list-style.css">
</head>

<body>
    <a href="index.php?route=admin/login" class="btn">Quản lý sản phẩm</a>
    <div class="container">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <img src="./assets/image/<?= $product['image'] ?>" alt="<? $product['name'] ?>" > <br>
                    <h3><?= $product['name'] ?></h3> <br>
                    <p><?= $product['description'] ?></p> <br>
                    <h2><?= $product['price'] ?></h2> <br>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm nào.</p>
        <?php endif; ?>
    </div>
</body>

</html>