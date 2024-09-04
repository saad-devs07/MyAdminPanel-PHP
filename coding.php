<!-- Register - Login Code -->
<!-- Register Code -->
<?php
if (isset($_POST['register'])) {
  include "connection.php";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repeatpassword = $_POST['repeatpassword'];
  $role = 2;

  if ($password == $repeatpassword) {
   
    mysqli_query($connect, "INSERT INTO register(Name,Email,Password,Role) VALUES('$name','$email','$password','$role')"); 
    echo "<script>
            alert('Account Created Successfully');
            location.assign('RegisterLogin/login.php');
          </script>";
  }else{
    echo "<script>
            alert('Password and Repeat Password Must Match');
            location.assign('RegisterLogin/register.php')
          </script>";
 }
}
?>

<!-- Login Code -->
<?php
if (isset($_POST['login'])) {
  include "connection.php";
  $email = $_POST['email'];
  $password = $_POST['password'];
  $fetchdata = mysqli_query($connect, "SELECT * FROM register WHERE Email = '$email' AND Password = '$password' ");

  if ($isdataexist = mysqli_num_rows($fetchdata) > 0) {
    while ($data = mysqli_fetch_Assoc($fetchdata)) {
      if ($data['Role'] == 1) {
          session_start();
          $_SESSION['name'] = $data['Name'];
        header('location:AdminPanel/validatepage.php?index');
      }else{
          session_start();
          $_SESSION['name'] = $data['Name'];
        header('location:index.php');
      }
    }
  }else{
    echo "<script>
            alert('Account Not Exist');
            location.assign('index.php');
          </script>";    
  }
}
?>

<!-- Category Deleting Code -->
<?php 
if(isset($_GET['delete_cat'])){
  include "connection.php";
  $delete = $_GET['delete_cat'];
  mysqli_query($connect, "DELETE FROM category WHERE ID = '$delete'");
  echo "<script>
        alert ('Category Deleted Successfully')
        </script>";
  header('location:AdminPanel/validatePage.php?category');
}
?>

<!-- Product Deleting Code -->
<?php 
if(isset($_GET['delete_pro'])){
  include "connection.php";
  $delete = $_GET['delete_pro'];
  mysqli_query($connect, "DELETE FROM product WHERE P_ID = '$delete'");
  echo "<script>
        alert ('Product Deleted Successfully')
        </script>";
  header('location:AdminPanel/validatePage.php?product');
}
?>

<!-- Category Uploading Code -->
<?php

if (isset($_POST['add_category'])) {
  include "connection.php";
  $c_img = $_FILES['upload']['name'];
  $c_size = $_FILES['upload']['size'];
  $tmp_name = $_FILES['upload']['tmp_name'];

  $extention = pathinfo($c_img,PATHINFO_EXTENSION);
  $destination = "AdminPanel/CategoryImages/".$c_img;

  if ($c_size <= 3000000) {
    if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
      if (move_uploaded_file($tmp_name,$destination)) {
        $c_name = $_POST['category'];
        $insert = mysqli_query($connect, "INSERT INTO category(C_Name,C_Image) VALUES('$c_name','$c_img') ");
        echo "<script>
                alert('Category Uploaded Successfully');
                location.assign('AdminPanel/validatepage.php?category');
        </script>";
      }else{
        echo "<script>
                alert('Category Not Uploaded');
                location.assign('AdminPanel/validatepage.php?category');
        </script>";
      }
    }else{
        echo "<script>
                alert('File Must Be in jpg, jpeg or png');
                location.assign('AdminPanel/validatepage.php?category');
        </script>";
      }
  }else{
        echo "<script>
                alert('File Size Must Be Lass Than 3MB');
                location.assign('AdminPanel/validatepage.php?category');
        </script>";
      }
}
?>

<!-- Product Uploading Code -->
<?php

if (isset($_POST['add_product'])) {
  include "connection.php";
  $p_img = $_FILES['upload']['name'];
  $p_size = $_FILES['upload']['size'];
  $tmp_name = $_FILES['upload']['tmp_name'];

  $extention = pathinfo($p_img,PATHINFO_EXTENSION);
  $destination = "AdminPanel/ProductImages/".$p_img;

  if ($p_size <= 3000000) {
    if ($extention == "jpg" OR $extention == "png" OR $extention == "jpeg") {
      if (move_uploaded_file($tmp_name,$destination)) {
        $p_name = $_POST['p_name'];
        $p_category = $_POST['p_category'];
        $p_qty = $_POST['p_qty'];
        $p_price = $_POST['p_price'];
        $p_desc = $_POST['p_desc'];
        
        $insertproduct = mysqli_query($connect, "INSERT INTO product (P_Name,P_Category,P_Quantity,P_Price,P_Desc,P_Image) 
                  VALUES('$p_name','$p_category','$p_qty','$p_price','$p_desc','$p_img') ");

        echo "<script>
                alert('Product Uploaded Successfully');
                location.assign('AdminPanel/validatepage.php?product');
        </script>";
      }else{
        echo "<script>
                alert('Product Not Uploaded');
                location.assign('AdminPanel/validatepage.php?product');
        </script>";
      }
    }else{
        echo "<script>
                alert('File Must Be in jpg, jpeg or png');
                location.assign('AdminPanel/validatepage.php?product');
        </script>";
      }
  }else{
        echo "<script>
                alert('File Size Must Be Lass Than 3MB');
                location.assign('AdminPanel/validatepage.php?product');
        </script>";
      }
}
?>