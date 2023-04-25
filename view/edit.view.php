<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Edit a todo</h1>
    </div>
  </div>
  <div class="row">
    <form action="" method="POST">
      <input type="hidden" name="original-todo" value="<?= $model->todo ?>" />
      <div class="form-group">
        <label for="todo">Todo:</label>
        <textarea name="todo" id="todo"><?= $model->todo ?></textarea>
        <input type="submit" value="Edit ToDo" />
      </div>
    </form>
  </div>
</div>