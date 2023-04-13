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
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Setup</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li >
                            <a href="<?php echo base_url(); ?>admin/categories">Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/subcategories">Sub-Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>unitController">Unit</a>
                        </li>
                        <li >
                            <a href="<?php echo base_url(); ?>itemcontroller">Item</a>
                        </li>

                        <li class="active">
                            <a href="<?php echo base_url(); ?>OrderController">Order</a>
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
                    <a href="<?php echo site_url('Logout');?>" class="btn btn-success btn-sm btn-inline" style="color:#fff;">Logout</a>

                </div>
            </nav>

           
                        <!-- Code for flash message end -->


          

            <!-- Button to open the Modal -->
        

            <table class="table table-hover">
                <thead>
                    
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Sellar </th>
                            <th> Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Benaroshi</td>
                        <td> <img src="<?php echo base_url('upload/pic' ); ?>" alt="My Image" height="40px" width="50px"></td>
                        <td>Kudus</td>
                        <td>1500 tk</td>
                        <td> 2</td>
                        
                        <td>3000tk</td>
                        <td>Requested</td>
                    
                    <td><a class="btn btn-sm btn-danger" href="<?php echo base_url('itemcontroller/edit/');?>" onclick="return confirm('Are')" >
                                Cancel
                            </a>

                        <a class="btn btn-sm btn-success" href="<?php echo base_url('itemcontroller/detail/');?>" >
                                Aprove
                        </a>
                        </td>
                       
                    </tr>
                   
                 
               

                </tbody>


<!-- start modal to stor item  -->

        
<!-- end stor -->


 
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