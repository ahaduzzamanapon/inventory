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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

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
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Setup</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/categories">Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/subcategories">Sub-Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>unitController">Unit</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>itemcontroller">Item</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>requisition">Requisition</a>
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
            <!-- Code for flash message end -->




            <!-- Button to open the Modal -->
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                Add Item
            </button>

            <table class="table table-hover">
                <thead>

                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $key => $item): ?>
                    <tr>
                        <td><?php echo $key ?></td>
                        <td>

                            <img src="<?php echo base_url('upload/' . $item->image); ?>" alt="My Image" height="40px" width="50px">



                        </td>
                        <td><?php echo $item->itemname ?></td>
                        <td><?php echo $item->catname ?></td>
                        <td><?php echo $item->subcname ?></td>
                        <td>
                            <?php 
                                if ($item->status == 1) {
                                    echo 'active';
                                } else if ($item->status == 0) {
                                    echo 'inactive';
                                }
                            ?>
                        </td>


                        <td>
                            <a class="btn btn-sm btn-success" href="<?php echo base_url('itemcontroller/edit/'. $item->id);?>">
                                edit
                            </a>

                        </td>


                    </tr>
                    <?php endforeach;?>
                </tbody>


                <!-- start modal to stor item  -->



                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Add Item</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">


                                <?php echo form_open_multipart(base_url('itemcontroller/store_item')); ?>
                                <div class="form-group">
                                    <label for="name">Item Name:</label>
                                    <input type="text" class="form-control" id="name" name="itemname" value="<?php echo set_value('itemname'); ?>" required>
                                    <?php echo form_error('itemname'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Select Category</label>
                                    <select class="form-control" name="category" required>
                                        <?php foreach($categories as $category) { ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo $category->catname; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('category'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Select Sub-Category</label>
                                    <select class="form-control" name="subcategory" required>
                                    </select>
                                    <?php echo form_error('subcategory'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Select Unit</label>
                                    <select class="form-control" name="unit" required>
                                        <?php foreach($units as $unit) { ?>
                                        <option value="<?php echo $unit->unitId ; ?>"><?php echo $unit->unitName; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('unit'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="image">Item Image:</label>
                                    <input name="image" type="file" class="form-control-file border">
                                    <?php echo form_error('image'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="price">Item Price:</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?php echo set_value('price'); ?>" required>
                                    <?php echo form_error('price'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Item quantity:</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo set_value('quantity'); ?>" required>
                                    <?php echo form_error('quantity'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">In_Active</option>
                                    </select>
                                    <?php echo form_error('status'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <?php echo form_close(); ?>




                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- end stor -->


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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>


    <!-- get categories and subcategories -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var categoryDropdown = document.querySelector('select[name="category"]');
            categoryDropdown.addEventListener('change', function() {
                var categoryId = this.value;
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var subcategoryDropdown = document.querySelector('select[name="subcategory"]');
                        subcategoryDropdown.innerHTML = xhr.responseText;
                    }
                };
                xhr.open('POST', '<?php echo base_url("itemcontroller/get_subcategories"); ?>');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('category_id=' + categoryId);
            });
        });
    </script>

</body>

</html>