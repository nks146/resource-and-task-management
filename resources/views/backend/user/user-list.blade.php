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
<!-- State saving -->
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title"></h5>
		<div class="header-elements">
			<div class="list-icons">
        		<a class="list-icons-item" data-action="collapse"></a>
        		<a class="list-icons-item" data-action="reload"></a>
        		<a class="list-icons-item" data-action="remove"></a>
        	</div>
    	</div>
	</div>

	<div class="card-body">
		
	</div>

	<table class="table datatable-save-state">
		<thead>
			<tr>
				<th>Name</th>
				<th>Role</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Gender</th>
				<th>Designation</th>
				<th>Joining date</th>				
				<th>Status</th>	
				<th>Created On</th>			
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($resultRows as $rows)
			<tr>
				<td>{{$rows->name}}</td>
				<td>{{$rows->role}}</a></td>
				<td>{{$rows->email}}</td>
				<td>{{$rows->mobile}}</td>
				<td>{{$rows->gender}}</td>
				<td>{{$rows->designation}}</td>
				<td>{{ $rows->joining_date != null ? date('Y-m-d', strtotime($rows->joining_date)) : ''}}</td>			
				<td>@if($rows->status == 1) <label class="badge badge-success">Active </label> @else <label class="badge badge-danger">Inactive</label> @endif </td>
					<td>{{date('Y-m-d', strtotime($rows->created_at))}}</td>
				<td class="text-center">
					<div class="list-icons">
						<div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a href="{{ route('users.edit',$rows->id) }}" class="dropdown-item"><i class="icon-file-pdf"></i> Edit</a>
								<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
								<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
							</div>
						</div>
					</div>
				</td>
			</tr>
			@endforeach			
		</tbody>
	</table>
</div>
<!-- /state saving -->
</div>
<!-- /content area -->
<script src="{{ URL::asset('public/backend_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>	
<script src="{{ URL::asset('public/backend_assets/js/demo_pages/datatables_basic.js')}}"></script>	
@endsection

@section('javascript')

@endsection