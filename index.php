<?php
require 'db.php';
$sql = 'SELECT * FROM product';
$statement = $connection->prepare($sql);
$statement->execute();
$product = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All Products</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
	  <th>ID</th>
          <th>Pname</th>
          <th>Mname</th>
          <th>Dim</th>
	  <th>Price</th>
          <th>Action</th>
        </tr>
        <?php foreach($product as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->Pname; ?></td>
            <td><?= $person->Mname; ?></td>
	    <td><?= $person->dim; ?></td>
	    <td><?= $person->price; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
