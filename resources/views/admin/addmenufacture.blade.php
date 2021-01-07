@extends('admin_layout')

@section('admin_content')

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>
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
			<form class="form-horizontal" action="{{ url('/save-menufacture')}}" method="post">
			{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Brand Name:  </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="menufacture_name" id="typeahead" required="">
				  </div>
				</div>          
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Brand Description: </label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" name="menufacture_description" rows="3"></textarea>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Publication Status:  </label>
				  <div class="controls">
					<input type="checkbox" class="span6 typeahead" value="1" name="menufacture_status" id="typeahead">
				  </div>
				</div> 
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Brand</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection