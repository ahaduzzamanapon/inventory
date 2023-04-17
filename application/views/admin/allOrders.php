<!doctype html>
<html lang="en">
  <head>
    <title>Inventory</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- local css -->

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">

<!-- <script type = 'text/javascript' src = "<?php #echo base_url(); ?>js/sample.js"></script> -->






    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url();?>item">Create New Order <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link"href="<?php echo base_url();?>allorders">View Orders</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php #dd($subCategoryData); ?>
        
            <label for="inputItem"><b>All Orders</b></label>
            <table class="table table-hover col-md-9">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Status</th>
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
                            <?php  if($order->status == 0) { echo 'Waiting for Approval'; }
                                    else if($order->status == 1) { echo 'Approved'; }
                                    else if($order->status == 2) { echo 'Rejected'; }
                                    else if($order->status == 3) { echo 'Delivered'; }
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

<!-- main content end  -->

        
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

        // setTimeout("location.reload(true);", 2000);



</script>

 
        

</body>
</html>