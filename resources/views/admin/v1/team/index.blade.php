@extends('admin.v1.common.app')
@section('content')
@can('team_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.team.create') }}">
                Add Team
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Team List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Team">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Team Code
                        </th>
                        <th>
                            Team Name
                        </th>
                        <th>
                            Created At
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $key => $team)
                        <tr data-entry-id="{{ $team->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $team->team_code ?? '' }}
                            </td>
                            <td>
                                {{ $team->name ?? '' }}
                            </td>
                            <td>
                                {{ $team->created_at ?? '' }}
                            </td>
                            <td>
                                @can('team_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.team.show', $team->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('team_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.team.edit', $team->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('team_delete')
                                    <form action="{{ route('admin.team.destroy', $team->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        let table = $('.datatable-Team:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
        });
    });

</script>
@endsection