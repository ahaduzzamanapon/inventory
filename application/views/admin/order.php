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
                        <li>
                            <a href="<?php echo base_url(); ?>unitController">Unit</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>itemcontroller">Item</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>">Orders</a>
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
            <h3>Orders Page</h3>

            
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
                    <?php #foreach ($units as $unit): ?>
                    <tr>
                        <td>
                            <?php #echo $unit->unitName; ?>
                        </td>
                        <!-- <td>
                            <a href="<?php #echo base_url('unitController/update/'.$unit->unitId); ?>"
                                class="btn btn-primary" id="editUserModalLink" data-toggle="modal"
                                data-target="#editUserModal" data-id="<?php #echo $unit->unitId; ?>"
                                data-unitName="<?php #echo $unit->unitName; ?>">Edit</a>
                            <a href="<?php #echo base_url('unitController/delete/'.$unit->unitId); ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this unit?');"> Delete </a>
                        </td> -->

                    </tr>
                    <?php #endforeach; ?>
                </tbody>

            </table>
            

        </div>


        






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