<?php START_LAYOUT; ?>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Homepage</a>
        </div>
    </nav>
    <div class="container">
        <div class="row my-5">
            <h1 class="text-center">User : <?= $user['lastname']. ' ' . $user['firstname']; ?></h1>
        </div>
        <table class="table col-6">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Numéro d'étudiant</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><?= $user['id']; ?></th>
                <td><?= $user['lastname']; ?></td>
                <td><?= $user['firstname']; ?></td>
                <td><?= $user['date_of_birth']; ?></td>
                <td><?= $user['student_number']; ?></td>
            </tr>
        </tbody>
        </table>
        <div class="d-flex flex-row">
            <a href="/users" class="btn mt-3 btn-primary">Back to list</a>
            <?php if ($user['identification'] !== '' && $user['password']) { ?>
                <a href="/users/connection?id=<?= $user['id']; ?>" class="btn mx-3 mt-3 btn-info">Connection</a> 
            <?php } ?>    
        </div>
    </div>
<?php END_LAYOUT; ?>