@extends('backend.layouts.main')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('body')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header ">
                <a href="{{route('manage_movie.create')}}" type="button" class=" btn btn-light text-dark "> Add Movie</a>
            </div>
            <div class="card-body">
                 @include('backend.message.success')
                <div class="table-responsive">
                    <table class="table table-striped table-bordered data-table">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th width="20%">Movie Name</th>
                                <th width="20%">Movie Thumbnail</th>
                                <th width="40%">Movie Description</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('manage_movie.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'movie_name',
                        name: 'movie_name'
                    },
                    {
                        data: 'movie_thumbnail',
                        name: 'movie_thumbnail'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
          setTimeout(function() {
            $('#initalHidden').fadeOut('fast');
        }, 3000);
    </script>
@endsection
