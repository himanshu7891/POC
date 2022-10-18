@extends('admin.v1.common.app')
@section('content')

<div id="ajax-msg"></div>

<div class="card">
    <div class="card-header">
        Application List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Application">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Application Code
                        </th>
                        <th>
                            User Code
                        </th>
                        <th>
                            Source Type
                        </th>
                        <th>
                            Source Name
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
                    @foreach($applications as $key => $application)
                        <tr data-entry-id="{{ $application->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $application->application_code ?? '' }}
                            </td>
                            <td>
                                {{ Admin::getUserCode($application->user_id) ?? '' }}
                            </td>
                            <td>
                                {{ $application->source_type ?? '' }}
                            </td>
                            <td>
                                {{ $application->source_name ?? '' }}
                            </td>
                            <td>
                                {{ $application->created_at ?? '' }}
                            </td>
                            <td>
                                <select name='application_status' id='application_status' data-applicationid="{{ $application->id }}">
                                    <option value='pending' {{ $application->applicationStatus->status == "pending" ? "selected" : "" }}>Pending</option>
                                    <option value='approved' {{ $application->applicationStatus->status == "approved" ? "selected" : "" }}>Approved</option>
                                    <option value='rejected' {{ $application->applicationStatus->status == "rejected" ? "selected" : "" }}>Rejected</option>
                                    <option value='relogin' {{ $application->applicationStatus->status == "relogin" ? "selected" : "" }}>Relogin</option>
                                    <option value='vehicle_charge' {{ $application->applicationStatus->status == "vehicle_charge" ? "selected" : "" }}>Vehicle Charge</option>
                                    <option value='logout' {{ $application->applicationStatus->status == "logout" ? "selected" : "" }}>Logout</option>
                                </select>
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
        let table = $('.datatable-Application:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
        });
    });

    $(document).on("change","#application_status", function(e) {

        var status = $(this).val();
        var id = $(this).data('applicationid');

        $.ajax({
            url: "{{ route('admin.change.application.status',1132443) }}",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            data: {
                status: status,
                applicationId: id,
            },
            success: function(data) {
                if($.isEmptyObject(data.error)) {
                    var html = '';
                    html += '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                    html += '<strong>'+data.success+'</strong>';
                    html += '<button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    html += '</div>';
                    $("#ajax-msg").html(html);
                    $('html, body').animate({
                        scrollTop: "0px"
                    }, 1000);
                    setInterval(function() {
                        location.reload(true);
                    }, 1000);
                } else {
                    var html = '';
                    html += '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    html += '<strong>'+data.error+'</strong>';
                    html += '<button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    html += '</div>';
                    $("#ajax-msg").html(html);
                    $('html, body').animate({
                        scrollTop: "0px"
                    }, 1000);
                }
            }
        });
    });

</script>
@endsection