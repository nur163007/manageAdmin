@extends('admin.main')
@section('title','navigation')
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
            <li class="breadcrumb-item active" aria-current="page">Navigation</li>
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
                            <h3 class="card-title">All Navigation</h3>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn btn-info"  data-target="#navigationForm" data-toggle="modal" data-original-title="Add New navigation" onclick="ResetForm();">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <span class="hidden-xs">Add New Navigation</span>
                            </button>
                        </div>
                </div>
                <div class="card-body">
                    <table id="navigation-table" class="table table-hover dataTable table-striped width-full small">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>NAME</th>
                            <th>URL</th>
                            <th>PARENT</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody id="all-nav">

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- COL END -->

        <!-- Modal -->
        <div class="modal fade" id="navigationForm" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Navigation Form</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ResetForm();">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form  class="" id="form-navigation" name="form-navigation" autocomplete="off" >
                            <div class="container-fluid">
                                <div class="row mt-3">
                                    <label class="col-md-3 control-label">Name :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" placeholder="give module name">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-3 control-label">Url :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="url" name="url" placeholder="give url"/>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-3 control-label">Icon:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="icon" name="icon" placeholder="give icon name" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-3 control-label">Parent:</label>
                                    <div class="col-md-9">
                                        <select class="form-control" data-plugin="select2" name="parent" id="parent" >
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-3 control-label">Display: </label>
                                    <div class="col-md-9">
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="display" name="display" checked />
                                            <label for="display"></label>
                                        </div>
                                    </div>
                                </div>
                                    <hr />
                                    <div class="model-footer text-right">
                                        <label class="wc-error pull-left" id="form_error"></label>
                                        <button type="button" class="btn btn-primary mr-3" id="btnUserFormSubmit" >Submit</button>
                                        <button type="button" class="btn btn-default btn-outline" data-dismiss="modal" aria-label="Close" onclick="ResetForm();">Close</button>
                                    </div>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
        </div>
        <!-- End Modal -->
    </div>

@endsection
@section('js')

    <script type="text/javascript">
        //  SweetAlert2
        const Toast = Swal.mixin({
            toast:true,
            position:'top-end',
            icon:'success',
            showConfirmbutton: false,
            timer:3000
        });

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        function ResetForm() {
            $('#form-navigation')[0].reset();
        }

        $(document).ready(function () {
            $("#navigation-table").DataTable({
                processing: true,
                serverSide: true,
                order:[[0,'desc']],
                ajax: "{{url('show-navigation')}}",
                columns:[

                ]


            });
            // getNavigation();
        });
        {{--function getNavigation() {--}}
        {{--    $.ajax({--}}
        {{--        url: "{{ url('api/show-navigation') }}",--}}
        {{--        type: "GET",--}}
        {{--        success: function (response) {--}}

        {{--        }--}}

        {{--    });--}}
        {{--}--}}

    </script>

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
