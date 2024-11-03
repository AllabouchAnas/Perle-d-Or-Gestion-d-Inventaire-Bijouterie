<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Supplier</title>
</head>

<body>
    <h1>Add Supplier</h1>
    <form action="/fournisseurs/store" method="post">
        <label for="nom">Name:</label>
        <input type="text" name="nom" id="nom" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="telephone">Telephone:</label>
        <input type="text" name="telephone" id="telephone" required>

        <label for="adresse">Address:</label>
        <textarea name="adresse" id="adresse"></textarea>

        <button type="submit">Save</button>
    </form>
    <a href="/fournisseurs">Back to List</a>
</body>

</html>