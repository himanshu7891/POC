@extends('admin.v1.common.app')
@section('content')

<div class="card">
    <div class="card-header">
        Show Branch
    </div>
    
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.branch.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Branch Code
                        </th>
                        <td>
                            {{ $branch->branch_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $branch->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Team Code
                        </th>
                        <td>
                            {{ $branch->team->team_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Created At
                        </th>
                        <td>
                            {{ $branch->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.branch.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection