@extends('admin.v1.common.app')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Branch
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.branch.update", [$branch->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="required" for="team">Team</label>
                        <select class="form-control {{ $errors->has('team_id') ? 'is-invalid' : '' }}" name="team_id" id="team_id" required>
                            <option value="" {{ old('team_id') == '' ? 'selected' : '' }}>Select Team</option>
                            @foreach($teams as $key => $row)
                                <option value="{{ $row->id }}" {{ (old('team_id') == $row->id) || $branch->team_id == $row->id  ? 'selected' : '' }}>{{ $row->team_code }} ({{ $row->name }})</option>
                            @endforeach
                        </select>
                        @if($errors->has('team_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('team_id') }}
                            </div>
                        @endif
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="required" for="name">Name</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $branch->name) }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection