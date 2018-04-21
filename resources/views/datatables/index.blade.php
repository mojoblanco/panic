@extends('layouts.app')

@section('content')
<input type="text" class="form-control" name="start_date" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}">
<input type="text" class="form-control" name="end_date" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}">

<hr>

    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
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
                { data: 'updated_at', name: 'updated_at' }
            ]
        });
    });
    </script>
@endpush