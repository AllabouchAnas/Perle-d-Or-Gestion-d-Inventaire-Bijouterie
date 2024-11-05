<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Order</title>
</head>

<body>
    <h1>Add Order</h1>
    <form action="/commandes/store" method="post">
        <label for="date_commande">Order Date:</label>
        <input type="date" name="date_commande" id="date_commande" required>

        <label for="statut">Status:</label>
        <input type="text" name="statut" id="statut" required>

        <label for="prix_total">Total Price:</label>
        <input type="number" step="0.01" name="prix_total" id="prix_total" required>

        <label for="client_id">Client ID:</label>
        <input type="number" name="client_id" id="client_id" required>

        <button type="submit">Save</button>
    </form>
    <a href="/commandes">Back to List</a>
</body>

</html>