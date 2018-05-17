<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM product WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['Pname'])  && isset($_POST['Mname'])&& isset($_POST['dim'])&& isset($_POST['price'])) {
$Pname = $_POST['Pname'];
$Mname = $_POST['Mname'];
$dim = $_POST['dim'];
$price = $_POST['price'];
$sql = 'UPDATE product SET Pname=:Pname,Mname=:Mname,dim=:dim,price=:price WHERE id=:id';
$statement = $connection->prepare($sql);
  if ($statement->execute([':Pname' => $Pname,':Mname'=>$Mname,':dim'=>$dim, ':price' => $price, ':id' => $id])) {
    header("Location:index.php");
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="Pname">Pname</label>
          <input value="<?= $person->Pname; ?>" type="text" name="Pname" id="Pname" class="form-control">
        </div>
<div class="form-group">
          <label for="Mname">Mname</label>
          <input value="<?= $person->Mname; ?>" type="text" name="Mname" id="Mname" class="form-control">
        </div>
<div class="form-group">
          <label for="dim">Dim</label>
          <input value="<?= $person->dim; ?>" type="text" name="dim" id="dim" class="form-control">
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" value="<?= $person->price; ?>" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update Product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
