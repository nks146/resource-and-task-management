@extends('layouts.backend')
@section('content')

<div class="page-header border-bottom-0">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Activity Type Detail</span></h4>
        </div>
    </div>
</div>

<div class="content pt-0">
    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $activity_type->id }}</dd>

                <dt class="col-sm-3">Activity</dt>
                <dd class="col-sm-9">{{ $activity_type->activity }}</dd>

                <dt class="col-sm-3">Description</dt>
                <dd class="col-sm-9">{{ $activity_type->description }}</dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">{{ $activity_type->status ? 'Active' : 'Inactive' }}</dd>

                <dt class="col-sm-3">Created</dt>
                <dd class="col-sm-9">{{ $activity_type->created_at->format('Y-m-d H:i') }}</dd>

                <dt class="col-sm-3">Updated</dt>
                <dd class="col-sm-9">{{ $activity_type->updated_at->format('Y-m-d H:i') }}</dd>
            </dl>

            <a href="{{ route('activity_types.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('activity_types.edit', $activity_type) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>

@endsection
