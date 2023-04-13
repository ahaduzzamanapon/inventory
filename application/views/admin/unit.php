<!doctype html>
<html lang="en">

<head>
    <title>Inventory</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- local css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <!-- <script type = 'text/javascript' src = "<?php #echo base_url(); ?>js/sample.js"></script> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        <li>
                            <a href="<?php echo base_url(); ?>admin/categories">Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/subcategories">Sub-Categories</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>unitController">Unit</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>itemcontroller">Item</a>
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

                    <a href="<?php echo site_url('Logout');?>" class="btn btn-success btn-sm btn-inline" style="color:#fff;">Logout</a>
                </div>
            </nav>

            <!-- main content start  -->
            <h3>Welcome to Unit Page</h3>

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
                Add Unit
            </button>
            <?php ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($units as $unit): ?>
                    <tr>
                        <td>
                            <?php echo $unit->unitName; ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('unitController/update/'.$unit->unitId); ?>"
                                class="btn btn-primary" id="editUserModalLink" data-toggle="modal"
                                data-target="#editUserModal" data-id="<?php echo $unit->unitId; ?>"
                                data-unitName="<?php echo $unit->unitName; ?>">Edit</a>
                            <a href="<?php echo base_url('unitController/delete/'.$unit->unitId); ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this unit?');"> Delete </a>
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
                            <h4 class="modal-title">Add Unit</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(base_url('unitController/update')); ?>                            
                            <div class="form-group">
                                <label for="name">Unit Name</label>
                                <?php if ($this->session->flashdata('unitValidation1')) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('unitValidation1'); ?>
                                </div>
                                <?php } ?>
                                <input type="text" class="form-control" id="unitName" name="unitName" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Unit</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Edit Unit Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open(base_url('unitController/update')); ?>
                        <input type="hidden" id="id" name="id" value="<?php echo $unit->unitId ?>" />
                        <div class="form-group">
                            <label for="name">Unit Name</label>
                            <?php if ($this->session->flashdata('validation2')) {?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('validation2'); ?>
                            </div>
                            <?php }?>
                            <input type="text" class="form-control" id="name" name="unitName"
                                value="<?php echo $unit->unitName ?>" required>
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

        <?php if ($this->session->flashdata('unitValidation1')) {?>
        <?php echo '<script>$("#myModal").modal("show");</script>'; ?>
        <?php }?>
        <!-- code for show modal -->

        <!-- jQuery code for setting the input field values in the modal -->
        <script>
        $(document).on("click", "#editUserModalLink", function() {
            var id = $(this).data("id");
            var name = $(this).data("unitName");

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