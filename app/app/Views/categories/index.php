<h1>All Categories</h1>
<a href="/categories/create">Add New Category</a>
<ul>
    <?php foreach ($categories as $category): ?>
        <li>
            <?= $category['nom'] ?>
            <a href="/categories/edit/<?= $category['id'] ?>">Edit</a>
            <a href="/categories/delete/<?= $category['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>