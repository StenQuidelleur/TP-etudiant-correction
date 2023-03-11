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
        <table class="table col-6">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><?= $item['id']; ?></th>
                <td><?= $item['title']; ?></td>
            </tr>
        </tbody>
        </table>
        <a href="/items" class="btn mt-3 btn-primary">Back to list</a>
    </div>
<?php END_LAYOUT; ?>