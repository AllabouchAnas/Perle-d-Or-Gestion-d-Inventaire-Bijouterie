<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Order Detail</title>
</head>

<body>
    <h1>Edit Order Detail</h1>
    <form action="/detailcommandes/update/<?= $detailCommande['id'] ?>" method="post">
        <label for="commande_id">Order ID:</label>
        <input type="number" name="commande_id" id="commande_id" value="<?= $detailCommande['commande_id'] ?>" required>

        <label for="produit_id">Product ID:</label>
        <input type="number" name="produit_id" id="produit_id" value="<?= $detailCommande['produit_id'] ?>" required>

        <label for="quantite">Quantity:</label>
        <input type="number" name="quantite" id="quantite" value="<?= $detailCommande['quantite'] ?>" required>

        <label for="prix_unitaire">Unit Price:</label>
        <input type="number" step="0.01" name="prix_unitaire" id="prix_unitaire" value="<?= $detailCommande['prix_unitaire'] ?>" required>

        <button type="submit">Update</button>
    </form>
    <a href="/detailcommandes">Back to List</a>
</body>

</html>