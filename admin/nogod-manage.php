<?php include 'inc/header.php';
include 'lib/db.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    
if(isset($_GET['id'])){
    if(isset($_POST['update_nogod'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        
        $result = mysqli_query($conn, "UPDATE `nogod` SET nogod = '$name', number = '$number', nogod_details = '$details' WHERE id ='".$_GET['id']."'  ");
        if($result == true){
            $succ = '<div class="alert alert-success">Update Success....</div>';
        }
    }
   //-- ============================================================== -->
// show baksh data -->
// ============================================================== -->    
$showNogod = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nogod WHERE id = '".$_GET['id']."' "));
}    
?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php include 'inc/side-bar.php';?>       
       
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

<!-- ============================================================== -->
<!-- Main body contand  -->
<!-- ============================================================== -->
      <a href="set-payment.php" class="btn btn-danger btn-rounded mb-2 fa fa-angle-left"> Back</a>
      
      <?php if(isset($succ))echo $succ;?>
       <div class="card">
           <div class="card-header">
              
                   <strong>Bkash Payment Setup</strong>
              
           </div>
           <div class="card-body">
               <form action="" method="post">
                   <div class="form-group">
                       <label>Payment Name: </label>
                       <input type="text" name="name" class="form-control" value="<?= $showNogod['nogod'];?>">
                   </div>
                   <div class="form-group">
                       <label>Payment Number: </label>
                       <input type="text" name="number" class="form-control"  value="<?= $showNogod['number'];?>">
                   </div>
                    <div class="form-group">
                       <label>Payment Details: </label>
                       <textarea class="form-control" style="height:250px;" name="details"> <?= $showNogod['nogod_details'];?></textarea>
                   </div>
                   
                    <div class="form-group">
                       <button class="btn btn-danger btn-rounded col-md-4 offset-md-4" type="submit" name="update_nogod">Update</button>
                   </div>
               </form>
           </div>
       </div>
       
        </div>
    </div>
</div>
  
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>