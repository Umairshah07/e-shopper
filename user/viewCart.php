<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View-Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php
      include 'header.php';
    ?>
    <div class="container">
      <div class="row"> 
        <div class="col-lg-12 bg-light text-center mb-5 rounded">
          <h1 class="text-danger">My Cart</h1>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row justify-content-around">
        <div class="col-sm-12 col-md-6 col-lg-9">
          <table class="table table-bordered text-center">
            <thead>
              <th class="bg-danger text-white fs-5">Serial No.</th>
              <th class="bg-danger text-white fs-5">Name</th>
              <th class="bg-danger text-white fs-5">Price</th>
              <th class="bg-danger text-white fs-5">Quantity</th>
              <th class="bg-danger text-white fs-5">Total Price</th>
              <th class="bg-danger text-white fs-5">Update</th>
              <th class="bg-danger text-white fs-5">Delete</th>
            </thead>
            <tbody>
           <?php

$ptotal = 0;
$i = 0;
if (isset($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $key => $value) {
    $price = floatval($value['productPrice']);
    $qty = intval($value['productQuantity']);
    $total = $price * $qty;

     $price = floatval($value['productPrice']);
    $qty = intval($value['productQuantity']);
    $ptotal += $total ;
    $i = $key+1;

    echo "
     <form action ='insertcart.php' method = 'POST'>
      <tr>
        <td>$i</td>
<td><input type='hidden' name='PName' value='$value[productName]'>$value[productName]</td>
        <td><input type='hidden' name='PPrice' value='$value[productPrice]'>$value[productPrice]</td>
        <td><input type='' name='PQuantity' value='$value[productQuantity]'></td>
        <td>$total</td>
        <td><button name='update' class=' btn btn-danger'>Update</button></td>
        <td><button name ='remove' class='btn btn-danger'>Delete</button></td>
        <td><input type= 'hidden' name = 'item' value= '$value[productName]'></td>
      </tr>
      </form>
    ";
  }
}
?>

            </tbody>
          </table>
        </div>
        <div class="col-lg-3 text-center">
          <h3 class="text-danger  fw-bold">Total</h3>
          <h1 class="bg-danger text-white"><?php echo  number_format($ptotal,2) ?></h1>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>