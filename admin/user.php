<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User-Panel</title>
   <link rel="icon" type="image/png" href="../user/fav2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    
      <?php
        include 'mystore.php';
           $a = 0;
   $con = mysqli_connect('localhost', 'root', '', 'ecommerce');
   $Record = mysqli_query($con, "SELECT * FROM `tbluser`");
   $row_count = mysqli_num_rows($Record);
   

      ?>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-10">
        
      <table class="table  table-bordered " >
        <thead class="text-center text-white" >

          <th class="text-white" style="background-color: #c17a74;">#</th>
          <th class="text-white" style="background-color: #c17a74;">Name</th>
          <th class="text-white" style="background-color: #c17a74;">Email</th>
          <th class="text-white" style="background-color: #c17a74;">Number</th>
          <th class="text-white" style="background-color: #c17a74;">Action</th>
<a href=""></a>
        </thead>
        <tbody class="text-center "  >
          <?php
    
      while( $row = mysqli_fetch_array($Record)){
        $a++;
        echo"
              <tr>
            <td>$a</td>
            <td>$row[Username]</td>
            <td>$row[Email]</td>
            <td>$row[Number]</td>
            <td><a href='delete.php? ID=$row[Id]' class='btn text-white'style='background-color: #c17a74;' >Delete</a></td>
             </tr>

              ";
              
      }

        ?>

        </tbody>
      </table>
       </div>

            <div class="col-md-2 pr-5 text-center">
              <h3 class=" font-monospace" style="color: #c17a74;">Total</h3>
              <h1 class=" text-white" style="background-color: #c17a74;"><?php echo $row_count; ?></h1>
            </div>


</div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>