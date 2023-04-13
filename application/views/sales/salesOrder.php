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
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url();?>salesOrder">Create New Order <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">View Orders</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php #dd($subCategoryData); ?>
        <form action="" method="">
            <label for="inputCategory">Select Category</label>
                <select class="form-control" id="SelectCategory" name="SelectCategory">
                    <!-- <option>Select Category</option> -->
                    <?php foreach($categoryData as $item):?>
                        <option name="category" value="<?php echo $item->id; ?>"> <?php echo $item->catname; ?></option>
                    <?php endforeach; ?>
                </select>
            <br>
            <label for="inputSubCategory">Select Sub-Category</label>
            <select class="form-control" id="SelectSubCategory" name="SelectSubCategory">
                <option>Select Sub-Category</option>   
                <!-- <?php foreach($subCategoryData as $item):?>
                    <option name="subCategory" value="<?php echo $item->sid; ?>"> <?php echo $item->subcname; ?></option>
                <?php endforeach; ?> -->
            </select>
            <br>
            <label for="inputItem"><b>Items</b></label>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    
                </tbody>

            </table>


        </form>

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

        document.addEventListener('DOMContentLoaded', function() 
        {
            var categoryDropdown = document.querySelector('select[name="category"]');
            categoryDropdown.addEventListener('change', function() 
            {
                var categoryId = this.value;
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() 
                {
                    if (xhr.readyState === 4 && xhr.status === 200) 
                    {
                        var subcategoryDropdown = document.querySelector('select[name="subCategory"]');
                        subcategoryDropdown.innerHTML = xhr.responseText;
                    }
                };
                xhr.open('POST', '<?php echo base_url("salesOrderController/get_subcategories"); ?>');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('category_id=' + categoryId);
            });
        });

</script>

 
        

</body>
</html>