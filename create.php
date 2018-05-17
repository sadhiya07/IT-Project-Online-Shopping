<?php
require 'db.php';
$message = '';
if (isset ($_POST['Pname'])  && isset($_POST['Mname'])&& isset($_POST['dim'])&& isset($_POST['price'])) {
$Pname = $_POST['Pname'];
$Mname = $_POST['Mname'];
$dim = $_POST['dim'];
$price = $_POST['price'];
  $sql = 'INSERT INTO product(Pname,Mname,dim,price) VALUES(:Pname,:Mname,:dim, :price)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':Pname' => $Pname,':Mname' => $Mname,':dim' => $dim, ':price' => $price])) {
    $message = 'data inserted successfully';
  }
}

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add Product</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="Pname">Product name</label>
          <input type="text" name="Pname" id="Pname" class="form-control">
        </div>
<div class="form-group">
          <label for="Mname">Manufacturer name</label>
          <input type="text" name="Mname" id="Mname" class="form-control">
        </div>
<div class="form-group">
          <label for="Dim">Dimesion</label>
          <input type="text" name="dim" id="dim" class="form-control">
        </div>
        <div class="form-group">
          <label for="Price">Price</label>
          <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Submit entry</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
