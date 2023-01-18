
<form  method="post"  enctype="multipart/form-data">

<input type="text" name="prodName" required placeholder="Enter product name">
<input type="text" name="prodDesc" required placeholder="Enter product description">
<input type="text" name="prodbrand" required placeholder="Enter product brand">
<input type="file" name="image" required >

<input type="submit" value="CREATE" name="btn_submit">

</form>
<?php

include "config.php";

if(  isset($_POST['btn_submit'])){


$pname = $_POST['prodName'];
$pdesc = $_POST['prodDesc'];
$pbrand = $_POST['prodbrand'];
$img_name = $_FILES['image']['name'];
$img_tmp_name = $_FILES['image']['tmp_name'];


$accept = ['jpg', 'jpeg','png','gif','webp','jfif'];

$to_lowerCase = strtolower (  pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION ) ); 

if(  in_array($to_lowerCase, $accept) ){


$blobimage = addslashes(  file_get_contents($_FILES['image']['tmp_name'])  );

move_uploaded_file( $img_tmp_name , "images/".$img_name  );

$sql = "INSERT into products (prodName, prod_desc, prod_brand, image_Name, blobimage)
values ('$pname','$pdesc','$pbrand','$img_name','$blobimage')";

$result = mysqli_query($conn, $sql);

if($result){
    echo "Prodcut Added Successfully!";
}


}

else
echo"Somehting went wrong!";





}



?>