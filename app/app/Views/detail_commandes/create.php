<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Order Detail</title>
</head>

<body>
    <h1>Add Order Detail</h1>
    <form action="/detailcommandes/store" method="post">
        <label for="commande_id">Order ID:</label>
        <input type="number" name="commande_id" id="commande_id" required>

        <label for="produit_id">Product ID:</label>
        <input type="number" name="produit_id" id="produit_id" required>

        <label for="quantite">Quantity:</label>
        <input type="number" name="quantite" id="quantite" required>

        <label for="prix_unitaire">Unit Price:</label>
        <input type="number" step="0.01" name="prix_unitaire" id="prix_unitaire" required>

        <button type="submit">Save</button>
    </form>
    <a href="/detailcommandes">Back to List</a>
</body>

</html>