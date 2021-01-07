@extends('admin_layout')

@section('admin_content')

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="{{ url('/updateCategory',$edit_category_info->cat_id)}}" method="post">
			{{ csrf_field() }}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Category Name:  </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="cat_name" id="typeahead" value="{{$edit_category_info->cat_name}}" required="">
				  </div>
				</div>          
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Category Description: </label>
				  <div class="controls">
					<textarea class="cleditor" id="textarea2" name="cat_description" rows="3">{{$edit_category_info->cat_description}}</textarea>
				  </div>
				</div> 
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->

@endsection