@extends('admin.main')
@section('title','User')
@section('css')
    <link href="{{ URL::asset('assets/plugins/morris/morris.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/rating/rating.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="card-header col-md-12 col-12">
                        <a href="" class="viewall btn btn-info ml-3"><i class="fa fa-user"></i> Add Role</a>
                    </div>
                </div>

{{--                @include('admin.includes.message')--}}

                <div class="card-body">
                    <table id="all-category" class="table table-bordered table-hover ">
                        <thead class="bg-white">
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(function () {
            var baseUrl = $('meta[name=app-url]').attr("content");
            let url = baseUrl + '/all-users';
            // create a datatable
            $('#all-category').DataTable({
                processing: true,
                ajax: url,
                type: "GET",
                "order": [[ 0, "desc" ]],
                columns: [
                    { data: 'name'},
                    { data: 'description'},
                ],

            });
        });

        function reloadTable()
        {
            /*
                reload the data on the datatable
            */
            $('#all-category').DataTable().ajax.reload();
        }


    </script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ URL::asset('assets/js/index3.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/morris/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/rating/jquery.barrating.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/rating/ratings.js') }}"></script>
@endsection

