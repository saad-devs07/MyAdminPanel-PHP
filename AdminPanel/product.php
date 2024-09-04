
<div class="container-scroller">

<?php include "navbar.php"; ?>

<div class="container-fluid page-body-wrapper">

<?php include "sidenavbar.php"; ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Products table
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
            <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add_product">Add Product</button>


              <div class="row mt-3">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead class="text-center">
                        <tr>
                            <th>Order #</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Product Image</th>
                            <th>Date & Time</th>
                            <th>Actions</th>
                        </tr>
                      </thead>

<?php
include "../connection.php";
$fetchproduct = mysqli_query($connect, 'SELECT * FROM product');

while ($data = mysqli_fetch_Assoc($fetchproduct)) {
?>

<tbody class="text-center">
<tr>
<td><?php echo $data['P_ID']; ?></td>
<td><?php echo $data['P_Name']; ?></td>
<td><?php echo $data['P_Category']; ?></td>
<td><?php echo $data['P_Quantity']; ?></td>
<td><?php echo $data['P_Price']; ?></td>
<td><?php echo $data['P_Desc']; ?></td>
<td><?php echo $data['P_Image']; ?></td>
<td><?php echo $data['Date']; ?></td>
<td>
<!-- <a class="btn btn-primary" href="?update_id=<?php echo $data['P_ID']; ?>">Update</a> -->
<a class="btn btn-outline-danger" href="../coding.php?delete_pro=<?php echo $data['P_ID']; ?>">Delete</a>
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
//   echo "Working";
  // include "connect.php";
  // $update = $_GET['update_id'];
  // $fetchallproduct = mysqli_query($connect, "SELECT * FROM product WHERE P_ID = '$update' ");
  // $data = mysqli_fetch_assoc($fetchallproduct);
?>

<!-- <div class="container" style="width: 35%; ">
<form action="" method="POST">
<h2 class="text-center mt-3 mb-3">Update Product</h2>

<div class="form-outline mb-3">
  <input type="number" id="form4Example1" class="form-control" name="p_id"> value="<?php echo $data['P_ID']; ?>" />
</div>

<div class="form-outline mb-3">
  <input type="text" id="form4Example1" class="form-control" placeholder="Product Name" name="p_name"> value="<?php echo $data['P_Name']; ?>" />
</div>

<div class="form-outline mb-3">
  <input type="text" id="form4Example1" class="form-control" placeholder="Product Name" name="p_name"> value="<?php echo $data['P_Category']; ?>" />
</div>

<div class="form-outline mb-3">
  <input type="text" id="form4Example1" class="form-control" placeholder="Product Name" name="p_name"> value="<?php echo $data['P_Quantity']; ?>" />
</div>

<div class="form-outline mb-3">
  <input type="text" id="form4Example1" class="form-control" placeholder="Product Name" name="p_name"> value="<?php echo $data['P_Price']; ?>" />
</div>

<div class="form-outline mb-3">
  <input type="text" id="form4Example1" class="form-control" placeholder="Product Name" name="p_name"> value="<?php echo $data['P_Desc']; ?>" />
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

//   header('location:AdminPanel/validatepage.php?product');
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

<!-- Button trigger modal -->


<!-- Product Modal -->
<div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
<form action="../coding.php" method="POST" enctype="multipart/form-data">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">

<div class="input-group mb-3">
<input type="text" class="form-control" name="p_name" placeholder="Product Name" required>
</div>

<div class="input-group mb-3" required>
<!-- <input type="text" class="form-control" name="p_category" placeholder="Product Category" required> -->
<select class="form-control" name="p_category">
<option value="">Select Category</option>

<?php 
include "../connection.php";
$fetchcategory = mysqli_query($connect,"SELECT DISTINCT C_Name FROM category");
while($data = mysqli_fetch_assoc($fetchcategory)){
?>
<option value="<?php echo $data['C_Name']; ?>"> <?php echo $data['C_Name']; ?> </option>
<?php } ?>

</select>
</div>

<div class="input-group mb-3">
<input type="text" class="form-control" name="p_qty" placeholder="Enter Quantity" required>
</div>

<div class="input-group mb-3">
<input type="text" class="form-control" name="p_price" placeholder="Enter Price" required>
</div>

<div class="input-group mb-3">
<input type="textarea" class="form-control" name="p_desc" placeholder="Enter Description" required>
</div>


<div class="">
<input class="form-control form-control-sm" id="formFileSm" type="file" name="upload">
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" name="add_product">Save changes</button>
</div>
</div>
</form>
</div>
</div>