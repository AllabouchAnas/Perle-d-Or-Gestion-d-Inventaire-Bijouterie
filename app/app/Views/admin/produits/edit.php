<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Product</h1>
    <form action="/produits/update/<?= $produit['id'] ?>" method="post">
        <label for="nom">Name:</label>
        <input type="text" name="nom" id="nom" value="<?= $produit['nom'] ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description"><?= $produit['description'] ?></textarea>

        <label for="prix">Price:</label>
        <input type="number" step="0.01" name="prix" id="prix" value="<?= $produit['prix'] ?>" required>

        <label for="quantite_en_stock">Stock Quantity:</label>
        <input type="number" name="quantite_en_stock" id="quantite_en_stock" value="<?= $produit['quantite_en_stock'] ?>" required>

        <label for="materiau">Material:</label>
        <input type="text" name="materiau" id="materiau" value="<?= $produit['materiau'] ?>" required>

        <label for="pierre_precieuse">Precious Stone:</label>
        <input type="text" name="pierre_precieuse" id="pierre_precieuse" value="<?= $produit['pierre_precieuse'] ?>">

        <label for="categorie_id">Category ID:</label>
        <input type="number" name="categorie_id" id="categorie_id" value="<?= $produit['categorie_id'] ?>" required>

        <label for="fournisseur_id">Supplier ID:</label>
        <input type="number" name="fournisseur_id" id="fournisseur_id" value="<?= $produit['fournisseur_id'] ?>" required>

        <button type="submit">Update</button>
    </form>
    <a href="/produits">Back to List</a>
</body>

</html>