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
                <li>
                    <a href="dashboard">Dashboard</a>
                </li>
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
                        <li>
                            <a href="<?php echo base_url(); ?>itemcontroller">Item</a>
                        </li>
                        <li class="active">
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


   
<label for="inputItem"><b>All Orders</b></label>
                <table class="table table-hover col-md-12">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Item</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>
                                <?php echo $order->orderId; ?>
                            </td>
                            <td>
                                <?php echo $order->itemname; ?>
                            </td>
                            <td>
                                <?php echo $order->catname; ?>
                            </td>
                            <td>
                                <?php echo $order->subcname; ?>
                            </td>
                            <td>
                                <?php echo $order->quantity; ?>
                            </td>
                            <td>
                                <?php echo $order->price; ?>
                            </td>
                            <td>
                                <?php echo $order->total; ?>
                            </td>
                            <td>
                                <?php  if($order->status == 0) {?>
                                    <a href="<?php echo base_url(); ?>requisitionController/approve/<?php echo $order->orderId; ?>" class="btn btn-success btn-sm btn-inline" style="color:#fff;">Accept</a>
                                    <a href="<?php echo base_url(); ?>requisitionController/reject/<?php echo $order->orderId; ?>" class="btn btn-danger btn-sm btn-inline" style="color:#fff;">Reject</a>
                                    
                                    <?php }
                                    else if ($order->status == 1) {?>
                                        <p class="center text-success">Approved</p>
                                        <?php }
                                     else if ($order->status == 2) {?>
                                        <p class="center text-danger">Rejected</p>
                                        <?php }    
                                    else if ($order->status == 3) {?>
                                        <p class="center text-success">Delivered</p>
                                    <?php }?>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>







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
        setTimeout("location.reload(true);", 5000);

</script>


</body>
</html>