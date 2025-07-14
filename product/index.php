<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <!-- SweetAlert2 CDN -->

    <!-- Bootstrap 5 CDN (latest) -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto border border-danger mt-3"> 

    <form action="insert.php" method="POST" enctype="multipart/form-data">  
      <div class="mb-3">
  <p class="text-center fw-bold fs-3 text-danger">Product Detail !</p>
</div>
<div class="mb-3">
  <label  class="form-label">Product Name </label>
  <input type="text" name="Pname" class="form-control"  placeholder="Product Name *">
</div>
<div class="mb-3">
  <label  class="form-label">Product Price </label>
  <input type="text" name="Pprice" class="form-control"  placeholder="Product Price *">
</div>
<div class="mb-3">
  <label  class="form-label"> Add Product Image </label>
  <input type="file" name="Pimage" class="form-control" >
</div>
<div class="mb-3">
  <label  class="form-label"> Select Category </label>
 <select class="form-select" name="pages">
  <option value="Home">Home</option>
  <option value="Laptop">Laptop</option>
  <option value="Bag">Bag</option>
  <option value="Mobile">Mobile</option>
</select>
</div>
     <button name="submit" class="form-control bg-danger fs-4 fw-bold my-3 text-white">Upload</button>
    </form>
 </div>
      </div>
    </div>
      <div class="container ">
        <div class="row">
          <div class="col-md-8 m-auto">
            
        
       <table class="table table-hover  my-5 border border-danger">
 
                 <thead class="bg-danger  text-white fs-5 font-monospace text-center">
                    <th class="bg-danger  text-white ">Id </th> 
                    <th class="bg-danger  text-white ">Name</th>
                    <th class="bg-danger  text-white ">Price</th>
                    <th class="bg-danger  text-white ">Image</th>
                    <th class="bg-danger  text-white ">Category</th>
                    <th class="bg-danger  text-white ">Delete</th>
                    <th class="bg-danger  text-white ">Update</th>
                  </thead>

                  <tbody class="text-center">
                    <?php
               include 'config.php';
               $Record = mysqli_query($con, "SELECT * FROM `tblproduct`");
              while ($row = mysqli_fetch_array($Record))

              echo"
            
                    <tr>
                    
                    <td>$row[id]</td>
                    <td>$row[PName]</td>
                    <td>$row[PPrice]</td>
                    <td><img src='$row[PImage]'></td>
                    <td>$row[PCategory]</td>
<td><a href='delete.php? ID= $row[id]' class = 'btn btn-danger'>Delete</a></td>
<td><a href='update.php? ID= $row[id]' class = 'btn btn-danger'>Update</a></td>
                    

                  </tr>

              ";


                    ?>
                  </tbody>
                 </table>
                  
          </div>
        </div>
      </div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>