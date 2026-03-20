@extends('layouts.backend')
@section('content')

<!-- Page header -->
<div class="page-header border-bottom-0">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Activity Types</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none d-md-flex">
            <a href="{{ route('activity_types.create') }}" class="btn btn-primary">Add Activity Type</a>
        </div>
    </div>
</div>

<div class="content pt-0">
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table datatable-save-state">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Activity</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activityTypes as $activityType)
                            <tr>
                                <td>{{ $activityType->id }}</td>
                                <td>{{ $activityType->activity }}</td>
                                <td>{{ $activityType->description }}</td>
                                <td><span class="badge badge-{{ $activityType->status ? 'success' : 'danger' }}">{{ $activityType->status ? 'Active' : 'Inactive' }}</span></td>
                                <td>{{ $activityType->created_at->format('Y-m-d') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('activity_types.show', $activityType) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('activity_types.edit', $activityType) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('activity_types.destroy', $activityType) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this activity type?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $activityTypes->links() }}
        </div>
    </div>
</div>

<script src="{{ URL::asset('public/backend_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('public/backend_assets/js/demo_pages/datatables_basic.js') }}"></script>
@endsection
