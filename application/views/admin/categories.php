<!doctype html>
<html lang="en">

<head>
    <title>Inventory</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Local CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Setup</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/categories">Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/subcategories">Sub-Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>unitController">Unit</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                </div>
            </nav>

            <!-- Main content start -->
            <!-- Code for flash message -->
            <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php }?>
           

          


            <?php if ($this->session->flashdata('error')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php }?>

            <?php if ($this->session->flashdata('data')) {?>
            <div class="alert alert-success">
                <?php $sid=$this->session->flashdata('data'); ?>
                <?php echo form_open(base_url('admin/forcedlt')); ?>
  <input type="hidden" name="sid[]" value="<?php echo implode(",", $sid); ?>">
  <p>Do you want delete these subcategory click force to delete </p>
  <button   onclick="return confirm('Are you sure you want to delete these Subcategory?')" class="btn btn-danger" type="submit">Force to delete</button>
  <?php echo form_close(); ?>

</form>

            </div>
            <?php }?>

            <!-- Button to open the Modal -->
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                Add Categories
            </button>

            <table class="table table-hover">
                <thead>
                    
                        <tr>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php foreach ($categories as $cat): ?>
                    <tr>
                        <td><?php echo $cat->catname; ?></td>
                        <td>
                            <a href="#" class="btn btn-primary" id="editUserModalLink" data-toggle="modal"
                                data-target="#editUserModal" data-id="<?php echo $cat->id; ?>"
                                data-catname="<?php echo $cat->catname; ?>">Edit</a>
                            <a href="<?php echo base_url('admin/delete/' . $cat->id); ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this user?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>

                <!-- Category Store Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Categories</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open(base_url('admin/catstor')); ?>
                                <div class="form-group">
                                    <label for="name">Category Name:</label>
                                    <?php if ($this->session->flashdata('validation1')) {?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('validation1'); ?>
                                    </div>
                                    <?php }?>
                                    <input type="text" class="form-control" id="name" name="catname" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Category Modal -->
                <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog"
                    aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open(base_url('admin/catupdate')); ?>
                                <input type="hidden" id="id" name="id" value="" />
                                <div class="form-group">
                                    <label for="name">Category Name:</label>
                                    <?php if ($this->session->flashdata('validation2')) {?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('validation2'); ?>
                                    </div>
                                    <?php }?>
                                    <input type="text" class="form-control" id="name" name="catname" value="" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- End of Edit cat Form -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- code for show modal -->
                <?php if ($this->session->flashdata('validation2')) {?>
                <?php echo '<script>$("#editUserModal").modal("show");</script>'; ?>
                <?php }?>

                <?php if ($this->session->flashdata('validation1')) {?>
                <?php echo '<script>$("#myModal").modal("show");</script>'; ?>
                <?php }?>
                <!-- code for show modal -->

                <!-- jQuery code for setting the input field values in the modal -->
                <script>
                $(document).on("click", "#editUserModalLink", function() {
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
</body>

</html>