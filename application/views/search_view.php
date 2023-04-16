<!DOCTYPE html>
<html>
<head>
	<title>3 Dependency Search Example</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<h1>3 Dependency Search Example</h1>
	<div>
		<label>Category:</label>
		<select id="category">
			<option value="">Select Category</option>
			<?php foreach($categories as $category): ?>
				<option value="<?php echo $category->id; ?>"><?php echo $category->catname; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div>
		<label>Subcategory:</label>
		<select id="subcategory" disabled>
			<option value="">Select Subcategory</option>
		</select>
	</div>
	<div>
		<label>Search:</label>
		<input type="text" id="search" placeholder="Search Items" >
	</div>
	<br>
	<table id="item_table" border="1">
		<thead>
			<tr>
				<th>Item Name</th>
				<th>Category</th>
				<th>Subcategory</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	<script>
		$(document).ready(function(){
			$('#category').change(function(){
				var cat_id = $(this).val();
				if(cat_id != ''){
					$.ajax({
						url:"<?php echo base_url('item/get_subcategories'); ?>",
						method:"POST",
						data:{catname:cat_id},
						dataType:"json",
						success:function(data){
							var html = '<option value="">Select Subcategory</option>';
							if(data.length > 0){
								for(var i=0; i<data.length; i++){
									html += '<option value="'+data[i].sid+'">'+data[i].subcname+'</option>';
								}
								$('#subcategory').removeAttr('disabled');
							}
							else{
								html += '<option value="">No Subcategories found</option>';
								$('#subcategory').attr('disabled', 'disabled');
							}
							$('#subcategory').html(html);
							$('#item_table tbody').html('');
						}
					});
				}
				else{
					$('#subcategory').html('<option value="">Select Subcategory</option>');
					$('#subcategory').attr('disabled', 'disabled');
					$('#search').attr('disabled', 'disabled');
					$('#item_table tbody').html('');
				}
			});

			$('#subcategory').change(function(){
				var sub_id = $(this).val();
				if(sub_id != ''){
					$.ajax({
						url:"<?php echo base_url('item/get_items'); ?>",
						method:"POST",
						data:{subid:sub_id},
						dataType:"json",
						success:function(data){
							var html = '';
							if(data.length > 0){
								for(var i=0; i<data.length; i++){
									html += '<tr>'+
												'<td>'+data[i].itemname+'</td>'+
												'<td>'+data[i].catname+'</td>'+
												'<td>'+data[i].subcname+'</td>'+
												'<td>'+data[i].price+'</td>'+
                                                '<td>'+data[i].quantity+'</td>'+
                                                '</tr>';
                                                }
                                                }
                                                else{
                                                html += '<tr><td colspan="5">No Items found</td></tr>';
                                                }
                                                $('#item_table tbody').html(html);
                                                }
                                                });
                                                }
                                                else{
                                                $('#item_table tbody').html('');
                                                }
                                                });
                                                $('#search').on('input', function(){
			var search_text = $(this).val();
			if(search_text != ''){
				$.ajax({
					url:"<?php echo base_url('item/search_items'); ?>",
					method:"POST",
					data:{search_text:search_text},
					dataType:"json",
					success:function(data){
						var html = '';
						if(data.length > 0){
							for(var i=0; i<data.length; i++){
								html += '<tr>'+
											'<td>'+data[i].itemname+'</td>'+
											'<td>'+data[i].catname+'</td>'+
											'<td>'+data[i].subcname+'</td>'+
											'<td>'+data[i].price+'</td>'+
											'<td>'+data[i].quantity+'</td>'+
										'</tr>';
							}
						}
						else{
							html += '<tr><td colspan="5">No Items found</td></tr>';
						}
						$('#item_table tbody').html(html);
					}
				});
			}
			else{
				$('#item_table tbody').html('');
			}
		});
	});
</script>
</body>
</html>