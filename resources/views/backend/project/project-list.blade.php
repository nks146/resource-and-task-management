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
			@if(Session::has('success'))
			<span style="color:green">{{ Session::get('success') }}</span>
			@endif
			@if(Session::has('error'))
			<span style="color:red">{{ Session::get('error') }}</span>
			@endif
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
						<th>S.No.</th>
						<th>Project</th>
						@if(Auth::user()->role == 'admin')
						<th>Client</th>
						@endif
						<th>Start Date</th>
						<th>Estimated Time</th>
						<th>Time spent</th>
						<th>Comment</th>
						<th>Status</th>
						<th>Created At</th>
						<th>Updated At</th>
						@if(Auth::user()->role == 'admin')
						<th>Action</th>
						@endif
					</tr>
		</thead>
		<tbody>
			@foreach($resultRows as $index => $rows)
			<tr>
				<td>{{ $index + 1 }}</td>
				<td>{{ $rows->project_name }}</td>
				@if(Auth::user()->role == 'admin')
				<td>{{ $rows->client ? $rows->client->name : '-' }}</td>
				@endif
				<td>{{ $rows->start_date ? $rows->start_date->format('Y-m-d') : '' }}</td>
				<td>{{ $rows->estimated_time ?? '' }}</td>
				<td>{{ $rows->time_spent ?? '' }}</td>
				<td>{{ \Illuminate\Support\Str::limit($rows->comment, 50) }}</td>
				<td>@if($rows->status == '1') <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">Inactive</label> @endif</td>
				<td>{{ $rows->created_at ? $rows->created_at->format('Y-m-d') : '' }}</td>
				<td>{{ $rows->updated_at ? $rows->updated_at->format('Y-m-d') : '' }}</td>
				@if(Auth::user()->role == 'admin')
				<td class="text-center">
					<div class="list-icons">
						<div class="dropdown">
							<a href="#" class="list-icons-item" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a href="{{ route('projects.edit', $rows->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
								<form action="{{ route('projects.destroy', $rows->id) }}" method="POST" style="display:inline;">
									@csrf
									@method('DELETE')
									<button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this project?')"><i class="icon-trash"></i> Delete</button>
								</form>
							</div>
						</div>
					</div>
				</td>
				@endif
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