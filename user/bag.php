<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Shopper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <?php
    include 'header.php';
    ?>
  </head>
  <body>

    <div class="container-fluid">
      <div class="col-md-12">
        <div class="row">
          
        
    <h1 class="text-danger font-monospace my-3 text-center">BAGS</h1>
    <?php
    include ('../product/config.php');
    $Record = mysqli_query($con, "SELECT * FROM `tblproduct`");
    while( $row = mysqli_fetch_array($Record)){
      $check_page = $row['PCategory'];
      if( $check_page === 'Bag'){

   echo "
<div class='col-md-6 col-lg-4 mb-3'>
  <div class='card mx-auto' style='width: 18rem;'>
    <img src='../product/$row[PImage]' class='card-img-top' alt='...'>
    <div class='card-body text-center'>
      <h5 class='card-title text-danger fs-4 fw-bold'>$row[PName]</h5>
      <p class='card-text text-danger fs-4 fw-bold'>"; ?> RS: <?php echo number_format($row['PPrice'],2) ?> <?php echo "</p>

      <form method='post' action='insertcart.php'>
        <input type='hidden' name='PName' value='$row[PName]'>
        <input type='hidden' name='PPrice' value='$row[PPrice]'>
          <input type='number' name='PQuantity' value = ' min = '1' max = '20'' placeholder='Quantity'><br><br>
    <input type='submit' name='addCart' class='btn btn-danger w-100 text-white' value='Add To Cart'>
      </form>

    </div>
  </div>
</div>
";

 }
 }
    ?>
    </div>
      </div>
    </div>
     <?php 
  include 'footer.php';
     ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>