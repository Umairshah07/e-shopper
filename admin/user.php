<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User-Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    
      <?php
        include 'mystore.php';
   $con = mysqli_connect('localhost', 'root', '', 'ecommerce');
   $Record = mysqli_query($con, "SELECT * FROM `tbluser`");
   $row_count = mysqli_num_rows($Record);

      ?>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-10">
        
      <table class="table table-danger table-bordered ">
        <thead class="text-center text-white">

          <th>S.N</th>
          <th>Name</th>
          <th>Email</th>
          <th>Number</th>
          <th>Delete</th>
<a href=""></a>
        </thead>
        <tbody class="text-center text-danger">
          <?php

      while( $row = mysqli_fetch_array($Record)){
        echo"
              <tr>
            <td>$row[Id]</td>
            <td>$row[Username]</td>
            <td>$row[Email]</td>
            <td>$row[Number]</td>
            <td><a href='delete.php? ID=$row[Id]' class='btn btn-outline-danger'>Delete</a></td>
             </tr>
              ";
      }

        ?>

        </tbody>
      </table>
       </div>

            <div class="col-md-2 pr-5 text-center">
              <h3 class="text-danger">Total</h3>
              <h1 class="bg-danger text-white"><?php echo $row_count; ?></h1>
            </div>


</div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>