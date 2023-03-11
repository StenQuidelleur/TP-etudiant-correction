<?php START_LAYOUT; ?>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Homepage</a>
        </div>
    </nav>
    <div class="container">
        <div class="row my-5">
            <h1 class="text-center">Item List</h1>
        </div>
        <?php if (isset($items) && !empty($items)) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) { ?>
                        <tr>
                            <th scope="row"><?= $item['id']; ?></th>
                            <td><?= $item['title']; ?></td>
                            <td class="d-flex flex-row">
                                <a href="/items/show?id=<?= $item['id']; ?>" class="btn btn-info">Show</a>
                                <a href="/items/edit?id=<?= $item['id']; ?>" class="btn btn-warning mx-2">Edit</a>
                                <form action="/items/delete" method="POST">
                                    <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>Nothing to display</p>
        <?php } ?>
        <a href="/items/add" class="btn mt-3 btn-primary">Add new Item</a>
    </div>
<?php END_LAYOUT; ?>