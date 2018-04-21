@extends('layouts.app')

@section('content')
<input type="text" class="form-control" name="start_date" value="21/04/2017">
<input type="text" class="form-control" name="end_date" value="21/04/2019">
<button class="btn btn-primary" id="reloadBtn">Search</button>

<hr>

    <table class="table table-bordered display" id="users-table" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th align="center" style="padding-right: 15px;">Action</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
    <script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! route( 'datatables.data' ) !!}',
                    data: function(d) {
                        d.start_date = $('input[name=start_date]').val();
                        d.end_date = $('input[name=end_date]').val();
                    }
                },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                {
                "className":      'options',
                "data":           null,
                "render": function(data, type, full, meta){
                    return '<a href="/' + data.id + '/show" class="btn btn-sm btn-success">Show</a>';
                }
            }
            ],
            dom: 'Blfrtip',
            // buttons: [
            //     {
            //         extend: 'pdfHtml5',
            //         download: 'open'
            //     }
            // ]
            buttons: [
                'print'
            ]
        });

        $('#reloadBtn').on('click', function() {
            $('#users-table').DataTable().ajax.reload();
        });
    });
    </script>
@endpush