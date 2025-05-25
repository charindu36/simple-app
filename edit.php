<?php 
require('config/config.php');
require('config/db.php');

if (isset($_POST['submit'])) {
  $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
  $author = mysqli_real_escape_string($conn, $_POST['author']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);

  $query = "UPDATE posts SET author='$author', title='$title', body='$body' WHERE id = {$update_id}";

  if (mysqli_query($conn, $query)) {
    header('Location: ' . ROOT_URL);
    exit();
  } else {
    echo '<script>alert("Error updating post: ' . mysqli_error($conn) . '");</script>';
  }
}


$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
  $alert = '<div class="dot-green"></div>connected';
  $post = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
} else {
  $alert = '<div class="dot-red"></div>connection failed';
  $post = ['author' => '', 'title' => '', 'body' => '', 'created_at' => '', 'id' => 0];
}

mysqli_close($conn);
?>

<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>

<div class="container-sm form-control mt-3 bg-primary bg-gradient position-relative" style="--bs-bg-opacity: 0.5; width: 800px">
  <h6 class="bg-body-tertiary text-success rounded-pill text-center w-25"><?php echo $alert; ?></h6>
  <div class="container form-control p-4 mt-5 mb-2">
    
    <div class="p-2">
      <img src="img.png" alt="img" class="rounded-circle" style="width: 25px; height: 25px" />
      <small class="text-capitalize text-dark bg-body-secondary rounded-pill ms-2">CREATER : <?php echo $post['author']; ?></small>
      <small class="ms-1"><?php echo $post['created_at']; ?></small>
    </div>

 
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-control">
        <div class="form-group">
          <label>Name :</label>
          <input type="text" class="form-control" name="author" value="<?php echo $post['author']; ?>" required>
        </div>
        <div class="form-group">
          <label>Title :</label>
          <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>" required>
        </div>
        <div class="form-group">
          <label>Body :</label>
          <textarea class="form-control" name="body" required><?php echo $post['body']; ?></textarea>
        </div>

        <a href="<?php echo ROOT_URL; ?>" class="btn btn-primary mb-1">BACK</a>
        <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
        <input type="submit" name="submit" value="Submit" class="btn btn-success mb-1">
      </div>
    </form>
    <hr />
  </div>
</div>

<?php include('include/footer.php'); ?>
