@extends('admin.v1.common.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="required" for="team">Team</label>
                        <select class="form-control {{ $errors->has('team_id') ? 'is-invalid' : '' }}" name="team_id" id="team_id" required>
                            <option value="" {{ old('team_id') == '' ? 'selected' : '' }}>Select Team</option>
                            @foreach($teams as $key => $row)
                                <option value="{{ $row->id }}" {{ old('team_id') == $row->id ? 'selected' : '' }}>{{ $row->team_code }} ({{ $row->name }})</option>
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
                        <label class="required" for="branch">Branch</label>
                        <select class="form-control {{ $errors->has('branch_id') ? 'is-invalid' : '' }}" name="branch_id" id="branch_id" required>
                            <option value="" {{ old('branch_id') == '' ? 'selected' : '' }}>Select Branch</option>
                            @foreach($branches as $key => $row)
                                <option value="{{ $row->id }}" {{ old('branch_id') == $row->id ? 'selected' : '' }}>{{ $row->branch_code }} ({{ $row->name }})</option>
                            @endforeach
                        </select>
                        @if($errors->has('branch_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('branch_id') }}
                            </div>
                        @endif
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                        <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                        </div>
                        <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                            @foreach($roles as $id => $role)
                                <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('roles'))
                            <div class="invalid-feedback">
                                {{ $errors->first('roles') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
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