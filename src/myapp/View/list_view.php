<h2>Products list</h2>

<A href="/products/add">Add new product</a>
<table class="table table-hover table-sm">
    <thead class="thead-default">
    <th scope="row">ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Description</th>
    <th>Actions</th>
    </thead>

    <?php foreach($data['products'] as $product) { ?>
    <tr>
        <td><?=$product->getId() ?></td>
        <td><?=$product->getName() ?></td>
        <td><?=$product->getPrice() ?></td>
        <td><?=$product->getDescription() ?></td>
        <td><a href="/products/edit/<?=$product->getId() ?>">Edit</a> | <a href="/products/delete/<?=$product->getId() ?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>