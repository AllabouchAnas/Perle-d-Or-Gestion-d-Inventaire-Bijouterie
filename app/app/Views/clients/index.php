<h1>All Clients</h1>
<a href="/clients/create">Add New Client</a>
<ul>
    <?php foreach ($clients as $client): ?>
        <li>
            <?= $client['nom'] ?> (<?= $client['email'] ?>)
            <a href="/clients/edit/<?= $client['id'] ?>">Edit</a>
            <a href="/clients/delete/<?= $client['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>