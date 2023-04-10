<!doctype html>
<html lang="en">
  <head>
    <title>Inventory</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- local css -->

    <link rel = "stylesheet" type = "text/css" 
   href = "<?php echo base_url(); ?>css/style.css">

<!-- <script type = 'text/javascript' src = "<?php echo base_url(); 
   ?>js/sample.js"></script> -->



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     

  <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Inventory</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dashboard</p>
                <li class="active" >
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Setup</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/categories">Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/subcategories">Sub-Categories</a>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
            
            </ul>

           
        </nav>

     
    <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                   

                    
                </div>
            </nav>
                   <!-- main content start  -->



              <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>




  
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                    Add Categories
                    </button>


                    <?php

                    ?>





                    <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $cat): ?>



        <tr>
            <td><?php echo $cat->catname; ?></td>
            
            <td>
            <a href="#" class="btn btn-primary" id="editUserModalLink" data-toggle="modal" data-target="#editUserModal" data-id="<?php echo $cat->id; ?>" data-catname="<?php echo $cat->catname; ?>">Edit</a>
            <a href="<?php echo base_url('admin/delete/'.$cat->id); ?>" 
   class="btn btn-danger btn-sm" 
   onclick="return confirm('Are you sure you want to delete this user?');">
   Delete
</a>
</td>

        </tr>
        <?php endforeach; ?>

   
    </tbody>
  </table>


                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                        <!-- Modal content -->
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add categories</h4>

                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <?php echo form_open(base_url('admin/catstor')); ?>                            
                                <div class="form-group">

                                <label for="name">categories Name:</label>
                                <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>

                                <input type="text" class="form-control" id="name" name="catname">
                                </div>
                            
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <?php echo form_close(); ?>
                            </div>
                            </div>
                        </div>
                        </div>
                        
                        </div>


                        <!-- Edit User Modal -->
                        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Edit User Form -->
                                <?php echo form_open('<?php echo base_url(); ?>/admin/catupdate', 'class="form-horizontal"'); ?>
                                <input type="hidden" id="id" name="id" value="" />
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>

                                    <input type="text" class="form-control" id="name" name="name" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>

                                    <input type="email" class="form-control" id="email" name="email" value="" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- End of Edit User Form -->
                            </div>
                            </div>
                        </div>
                        </div>







                        <?php
                        if(validation_errors()) {

                        
                            echo '<script>$("#myModal").modal("show");</script>';
                        }
                        ?>


                        <?php if ($this->session->flashdata('validation')) { ?>
                            <?php


                        
                            echo '<script>$("#editUserModal").modal("show");</script>';



                        ?>
                        <?php } ?>

                        <!-- jQuery code for setting the input field values in the modal -->
                        <script>
                        $(document).on("click", "#editUserModalLink", function () {
                            var id = $(this).data("id");
                            var name = $(this).data("catname");
                            
                            $("#editUserModal #id").val(id);
                            $("#editUserModal #name").val(name);
                        
                        });
                        </script>

               <!-- main content end  -->



            </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
<script>
$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });



</script>


</body>
</html>