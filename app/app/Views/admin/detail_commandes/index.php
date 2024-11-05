<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
</head>

<body>
    <h1>Order Details</h1>
    <a href="/detailcommandes/create">Add New Order Detail</a>
    <ul>
        <?php foreach ($detailCommandes as $detailCommande): ?>
            <li>
                Commande ID: <?= $detailCommande['commande_id'] ?> |
                Product ID: <?= $detailCommande['produit_id'] ?> |
                Quantity: <?= $detailCommande['quantite'] ?> |
                Unit Price: <?= $detailCommande['prix_unitaire'] ?>
                <a href="/detailcommandes/edit/<?= $detailCommande['id'] ?>">Edit</a>
                <a href="/detailcommandes/delete/<?= $detailCommande['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>