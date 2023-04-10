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
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Setup</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/categories">Categories</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/subcategories">Sub-Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/unit">Unit</a>
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


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Sub Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Sub_Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open(base_url('admin/subCatStor')); ?> 

    <div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" id="sel1" name="catId">
    <option> Select please</option>
    <?php foreach($categories as $categories): ?>
           <option value="<?php echo $categories->id;?>"><?php echo $categories->catname;?></option>
           <?php endforeach; ?>
  </select>
</div>



    
     

      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Sub Category</label>
  <input type="text" name="subCat" class="form-control" id="exampleFormControlInput1" placeholder=" sub categories here..">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
    


<!-- main content end  -->
  
        <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php } ?>
 <!-- ========sub categories show in table===========
 -->    
               
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th> Sub Name</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Subcategories as $sub): ?>



                    <tr>
                        <td><?php echo $sub->catname; ?></td>
                        <td><?php echo $sub->subcname; ?></td>
                       

                        <td>
                            <a href="#" class="btn btn-primary" id="editUserModalLink" data-toggle="modal"
                                data-target="#editUserModal" data-id="<?php echo $sub->sid; ?>"
                                data-catname="<?php echo $sub->catname; ?>">Edit</a>
                            <a href="<?php echo base_url('admin/delete/'.$sub->sid); ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this user?');">
                                Delete
                            </a>
                        </td>

                    </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>

           



       
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