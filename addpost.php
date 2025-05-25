<?php
require('config/config.php');
require('config/db.php');
if($conn){
 $alert= '<div class="dot-green"></div>connected';
  $width = 'w-25';
}else{
  $alert= '<div class="dot-red"></div>something went wrong';
  $width = 'w-50';
}

if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($conn, $_POST['author']);
  $title =mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $query = "insert into posts(author, title, body) values('$name','$title','$body')";
  if(mysqli_query($conn, $query)){
    header('Location: '.ROOT_URL.'');
    echo "<script>alert('post added successfully')</script>";
  }else{
    echo "<script>alert('error'.mysqli_error($conn)'</script>";
    $alert= '<div class="dot-red"></div>something went wrong';
    $width = 'w-50';
  }
}
  



?>

<?php include('include/header.php') ?>
<?php include('include/navbar.php')?>
    <div
      class="container-sm form-control mt-3 bg-primary bg-gradient position-relative"
      style="--bs-bg-opacity: 0.5; width: 800px"
    ><h6 class="bg-body-tertiary text-success rounded-pill text-center <?php echo $width; ?>"><?php echo $alert; ?></h6>
      <h1 class="text-center text-uppercase">add new post</h1>
      <div class="container form-control p-4">
      <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label >Name :</label>
            <input type="text" class="form-control" name="author">
        </div>
        <div class="form-group">
            <label >Title :</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label >Body :</label>
            <textarea type="text" class="form-control" name="body"></textarea>
        </div>
        <a href="index.php" class="btn btn-primary mt-4">Back</a>
        <input type="submit" name="submit" value="Add" class="btn btn-primary ms-3 mt-4">
      </form>
      
        <hr />
        <div>
       
       
        </div>
        
      </div>
      
    </div>

<?php include('include/footer.php')  ?>
