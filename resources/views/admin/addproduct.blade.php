@extends('admin_layout')

@section('admin_content') 

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
		<p class="alert-success">
			<?php
				$message = Session::get('message');
				if ( $message ) {
					echo $message;
					Session::put('message',null);
				}
			?>
		</p>
			<form class="form-horizontal" action="{{ url('/save-product')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Product Name:  </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="product_name" id="typeahead" required="">
				  </div>
				</div>   
				<div class="control-group">
					<label class="control-label" for="selectError3">Category Name:</label>
					<div class="controls">
					  <select id="selectError3" name="cat_id">
						<option>Select Category</option>
						 <?php
                            $all_published_cat = DB::table('tbl_category')
                                                ->where('cat_status',1)
                                                ->get();

                                foreach ( $all_published_cat as $single_cat ) :
                          ?>
                      	<option value="{{ $single_cat->cat_id }}">{{ $single_cat->cat_name }}</option>
                      <?php endforeach; ?>
					  </select>
					</div>
				  </div> 
				  <div class="control-group">
					<label class="control-label" for="selectError2">Menufacture Name:</label>
					<div class="controls">
					  <select id="selectError2" name="menufacture_id">
						<option>Select Menufacture</option>
						 <?php
                            $all_published_brand = DB::table('tbl_menufacture')
                                                ->where('menufacture_status',1)
                                                ->get();

                                foreach ( $all_published_brand as $single_brand ) :
                          ?>
                      	<option value="{{ $single_brand->menufacture_id }}">{{ $single_brand->menufacture_name }}</option>
                      <?php endforeach; ?>
					  </select>
					</div>
				  </div>      
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product Short Description: </label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" name="product_short_description" rows="3"></textarea>
				  </div>
				</div>
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea1">Product Long Description: </label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea1" name="product_long_description" rows="3"></textarea>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Product Price:  </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="product_price" id="typeahead" required="">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="fileInput">Product Image:</label>
				  <div class="controls">
					<input class="input-file uniform_on" id="fileInput" type="file" name="product_image">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Product Size:  </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="product_size" id="typeahead" required="">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Product Color:  </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="product_color" id="typeahead" required="">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Publication Status:  </label>
				  <div class="controls">
					<input type="checkbox" class="span6 typeahead" value="1" name="product_status" id="typeahead">
				  </div>
				</div> 
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Product</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection