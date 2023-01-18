<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
include "config.php";

$sql = "select * from products";


$result = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_array($result)){

?>


<div class="card" style="width: 18rem;">
  <img src="images/<?php echo  $row['image_Name'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo  $row['prodName'] ?></h5>
    <h5 class="card-title"><?php echo  $row['prod_desc'] ?></h5>
    <h5 class="card-title"><?php echo  $row['prod_brand'] ?></h5>
    <a href="edit.php?prod_id=<?php echo $row['prod_id'] ?>" class="btn btn-primary">Edit</a>
    <a href="delete.php?prod_id=<?php echo $row['prod_id'] ?>" class="btn btn-primary">Delete</a>
  </div>
</div>





<?php  }  ?>