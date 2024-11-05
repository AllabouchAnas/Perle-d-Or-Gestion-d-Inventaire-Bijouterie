<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
</head>

<body>
    <h1>Edit Order</h1>
    <form action="/commandes/update/<?= $commande['id'] ?>" method="post">
        <label for="date_commande">Order Date:</label>
        <input type="date" name="date_commande" id="date_commande" value="<?= $commande['date_commande'] ?>" required>

        <label for="statut">Status:</label>
        <input type="text" name="statut" id="statut" value="<?= $commande['statut'] ?>" required>

        <label for="prix_total">Total Price:</label>
        <input type="number" step="0.01" name="prix_total" id="prix_total" value="<?= $commande['prix_total'] ?>" required>

        <label for="client_id">Client ID:</label>
        <input type="number" name="client_id" id="client_id" value="<?= $commande['client_id'] ?>" required>

        <button type="submit">Update</button>
    </form>
    <a href="/commandes">Back to List</a>
</body>

</html>