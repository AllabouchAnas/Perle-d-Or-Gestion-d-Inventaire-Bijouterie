<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Suppliers</title>
</head>

<body>
    <h1>Suppliers</h1>
    <a href="/fournisseurs/create">Add New Supplier</a>
    <ul>
        <?php foreach ($fournisseurs as $fournisseur): ?>
            <li>
                <?= $fournisseur['nom'] ?> (<?= $fournisseur['email'] ?>) | Tel: <?= $fournisseur['telephone'] ?>
                <a href="/fournisseurs/edit/<?= $fournisseur['id'] ?>">Edit</a>
                <a href="/fournisseurs/delete/<?= $fournisseur['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>