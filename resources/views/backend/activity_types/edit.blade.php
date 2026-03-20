@extends('layouts.backend')
@section('content')

<div class="page-header border-bottom-0">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit Activity Type</span></h4>
        </div>
    </div>
</div>

<div class="content pt-0">
    <div class="card">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('activity_types.update', $activity_type) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="activity">Activity</label>
                    <input type="text" id="activity" name="activity" value="{{ old('activity', $activity_type->activity) }}" class="form-control" required maxlength="255">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" required maxlength="255">{{ old('description', $activity_type->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1" {{ old('status', $activity_type->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $activity_type->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('activity_types.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection
