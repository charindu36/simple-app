<?php 
require('config/config.php');
require('config/db.php');

if(isset($_POST['delete'])){
  $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
  $query = "DELETE FROM posts WHERE id = {$delete_id}";
  if(mysqli_query($conn, $query)){
    header('Location:'.ROOT_URL);
  }else{
    echo '<script>alert("error deleting post");</script>';
  }
}

$id=mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT* FROM posts where id=".$id;
$result = mysqli_query($conn, $query);
if($result){
  $alert= '<div class="dot-green"></div>connected';
}else{
  $alert= '<div class="dot-red"></div>connected';
}
$post = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);

?>

<?php include('include/header.php') ;?>
<?php include('include/navbar.php')  ?>
    <div
      class="container-sm form-control mt-3 bg-primary bg-gradient position-relative "
      style="--bs-bg-opacity: 0.5; width: 800px"
    >
      <h6 class="bg-body-tertiary text-success rounded-pill text-center  w-25"><?php echo $alert;  ?></h6>
      <div class="container form-control p-4 mt-5 mb-2">
        <div class="p-2">
          <img
            src="img.png"
            alt="img"
            class="rounded-circle"
            style="width: 25px; height: 25px"
          />
          <small
            class="text-capitalize text-dark bg-body-secondary rounded-pill ms-2"
            >CREATER : <?php echo $post['author'];  ?></small
          >
          <small class="ms-1"><?php echo $post['created_at']; ?></small>
        </div>
        <div class="form-control">
          <h3 class="text-capitalize bg-primary-subtle p-1 ps-4"><?php echo $post['title'];  ?></h3>
          <p class="form-control p-2"><?php echo $post['body'];  ?></p>
          
          
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ;?>">
            <a href="<?php echo ROOT_URL; ?>" class="btn btn-primary mb-1">BACK</a>
          <a href="<?php echo ROOT_URL; ?>edit.php?id=<?php echo $post['id']; ?>" class="btn btn-primary mb-1">EDIT</a>
          <input type="hidden" name="delete_id" value="<?php echo $post['id'] ?>">
          <input type="submit" name="delete" class="btn btn-danger ms-3" value="DELETE">
          </form>
        </div>
        <hr />
      </div>
    </div>

 <?php include('include/footer.php');?>
