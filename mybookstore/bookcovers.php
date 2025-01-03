<?php
try {
  require_once "connection/connection.php";
  require_once "myFunc.php";
  if (isset($_GET['types'])) {
    $tid=$_GET['types'];
    //print_r($tid);
    $books = filterBooksByTypes($connection,$tid[0]);
  } else {
    $books = getBookCoverPrice($connection);
  }
  
  
  foreach ( $books as $key => $value) {
    $cover = $value['image_name'];
    $price = $value['price'];
    $name = $value['Book_name'];
?>

<div class="card float-start" style="width: 12rem; margin: 5px;">
  <img class="card-img-top img-thumbnail" src="img/coverimage/<?php echo $cover; ?>" class="card-img-top" alt="<?php echo $name; ?>">
  <div class="card-body">
    <p class="card-text">Price:<?php echo $price; ?></p>
    <a href="#" class="btn btn-primary">Buy </a>
  </div>
</div>

<?php
  } //loop close
}//try close
  catch (e) {
    echo "<h1>500 Internal error</h1>";
  }
?>