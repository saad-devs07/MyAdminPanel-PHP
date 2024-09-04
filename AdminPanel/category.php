
<div class="container-scroller">

<?php include "navbar.php"; ?>

<div class="container-fluid page-body-wrapper">

<?php include "sidenavbar.php"; ?>

<div class="main-panel">
<div class="content-wrapper">
<div class="page-header">
<h3 class="page-title">
  Category table
</h3>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data table</li>
  </ol>
</nav>
</div>
<div class="card">
<div class="card-body">

<button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add_category">Add Category</button>

<div class="row">
<div class="col-12">
<div class="table-responsive">
<table id="order-listing" class="table">
<thead class="text-center">
  <tr>
      <th>Order #</th>
      <th>Category</th>
      <th>Category Image</th>
      <th>Date & Time</th>
      <th>Actions</th>
  </tr>
</thead>

<?php
include "../connection.php";
$fetchcategory = mysqli_query($connect, 'SELECT * FROM category');

while ($data = mysqli_fetch_Assoc($fetchcategory)) {
?>
<tbody class="text-center">
<tr>
  <td><?php echo $data['ID']; ?></td>
  <td><?php echo $data['C_Name']; ?></td>
  <td><?php echo $data['C_Image']; ?></td>
  <td><?php echo $data['Date']; ?></td>
  <td>
    <!-- <a class="btn btn-primary" href="?update_id=<?php echo $data['ID']; ?>">Update</a> -->
    <a class="btn btn-outline-danger" href="../coding.php?delete_cat=<?php echo $data['ID']; ?>">Delete</a>
  </td>
</tr>
</tbody>

<?php } ?>

</table>
</div>
</div>
</div>

<?php
// if (isset($_GET['update_id'])) {
//   include "connect.php";
//   $update = $_GET['update_id'];
//   $fetchallcategory = mysqli_query($connect, "SELECT * FROM category WHERE ID = '$update' ");
//   $data = mysqli_fetch_assoc($fetchallcategory);
?>

<!-- <div class="container" style="width: 35%; ">
<form action="" method="POST">
  <h2 class="text-center mt-3 mb-3">Update Categories</h2>


  <div class="form-outline mb-3">
    <input type="hidden" id="form4Example1" class="form-control" name="id"> value="<?php echo $data['ID']; ?>" />
  </div>

  <div class="form-outline mb-3">
    <input type="text" id="form4Example1" class="form-control" placeholder="Category Name" name="c_name"> value="<?php echo $data['C_Name']; ?>" />
  </div>

  <div>
    <input class="form-control form-control-sm mb-3" id="formFileSm" type="file" name="upload">
  </div>

  <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
</form>
</div> -->
<?php // } 

// if (isset($_POST['update'])) {
//   include "connect.php"; 
//   $id = $_POST['id'];
//   $c_name = $_POST['c_name'];

//   mysqli_query($connect, " UPDATE category SET C_Name='$c_name' WHERE ID='$id' ");

//   header('location:AdminPanel/validatepage.php?category');
// }

?>

</div>
</div>
</div>
<!-- content-wrapper ends -->

<?php include "footer.php"; ?>
      
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- Category Modal -->
<div class="modal fade" id="add_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
<form action="../coding.php" method="POST" enctype="multipart/form-data">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">

<div class="input-group mb-3">
<input type="text" class="form-control" name="category" placeholder="Category Name" required>
</div>

<div class="">
<input class="form-control form-control-sm" id="formFileSm" type="file" name="upload">
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" name="add_category">Save changes</button>
</div>
</div>
</form>
</div>
</div>