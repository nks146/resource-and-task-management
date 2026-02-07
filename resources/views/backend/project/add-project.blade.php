@extends('layouts.backend')
@section('content')

<!-- Page header -->
<div class="page-header border-bottom-0">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span> {{$title}}</h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content pt-0">

	<!-- Form validation -->
	<div class="card">
		<div class="card-header header-elements-inline">
            <h6 class="card-title">Right aligned</h6>
			<div class="header-elements">
				<div class="list-icons">
            		<a class="list-icons-item" data-action="collapse"></a>
            		<a class="list-icons-item" data-action="reload"></a>
            		<a class="list-icons-item" data-action="remove"></a>
            	</div>
        	</div>
		</div>

		<div class="card-body">
        	<form action="{{ route('projects.store') }}" autocomplete="off" method="POST">
        		@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Project name: </label>
							<input type="text" name="project_name" class="form-control" required value="{{ old('project_name') }}" autocomplete="off">
							@error('project_name')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Client: </label>
							<select name="client" class="form-control" id="client" required>
								<option value="">Select Client</option>
								@foreach($client_list as $client)
									<option value="{{ $client->id }}" @if(old('client')==$client->id) selected @endif>{{ $client->name }}</option>
								@endforeach
							</select> 
							@error('client')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Comment: </label>
							<input type="text" name="comment" class="form-control" id="comment" value="{{ old('comment') }}" placeholder="Comment" >
							@error('comment')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Estimated Time: </label>
							<input type="text" name="estimated_time" class="form-control" id="estimated_time" value="{{ old('estimated_time') }}" placeholder="Estimated Time" onkeypress="return onlynumeric(event)">
							@error('estimated_time')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
				</div>
				<div class="row">					
					<div class="col-md-6">
						<div class="form-group">
							<label>Project Start Date: </label>
							<input type="date" name="start_date" class="form-control" id="start_date" value="{{ old('start_date') }}" required>
							@error('start_date')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Status: </label>
							<div class="form-group row">
							  <div class="col-md-3">
								<div class="form-check">  
								  <label class="form-check-label">
									<input type="radio" class="form-check-input" name="status" value="1" checked>
									Active
								  <i class="input-helper"></i></label>
								</div>
							  </div>
							  <div class="col-md-3">
								<div class="form-check">
								  <label class="form-check-label">
									<input type="radio" class="form-check-input" name="status"  value="0">
									Inactive
								  <i class="input-helper"></i></label>
								</div>
							  </div>
							</div>
							@error('status')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>					
				</div>
				<div class="text-right">
					<button type="submit" class="btn bg-teal-400">Submit form <i class="icon-paperplane ml-2"></i></button>
				</div>
			</form>
		</div>
	</div>
	<!-- /form validation -->

</div>
<!-- /content area -->

@endsection

@section('javascript')
<script>
	function onlynumeric(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if((charCode >= 48 && charCode <= 57) || charCode == 8  || charCode == 46){
			return true;
		}else{
			return false;      
		}
	}
  </script>
@endsection