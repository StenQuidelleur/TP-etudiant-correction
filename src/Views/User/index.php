<?php START_LAYOUT; ?>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Homepage</a>
        </div>
    </nav>
    <div class="container">
        <div class="row my-5">
            <h1 class="text-center">User List</h1>
        </div>
        <?php if (isset($users) && !empty($users)) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Date de naissance</th>
                        <th scope="col">Numéro d'étudiant</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <th scope="row"><?= $user['id']; ?></th>
                            <td><?= $user['lastname']; ?></td>
                            <td><?= $user['firstname']; ?></td>
                            <td><?= $user['date_of_birth']; ?></td>
                            <td><?= $user['student_number']; ?></td>
                            <td class="d-flex flex-row">
                                <a href="/users/show?id=<?= $user['id']; ?>" class="btn btn-info">Show</a>
                                <a href="/users/edit?id=<?= $user['id']; ?>" class="btn btn-warning mx-2">Edit</a>
                                <form action="/users/delete" method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
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
        <a href="/users/add" class="btn mt-3 btn-primary">Add new User</a>
    </div>
<?php END_LAYOUT; ?>