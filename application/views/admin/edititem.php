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
                   

                    
                </div>
            </nav>
<!-- main content start  -->


                                    <?php echo form_open_multipart(base_url('itemcontroller/update_item'), array('id' => 'myForm')); ?>
                                    <input type="hidden" name="itemid"  value="<?php echo $item->id ; ?>">

                                    <div class="form-group">
                                    <label for="name">Item Name:</label>
                                    <input type="text" class="form-control" id="name" name="itemname" value="<?php echo $item->itemname ; ?>" required>
                                    <?php echo form_error('itemname'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Select Category</label>
                                    <select class="form-control" name="category" required >
                                    <option value="<?php echo $catdeteils->id; ?>" style="color: #888; background-color: #eee;"  ><?php echo $catdeteils->catname; ?></option>

                                        <?php foreach($categories as $category) { ?>
                                            <option value="<?php echo $category->id; ?>"><?php echo $category->catname; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('category'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Select Sub-Category</label>
                                    <select class="form-control" name="subcategory" required>
                                    <option value="<?php echo $subcatdeteils->sid;  ?>" style="color: #888; background-color: #eee;"   ><?php echo $subcatdeteils->subcname; ?></option>

                                    </select>     
                                    <?php echo form_error('subcategory'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Select Unit</label>
                                    <select class="form-control" name="unit" required >
                                    <option value="<?php echo $unitdeteils->unitId ; ?>"  style="color: #888; background-color: #eee;"><?php echo $unitdeteils->unitName; ?></option>

                                        <?php foreach($units as $unit) { ?>
                                            <option value="<?php echo $unit->unitId ; ?>"><?php echo $unit->unitName; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('unit'); ?>
                                </div>
                                <div class="form-group">


                                    <label for="image">Item Image:</label><br>
                                    <div style="display:flex!important">
                                    <div style="margin-right: 32px">
                                    <p>Old Image</p>
                                    <img src="<?php echo base_url('upload/' . $item->image); ?>" alt="My Image" height="90px" width="100px">
                                    
                                    </div>
                                  
                                    <div style=" display: inline" id="imagePreview">
                                    </div>

                                
                                </div>

                                  <p class="mt-2"></p>
                                    <input sta id="myFileInput" onchange="uploadImage()"  name="image" type="file" class="form-control-file border">
                                    <?php echo form_error('image'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="price">Item Price:</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $item->price; ?>" required>
                                    <?php echo form_error('price'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Item quantity:</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $item->quantity; ?>" required>
                                    <?php echo form_error('quantity'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Status</label>
                                    <select class="form-control" name="status" required >
                                    <option value="<?php echo $stutusd['value']; ?>"><?php echo $stutusd['name']; ?></option>
                                        <option value="1">Active</option>
                                        <option value="0">In_Active</option>
                                    </select>
                                    <?php echo form_error('status'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                           
  <?php echo form_close(); ?>



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

<script>

function uploadImage() {
  // get the file input element and the image preview element
  const fileInput = document.getElementById('myFileInput');
  const imagePreview = document.getElementById('imagePreview');
  
  
  // create a new hidden input element
  const hiddenInput = document.createElement('input');
  hiddenInput.type = 'hidden';
  hiddenInput.name = 'myImage';

  const p = document.createElement('p');
    p.innerText = 'New Image';
    imagePreview.appendChild(p);
    
  
  // read the uploaded file and set its data as the value of the hidden input
  const reader = new FileReader();
  reader.onload = function(event) {
    hiddenInput.value = "hi";
  };
  reader.readAsDataURL(fileInput.files[0]);
  
  // append the hidden input to the form
  const myForm = document.getElementById('myForm');
  myForm.appendChild(hiddenInput);
  
  // display the uploaded image in the preview element
  const image = document.createElement('img');
image.src = URL.createObjectURL(fileInput.files[0]);
image.width = 100; // set a fixed width of 200 pixels
image.height = 90; // set a fixed height of 200 pixels
imagePreview.appendChild(image);
}


</script>




</body>
</html>