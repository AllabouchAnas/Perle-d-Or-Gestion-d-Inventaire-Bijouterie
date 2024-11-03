<h1>Edit Category</h1>
<form action="/categories/update/<?= $category['id'] ?>" method="post">
    <label for="nom">Name</label>
    <input type="text" name="nom" id="nom" value="<?= $category['nom'] ?>">
    <button type="submit">Update</button>
</form>
<a href="/categories">Back to List</a>