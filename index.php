<?php
require('config/config.php');
require('config/db.php');
$query = "SELECT* FROM posts";
$result = mysqli_query($conn, $query);
if($result){
  $alert= '<div class="dot-green"></div>connected';
  $width = 'w-25';
}else{
  $alert= '<div class="dot-red"></div>something went wrong';
  $width = 'w-50';
}
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);


?>

<?php include('include/header.php') ?>
<?php include('include/navbar.php') ?>
    <div
      class="container-sm form-control mt-3 bg-primary bg-gradient position-relative"
      style="--bs-bg-opacity: 0.5; width: 800px"
    ><h6 class="bg-body-tertiary text-success rounded-pill text-center <?php echo $width; ?> "><?php echo $alert;  ?></h6>
      <h1 class="text-center text-uppercase">posts</h1>
      <?php foreach($posts as $post):  ?>
      <div class="container form-control p-4">
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
          <small class="ms-1"><?php echo $post['created_at'];  ?></small>
        </div>
        <div class="form-control">
          <h3 class="text-capitalize bg-primary-subtle p-1 ps-4"><?php echo $post['title'];  ?></h3>
          <p class="form-control p-2"><?php echo $post['body']; ?></p>
          <a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary mb-1">view</a>
        </div>
        <hr />
      </div>
      <?php endforeach; ?>
    </div>

<?php include('include/footer.php')  ?>
