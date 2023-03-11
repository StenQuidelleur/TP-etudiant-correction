<form method="POST" class="col-4">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $item['title'] ?? ''; ?>">
    </div>
    <div class="d-flex flex-row">
        <button type="submit" class="btn btn-success">Valid</button>
        <a class="btn btn-secondary mx-2" href="/items">Back to list</a>
    </div>
</form>