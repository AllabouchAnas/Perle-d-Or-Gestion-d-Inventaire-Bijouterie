<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Orders</title>
</head>

<body>
    <h1>Orders</h1>
    <a href="/commandes/create">Add New Order</a>
    <ul>
        <?php foreach ($commandes as $commande): ?>
            <li>
                Order ID: <?= $commande['id'] ?> | Date: <?= $commande['date_commande'] ?> | Status: <?= $commande['statut'] ?> | Total Price: <?= $commande['prix_total'] ?>
                <a href="/commandes/edit/<?= $commande['id'] ?>">Edit</a>
                <a href="/commandes/delete/<?= $commande['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>