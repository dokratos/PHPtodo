<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Todo</h1>
    </div>
  </div>
  <div class="row">
    <a href="create.php">Create</a>
  </div>
  <div class="row">
    <table class="table table-striped">
      <?php foreach ($model as $item) : ?>
      <tr>
        <td><a href="edit.php?key=<?= $item->id ?>">Edit</a></td>
        <td><?= $item->description ?></td>
        <td><a href="delete.php?key=<?= $item->id ?>">Delete</a></td>
      </tr>
      <?php endforeach; ?>
  </div>
</div>