<?php
include "config.php";

$id = $_GET['prod_id'];

$sql = "SELECT * from products where prod_id='$id' ";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

?>

<form  method="post"  enctype="multipart/form-data">

<input type="text" name="prodName" value="<?php echo $row['prodName'] ?>">
<input type="text" name="prodDesc" value="<?php echo $row['prod_desc'] ?>">
<input type="text" name="prodBrand" value="<?php echo $row['prod_brand'] ?>">
<input type="file" name="image"  >

<input type="submit" value="SAVE CHANGES" name="btn_submit">

</form>

<?php
if(isset($_POST['btn_submit'])){

    $pname = $_POST['prodName'];
    $pdesc = $_POST['prodDesc'];
    $pbrand = $_POST['prodBrand'];
    $img_name = $_FILES['image']['name'];
    $img_tmp_name = $_FILES['image']['tmp_name'];

    $accept = ['jpg', 'jpeg','png','gif','webp','jfif'];

$to_lowerCase = strtolower (  pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION ) ); 

if(isset($_FILES['image'])){
if( in_array($to_lowerCase, $accept)){
    $blobimage = addslashes(  file_get_contents($_FILES['image']['tmp_name'])  );

    move_uploaded_file( $img_tmp_name , "images/".$img_name  );
    
    $sql = "UPDATE products SET prodName='$pname',   prod_desc=' $pdesc', prod_brand='$pbrand', 
    image_Name='$img_name' , blobimage='$blobimage' where prod_id ='$id'  ";
    
    $result = mysqli_query($conn, $sql);
    
echo"Product Edited Successfully!!";
}
$sql = "UPDATE products SET prodName='$pname',   prod_desc=' $pdesc', prod_brand='$pbrand' 
where prod_id ='$id'  ";

$result = mysqli_query($conn, $sql);

echo"Product Edited Successfully!!";


}
else{
    $blobimage = addslashes(  file_get_contents($_FILES['image']['tmp_name'])  );

    move_uploaded_file( $img_tmp_name , "images/".$img_name  );

    $sql = "UPDATE products SET prodName='$pname',   prod_desc=' $pdesc', prod_brand='$pbrand' 
    where prod_id ='$id'  ";
    
    $result = mysqli_query($conn, $sql);
    
echo"Product Edited Successfully!!";

}



}

?>