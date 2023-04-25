<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Delete a todo</h1>
    </div>
  </div>
  <div class="row">
    <h1> Are you sure you want to delete <?= $model->todo ?>?</h1>
  </div>
</div>
<div class="row">
  <form action="" method="POST">
    <input type="hidden" name="todo" value="<?= $model->todo ?>" />
    <input type="submit" value="delete ToDo" />
  </form>
</div>
</div>