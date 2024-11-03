<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>

<body>
    <h1>Products</h1>
    <a href="/produits/create">Add New Product</a>
    <ul>
        <?php foreach ($produits as $produit): ?>
            <li>
                <?= $produit['nom'] ?> - Price: <?= $produit['prix'] ?> | Stock: <?= $produit['quantite_en_stock'] ?>
                <a href="/produits/edit/<?= $produit['id'] ?>">Edit</a>
                <a href="/produits/delete/<?= $produit['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>