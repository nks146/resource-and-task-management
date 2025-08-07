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
        	<form action="{{ route('users.store') }}" autocomplete="off" method="POST">
        		@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Employee name: </label>
							<input type="text" name="name" class="form-control" required value="{{ old('name') }}" autocomplete="off">
							@error('name')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Gender: </label>
							<select name="gender" class="form-control" id="gender" required>
								<option value="">Select Gender</option>
								<option value="Male" @if(old('gender')=='Male') selected @endif>Male</option>
								<option value="Female"  @if(old('gender')=='Female') selected @endif>Female</option>
							</select> 
							@error('gender')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Email: </label>
							<input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
							@error('email')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Mobile: </label>
							<input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" maxlength="10" required>
							@error('mobile')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
				</div>
				<div class="row">					
					<div class="col-md-6">
						<div class="form-group">
							<label>Designation: </label>
							<input type="text" name="designation" class="form-control" value="{{ old('designation') }}" required>
							@error('designation')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Joining Date: </label>
							<input type="date" name="joining" class="form-control" autocomplete="off" value="{{ old('joining') }}" required>
							@error('joining')
					            <div style="color: red;">{{ $message }}</div>
					        @enderror
						</div>
					</div>
				</div>
				<div class="row">					
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

@endsection