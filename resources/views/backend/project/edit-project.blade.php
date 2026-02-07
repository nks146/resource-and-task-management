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

	<!-- Project edit form -->
	<div class="card">
		<div class="card-header header-elements-inline">
			<h6 class="card-title">Edit Project</h6>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
					<a class="list-icons-item" data-action="reload"></a>
					<a class="list-icons-item" data-action="remove"></a>
				</div>
			</div>
		</div>

		<div class="card-body">
			<form action="{{ route('projects.update', $project->id) }}" autocomplete="off" method="POST">
				@csrf
				@method('PUT')

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Project Name</label>
							<input type="text" name="project_name" class="form-control" required value="{{ old('project_name', $project->project_name) }}">
							@error('project_name')<div style="color: red;">{{ $message }}</div>@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Client</label>
							<select name="client" class="form-control" required>
								<option value="">Select client</option>
								@foreach($client_list as $client)
									<option value="{{ $client->id }}" @if(old('client', $project->client_id) == $client->id) selected @endif>{{ $client->name }}</option>
								@endforeach
							</select>
							@error('client')<div style="color: red;">{{ $message }}</div>@enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Estimated Time (hours)</label>
							<input type="number" step="0.01" name="estimated_time" class="form-control" value="{{ old('estimated_time', $project->estimated_time) }}">
							@error('estimated_time')<div style="color: red;">{{ $message }}</div>@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Time Spent (hours)</label>
							<input type="number" step="0.01" name="time_spent" class="form-control" value="{{ old('time_spent', $project->time_spent) }}">
							@error('time_spent')<div style="color: red;">{{ $message }}</div>@enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Comment</label>
							<textarea name="comment" class="form-control" rows="3">{{ old('comment', $project->comment) }}</textarea>
							@error('comment')<div style="color: red;">{{ $message }}</div>@enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Start Date</label>
							<input type="date" name="start_date" class="form-control" value="{{ old('start_date', $project->start_date ? $project->start_date->format('Y-m-d') : '') }}">
							@error('start_date')<div style="color: red;">{{ $message }}</div>@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Status</label>
							<div class="form-group row">
								<div class="col-md-3">
									<div class="form-check">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="status" value="1" @if(old('status', $project->status) == '1') checked @endif> Active
										<i class="input-helper"></i></label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-check">
										<label class="form-check-label">
											<input type="radio" class="form-check-input" name="status" value="0" @if(old('status', $project->status) == '0') checked @endif> Inactive
										<i class="input-helper"></i></label>
									</div>
								</div>
							</div>
							@error('status')<div style="color: red;">{{ $message }}</div>@enderror
						</div>
					</div>
				</div>

				<div class="text-right">
					<a href="{{ url('project') }}" class="btn btn-light">Cancel</a>
					<button type="submit" class="btn bg-teal-400">Update Project <i class="icon-paperplane ml-2"></i></button>
				</div>
			</form>
		</div>
	</div>
	<!-- /project edit form -->

</div>
<!-- /content area -->

@endsection

@section('javascript')

@endsection