@extends('admin.main')
@section('title','pos list')
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">POS List</li>
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
                        <h3 class="card-title">All POS Account</h3>
                    </div>
                </div>
                <div class="card-body">
                    {{--                    Search: <input type="text" id="myInput" onkeyup="searchData();" placeholder="Search for names.." title="Type in a name">--}}
                    <table id="pos-list-table" class="table table-hover dataTable table-striped width-full">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>NAME</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody id="all-pos">

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- COL END -->

        <!-- Modal -->
        <div class="modal fade" id="viewSinglePos" aria-hidden="true" aria-labelledby="myLargeModalLabel"
             role="dialog">
            <div class="modal-dialog" role="document" style="max-width: 975px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Individual POS detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                onclick="ResetForm();">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row row-lg">
                            <div class="col-xlg-6 col-md-6">
                                <h5> <span class="h4 font-weight-bold mt-2">Name : </span><span class="getPosName"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Company : </span><span class="getPosCompany"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Company type: </span><span class="getPosCompanyType"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Email : </span><span class="getPosEmail"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Mobile : </span><span class="getPosMobile"></span></h5>
                            </div>
                            <div class="col-xlg-6 col-md-6">
                                <h5> <span class="h4 font-weight-bold mt-2">Address : </span><span class="getPosAddress"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Request date : </span><span class="getPosReqDate"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Verification : </span><span class="getPosVerify"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Activation : </span><span class="getPosActive"></span></h5>
                                <h5> <span class="h4 font-weight-bold mt-2">Authorisation : </span><span class="getPosAuthor"></span></h5>
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
            let getUser = localStorage.getItem("userData");

            var userData = JSON.parse(getUser);

            var userId = userData.id;

            $('#pos-list-table').DataTable({
                ajax:"{{ url('partner/view-pos') }}/"+userId,
                columns: [
                    { data: 'id' },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                                return '<p>'+full['first_name']+' '+full['last_name']+'</p>';
                        }
                    },
                    { data: 'company' },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            return '<p>' + data.address + ',' + data.city + '-' + data.zip_code + ',' + data.country + '</p>';
                        }
                    },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            if (full["verifyEmail"] == 1 && full["is_active"] == 1) {
                                if (full["is_authorized"] == 1){
                                    return '<p>'+'Active & Authorised'+'</p>';
                                }else{
                                    return '<p>'+'Unauthorised'+'</p>';
                                }

                            } else {
                                return '<p>'+'Not verified'+'</p>';
                            }
                        }
                    },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            return "<button class='btn btn-success btn-sm btn-view' data-target='#viewSinglePos' data-toggle='modal' data-toggle='View pos' data-original-title='View pos' onclick='getViewPosData("+full['id']+")'>View</button>";
                        }
                    },
                ],
            });

        });

    //    view individual pos data
        function getViewPosData(id) {
            $.ajax({
                url: "{{ url('/view/individual/pos') }}/" + id,
                type: "GET",
                success: function (response) {
                    var res = response.data;

                    $(".getPosName").html(res.first_name+' '+res.last_name);
                    $(".getPosCompany").html(res.company);
                    $(".getPosCompanyType").html(res.type);
                    $(".getPosEmail").html(res.email);
                    $(".getPosMobile").html(res.mobile);
                    $(".getPosAddress").html(res.address + ',' + res.city + '-' + res.zip_code + ',' + res.country);
                    $(".getPosReqDate").html(new Date(res.created_at).toLocaleDateString('en-us', {
                        year: "numeric",
                        month: "long",
                        day: "numeric"
                    }));
                    if (res.verifyEmail ==1){
                        $(".getPosVerify").html('Email Verified');
                    }else{
                        $(".getPosVerify").html('Email not Verified');
                    }
                    if (res.is_active ==1){
                        $(".getPosActive").html('Active');
                    }else{
                        $(".getPosActive").html('Inactive');
                    }
                    if (res.is_authorized ==1){
                        $(".getPosAuthor").html('Authorised');
                    }else{
                        $(".getPosAuthor").html('Unauthorised');
                    }
                }

            });
        }

    </script>
@endsection
