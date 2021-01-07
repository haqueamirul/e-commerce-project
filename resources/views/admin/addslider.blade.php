@extends('admin_layout')

@section('admin_content') 

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
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
			<form class="form-horizontal" action="{{ url('/save-slider')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			  <fieldset>
			  	<div class="control-group">
				  <label class="control-label" for="fileInput">Slider Image:</label>
				  <div class="controls">
					<input class="input-file uniform_on" id="fileInput" type="file" name="slider_image">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Slider Title:  </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="slider_title" id="typeahead" required="">
				  </div>
				</div>   
				     
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Slider Description: </label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" name="slider_content" rows="3"></textarea>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Publication Status:  </label>
				  <div class="controls">
					<input type="checkbox" class="span6 typeahead" value="1" name="slider_status" id="typeahead">
				  </div>
				</div> 
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Slider</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection