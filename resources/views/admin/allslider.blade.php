@extends('admin_layout')

@section('admin_content')
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>All Slider</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<p class="alert-success">
			<?php
				$message = Session::get('message');
				if ( $message ) {
					echo $message;
					Session::put('message',null);
				}
			?>
		</p>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>Slider Id</th>
					  <th>Slider Title</th>
					  <th>Slider Image</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead> 

			  
			  <tbody>
			  @foreach($all_slider_info as $v_slider)
				<tr>
					<td class="center">{{ $v_slider->slider_id }}</td>
					<td class="center">{{ $v_slider->slider_title }}</td>
					<td class="center"><img src="{{ $v_slider->slider_image }}" style="height: 80px; width: 80px;"></td>

					<td class="center">
					@if( $v_slider->slider_status == 1)
						<span class="label label-success">Active</span>
					@else
						<span class="label label-danger">Unactive</span>
					@endif
					</td>
					<td class="center">
						@if($v_slider->slider_status == 1)
						<a class="btn btn-danger" href="{{URL::to('/unactive_slider/'.$v_slider->slider_id)}}">
							<i class="halflings-icon white thumbs-down"></i>  
						</a>
						@else
						<a class="btn btn-success" href="{{URL::to('/active_slider/'.$v_slider->slider_id)}}">
							<i class="halflings-icon white thumbs-up"></i>  
						</a>
						@endif
						<a class="btn btn-danger" href="{{URL::to('/deleteslider/'.$v_slider->slider_id)}}" id="delete">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				@endforeach
			  </tbody>
			  

		  </table>            
		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection