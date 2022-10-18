@extends('admin.v1.common.app')
@section('content')
@can('branch_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.branch.create') }}">
                Add Branch
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Branch List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Branch">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Branch Code
                        </th>
                        <th>
                            Branch Name
                        </th>
                        <th>
                            Team Code
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
                    @foreach($branches as $key => $branch)
                        <tr data-entry-id="{{ $branch->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $branch->branch_code ?? '' }}
                            </td>
                            <td>
                                {{ $branch->name ?? '' }}
                            </td>
                            <td>
                                {{ $branch->team->team_code ?? '' }}
                            </td>
                            <td>
                                {{ $branch->created_at ?? '' }}
                            </td>
                            <td>
                                @can('branch_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.branch.show', $branch->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('branch_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.branch.edit', $branch->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('branch_delete')
                                    <form action="{{ route('admin.branch.destroy', $branch->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        let table = $('.datatable-Branch:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
        });
    });

</script>
@endsection