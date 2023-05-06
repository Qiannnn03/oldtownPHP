
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS -->
    <link href="style.css" rel="stylesheet"  type="text/css" /> 

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <title>Manage Product</title>
</head>

    <header>
    <div>
            <img src="logo1.png" alt="logo">
        
        </div>
        
        <div id="Menu" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">

            </div>
        </div>
    </header>
<body>



  
  <!--ADD EVENT Modal -->
  <div class="modal fade" id="addevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="add.php">
                
                <div class="form-floating mb-3">
                    <input type="text" name="name"  class="form-control" placeholder="Name" required>
                    <label for="name">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="price"  class="form-control" placeholder="Description" required>
                    <label for="price" >Product Price</label>
                </div>
                <div class="form-group">
                    <label>Product Created Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_event" class="btn btn-primary">Save Product</button>
        </div>
        </form>
      </div>
    </div>
  </div>


<!--EDIT EVENT Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="editproduct.php">
             
            <input type="hidden" name="update_id" id="update_id">

            <div class="form-floating mb-3">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                    <label for="name">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="price" id="price" class="form-control" placeholder="Description" required>
                    <label for="price" >Product Price</label>
                </div>
                <div class="form-group">
                    <label>Product Created Date</label>
                    <input type="text" name="date" id="date" class="form-control" required>
                </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="editevent" class="btn btn-primary">Edit Product</button>
        </div>
        </form>
      </div>
    </div>
  </div>



<!--DELETE EVENT Modal -->
<div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="delete-product.php">
             
            <input type="hidden" name="delete-id" id="delete-id">

            <h4> Do you want to Delete this Data?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" name="delete" class="btn btn-primary">Yes</button>
        </div>
        </form>
      </div>
    </div>
  </div>








  
    <div class="container mt-2">

       <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Details
                            <button class="btn btn-primary float-end" data-toggle="modal" data-target="#addevent">Add Product</button>
         
                        </h4>
                    </div>
                    <div class="card-body">



                 <?php
                $connection = new mysqli("php-database.cdnok204jmx0.us-east-1.rds.amazonaws.com","admin","admin123");
                $db = mysqli_select_db($connection, 'oldtown');

                $query = "SELECT * FROM product";
                $query_run = mysqli_query($connection, $query);
                 ?>

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr class="table-primary">
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                        <?php
                            if($query_run)
                            {
                                foreach($query_run as $row)
                                {
                         ?>
                        <tbody>
                            <tr>
                                

                                <td> <?php echo $row['id']?></td>
                                <td> <?php echo $row['name']?></td>
                                <td> <?php echo $row['price']?></td>
                                <td> <?php echo $row['date']?></td>
 
                     
                                <td>
             
                                    
                                    <button class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#edit">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm delbtn">Delete</a>
                                </td>






                            </tr>
            
                        </tbody>

                        <?php      
                                    }  //end foreach
                        
                        
                                }else{
                                    echo "No Record Found";
                                }

                        ?>

                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>






    <script>
        function openNav() {
            document.getElementById("Menu").style.height = "100%";
        }

        function closeNav() {
            document.getElementById("Menu").style.height = "0%";
        }
    </script>

        
        
<script> //delete
        $(document).ready(function()  {
                $('.delbtn').on('click',function(){
                    
                    $('#delmodal').modal('show');


                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#delete-id').val(data[0]);

                });
        });
        </script>
        
        
        

        
        
        
        <script>
        $(document).ready(function()  {
                $('.editbtn').on('click',function(){
                    
                    $('#editmodal').modal('show');


                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#update_id').val(data[0]);
                    $('#name').val(data[1]);
                    $('#price').val(data[2]);
                    $('#date').val(data[3]);
                });
        });
        </script>



</body>

<footer>
        &copy; OldTown White Coffee by 2023
    </footer>

</html>