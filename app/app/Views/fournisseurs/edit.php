<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
</head>

<body>
    <h1>Edit Supplier</h1>
    <form action="/fournisseurs/update/<?= $fournisseur['id'] ?>" method="post">
        <label for="nom">Name:</label>
        <input type="text" name="nom" id="nom" value="<?= $fournisseur['nom'] ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= $fournisseur['email'] ?>" required>

        <label for="telephone">Telephone:</label>
        <input type="text" name="telephone" id="telephone" value="<?= $fournisseur['telephone'] ?>" required>

        <label for="adresse">Address:</label>
        <textarea name="adresse" id="adresse"><?= $fournisseur['adresse'] ?></textarea>

        <button type="submit">Update</button>
    </form>
    <a href="/fournisseurs">Back to List</a>
</body>

</html>