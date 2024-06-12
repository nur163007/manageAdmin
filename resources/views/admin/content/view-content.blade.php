@extends('admin.main')
@section('title','Content')
@section('css')
    {{--    <link href="{{ URL::asset('assets/plugins/morris/morris.css')}}" rel="stylesheet">--}}
    {{--    <link href="{{ URL::asset('assets/plugins/rating/rating.css')}}" rel="stylesheet">--}}
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Content</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-6">
                        <h3 class="card-title">All Content</h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a class="btn btn-info" href="{{url('create-content')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="hidden-xs">Add New Content</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{--                    Search: <input type="text" id="myInput" onkeyup="searchData();" placeholder="Search for names.." title="Type in a name">--}}
                    <table id="content-table" class="table table-hover dataTable table-striped width-full">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Content Type</th>
                            <th>Creator</th>
                            <th>Created at</th>
                            <th>Active status</th>
                            <th>Publish status</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody id="all-content">

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- COL END -->

        <!-- Modal -->
        <div class="modal fade" id="viewContentPage" aria-hidden="true" aria-labelledby="myLargeModalLabel"
             role="dialog">
            <div class="modal-dialog" role="document" style="max-width: 1140px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Individual content</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                onclick="ResetForm();">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row row-lg">
                            <div class="col-xlg-6 col-md-6">
                                <h5> <span class="h4 font-weight-bold mt-2">Content type : </span><span class="getContentType"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Keywords : </span><span class="getKeyword"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Meta tag : </span><span class="getMetaTag"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Meta description : </span><span class="getMetaDesc"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Content Creator : </span><span class="getContentCreator"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Created at : </span><span class="getCreatedDate"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Active : </span><span class="getActive"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Publish : </span><span class="getPublish"></span></h5>
                            </div>
                            <div class="col-xlg-6 col-md-6">
                                <h5> <span class="h4 font-weight-bold mt-2">Content : </span><span class="getContent"></span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    </div>

@endsection
@section('js')

    <script type="text/javascript">

        $(document).ready(function () {

            $('#content-table').DataTable({
                ajax: "{{ route('show.all.content') }}",
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            return '<p>' + full['first_name'] + ' ' + full['last_name'] + '</p>';
                        }
                    },
                    {data: 'created_at'},
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            if (full['is_active'] == '1') {
                                return '<p> Active </p>';
                            } else {
                                return '<p> Inactive </p>';
                            }
                        }
                    },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            if (full['is_published'] == '1') {
                                return '<p> Published </p>';
                            } else {
                                return '<p> Unpublished </p>';
                            }
                        }
                    },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            return "<button class='btn btn-success btn-sm btn-del' data-target='#viewContentPage' data-toggle='modal' data-toggle='view content' data-original-title='view content' onclick='getViewData(" + full['id'] + ")'>View</button>" +
                                "";
                        }
                    },
                ],
            });

        });

        // view individual data function
        function getViewData(id) {
            $.ajax({
                url: "{{ url('api/view/individual/content') }}/" + id,
                type: "GET",
                success: function (response) {
                    var res = response.data;

                    $(".getContentType").html(res.name);
                    $(".getKeyword").html(res.keywords);
                    $(".getMetaTag").html(res.meta_tag);
                    $(".getMetaDesc").html(res.meta_description);
                    $(".getContentCreator").html(res.first_name+' '+res.last_name);
                    $(".getCreatedDate").html(new Date(res.created_at).toLocaleDateString('en-us', {
                        year: "numeric",
                        month: "long",
                        day: "numeric"
                    }));
                    if (res.is_active ==1){
                        $(".getActive").html('Active');
                    }else{
                        $(".getActive").html('Inactive');
                    }
                    if (res.is_published ==1){
                        $(".getPublish").html('Published');
                    }else{
                        $(".getPublish").html('Unpublished');
                    }
                    $(".getContent").html(res.content);
                }

            });
        }
        
    </script>
@endsection
