<form method="POST" class="col-4">
    <div class="mb-3">
        <label for="lastname" class="form-label">Nom de famille</label>
        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $user['lastname'] ?? ''; ?>">
        <label for="firstname" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $user['firstname'] ?? ''; ?>">
        <label for="date_of_birth" class="form-label">Date de naissance</label>
        <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" value="<?= $user['date_of_birth'] ?? ''; ?>">
        <label for="student_number" class="form-label">Numéro étudiant</label>
        <input type="text" class="form-control" name="student_number" id="student_number" value="<?= $user['student_number'] ?? ''; ?>">
    </div>
    <div class="d-flex flex-row">
        <button type="submit" class="btn btn-success">Valid</button>
        <a class="btn btn-secondary mx-2" href="/users">Back to list</a>
    </div>
</form>