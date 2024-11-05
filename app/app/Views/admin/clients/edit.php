<h1>Edit Client</h1>
<form action="/clients/update/<?= $client['id'] ?>" method="post">
    <label for="nom">Name:</label>
    <input type="text" name="nom" id="nom" value="<?= $client['nom'] ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= $client['email'] ?>" required>

    <label for="telephone">Telephone:</label>
    <input type="text" name="telephone" id="telephone" value="<?= $client['telephone'] ?>" required>

    <label for="adresse">Address:</label>
    <textarea name="adresse" id="adresse"><?= $client['adresse'] ?></textarea>

    <button type="submit">Update</button>
</form>
<a href="/clients">Back to List</a>