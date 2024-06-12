@extends('admin.main')
@section('title','dashboard')
@section('css')
    {{--    <link href="{{ URL::asset('assets/plugins/morris/morris.css')}}" rel="stylesheet">--}}
    {{--    <link href="{{ URL::asset('assets/plugins/rating/rating.css')}}" rel="stylesheet">--}}
    <style>
        @media screen and (max-width: 560px) {
            .PayMethod {
                font-size: 13px;
            }
        }
    </style>
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div id="admin">
        @include('admin.individual_dashboard.admin_dashboard')
    </div>
    <div id="partner">
        @include('admin.individual_dashboard.partner_dashboard')
    </div>
    <div id="pos">
        @include('admin.individual_dashboard.pos_dashboard')
    </div>
@endsection
@section('js')

    <script type="text/javascript">

        $(document).ready(function () {
            let getUser = localStorage.getItem("userData");

            var data = JSON.parse(getUser);

            var isauthor = data.is_authorized;
            var isdocreject = data.is_doc_rejected;
            var userrole = data.role;
            var userId = data.id;
            $(".posUser").val(userId);

            $(".unauthoraisation").hide();
            $(".authorized").hide();
            $("#partner").hide();
            $("#pos").hide();
            $("#admin").hide();
            $("#posPayment").hide();
            $("#payment").hide();
            $(".hidePaymentBtn").show();


            if (userrole == 1 || userrole == 2) {
                $("#partner").hide();
                $("#pos").hide();
                $("#admin").show();
            } else if (userrole == 3) {
                $("#partner").show();
                $("#admin").hide();
                $("#pos").hide();
                if (isauthor == 1) {
                    $(".unauthoraisation").hide();
                    $(".authorized").show();
                } else {
                    $(".unauthoraisation").show();
                    $(".authorized").hide();
                    if (isdocreject == 0) {
                        $(".notReject").show();
                        $(".isReject").hide();
                    } else {
                        $(".notReject").hide();
                        $(".isReject").show();
                    }
                }
            } else if (userrole == 4) {
                $("#partner").hide();
                $("#admin").hide();
                $("#pos").show();
                if (isauthor == 1) {
                    $(".unauthoraisation").hide();
                    $(".authorized").show();
                } else {
                    $(".unauthoraisation").show();
                    $(".authorized").hide();
                    if (isdocreject == 0) {
                        $(".notReject").show();
                        $(".isReject").hide();
                    } else {
                        $(".notReject").hide();
                        $(".isReject").show();
                    }
                }
            }

            //list all registration data

            $('#verification_data_table').DataTable({
                ajax: "{{ route('all.dashboard.data') }}",
                columns: [
                    {data: 'id'},
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            return '<p>' + data.first_name + ' ' + data.last_name + '</p>';
                        }
                    },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            if (full['role'] == 3) {
                                return '<p>Partner</p>';
                            } else if (full['role'] == 4) {
                                return '<p>POS Owner</p>';
                            }

                        }
                    },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            return '<p>' + data.address + ',' + data.city + '-' + data.zip_code + ',' + data.country + '</p>';
                        }
                    },
                    {data: 'created_at'},
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            if (full["is_authorized"] == 1) {
                                return '<p class="text-success">' + 'Accepted all documents' + '</p>';
                            } else {
                                if (full["is_completed"] == 0) {
                                    return '<p class="text-warning">' + 'Pending Approval' + '</p>';
                                } else {
                                    if (full["is_doc_rejected"] == 0) {
                                        return '<p class="text-warning">' + 'Pending Approval' + '</p>';
                                    } else {
                                        return '<p class="text-danger">' + 'Reject the user Request' + '</p>';
                                    }
                                }
                            }
                        }
                    },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            return "<button class='btn btn-sm' data-toggle='Edit User' data-original-title='Edit User' onclick='getShowUserProfile(" + full['id'] + ")'><i class='fa fa-edit' style='font-size: 17px; color: blue;'></i></button>";
                        }
                    },
                ],
            });

            //payment information table for pos owner payment

            $('#payment_verification_table').DataTable({
                ajax: "{{ route('payment.verification.data') }}",
                columns: [
                    {data: 'user_id'},
                    {data: 'company'},
                    {data: 'amount'},
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            var payDate = new Date(data.payment_date).toLocaleDateString('en-us', {
                                year: "numeric",
                                month: "long",
                                day: "numeric"
                            });
                            if (full['payment_date'] != null) {
                                return '<p>' + payDate + '</p>';
                            } else {
                                return '<p></p>';
                            }

                        }
                    },
                    {data: 'payment_method'},
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            if (full['payment_date'] != null) {
                                return "<button class='btn btn-sm' data-target='#PaymentSlipModal' data-toggle='modal' data-original-title='View Slip' onclick='getPaymentSlip(" + full['id'] + ")' ><i class='fa fa-file-text-o text-primary' style='font-size: 15px;'></i></button>";
                            }else{
                                return '<p></p>';
                            }
                        }
                    },
                    {
                        "data": null, "sortable": false, "class": "text-left padding-5",
                        "render": function (data, type, full) {
                            if (full['payment_date'] != null) {
                                return "<button class='btn btn-sm' data-toggle='Edit User' data-original-title='Edit User' onclick='getUpdatePayment(" + full['id'] + ")'><i class='fa fa-check text-success' style='font-size: 15px;border: 1px solid green;border-radius: 3px;'></i></button>";
                            } else {
                                return '<p>Wait For payment</p>';
                            }
                        }
                    },
                ],
            });


            //list of pending data

            $.ajax({
                url: "{{ url('/user/pos/dashboard/list') }}/" + userId,
                type: "GET",
                success: function (response) {

                    var list = '';
                    var res = response.userinfo;
                    if (response.success == true) {
                        if (userrole == 3) {
                            /*for (let i = 0; i < res.length - 1; i++) {
                                if (res[i].registration_status == null) {
                                    list += '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> ' + res[i].name + '</li>';
                                } else {
                                    list += '<li class="mt-2 ml-5"><i class="fa fa-check" style="color:limegreen;font-size: 15px;" aria-hidden="true"></i> ' + res[i].name + '</li>';
                                }
                            }*/
                            if (res.registration_status == null) {
                                list += '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> Doument upload</li>' +
                                    '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> Admin Approval</li>';
                            } else if (res.registration_status == 2) {
                                list += '<li class="mt-2 ml-5"><i class="fa fa-check" style="color:limegreen;font-size: 15px;" aria-hidden="true"></i> Doument upload</li>' +
                                    '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> Admin Approval</li>';
                            } else if (res.registration_status == 3) {
                                list += '<li class="mt-2 ml-5"><i class="fa fa-check" style="color:limegreen;font-size: 15px;" aria-hidden="true"></i> Doument upload</li>' +
                                    '<li class="mt-2 ml-5"><i class="fa fa-check" style="color:limegreen;font-size: 15px;" aria-hidden="true"></i> Admin Approval</li>';
                            }

                        } else if (userrole == 4) {
                            /*     for (let i = 0; i < res.length; i++) {
                                     if (res[i].registration_status == null) {
                                         list += '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> ' + res[i].name + '</li>';
                                     } else {

                                         list += '<li class="mt-2 ml-5"><i class="fa fa-check" style="color:limegreen;font-size: 15px;" aria-hidden="true"></i> ' + res[i].name + '</li>';
                                     }
                                 }*/
                            if (res.registration_status == null) {
                                list += '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> Doument upload</li>' +
                                    '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> Admin Approval</li>' +
                                    '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> Payment</li>';
                            } else if (res.registration_status == 2) {
                                list += '<li class="mt-2 ml-5"><i class="fa fa-check" style="color:limegreen;font-size: 15px;" aria-hidden="true"></i> Doument upload</li>' +
                                    '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> Admin Approval</li>' +
                                    '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> Payment</li>';
                            } else if (res.registration_status == 3) {
                                list += '<li class="mt-2 ml-5"><i class="fa fa-check" style="color:limegreen;font-size: 15px;" aria-hidden="true"></i> Doument upload</li>' +
                                    '<li class="mt-2 ml-5"><i class="fa fa-check" style="color:limegreen;font-size: 15px;" aria-hidden="true"></i> Admin Approval</li>' +
                                    '<li class="mt-2 ml-5"><i class="fa fa-times" style="color:red;font-size: 15px;" aria-hidden="true"></i> Payment</li>';
                            }
                        }
                        $(".posAcountDashboard").html(list);
                    }

                }
            });

            $(".hidePaymentBtn").hide();
            $(".dashbordIamge").hide();
            $(".hidePosDashbord").hide();
            // complete task after registration
            $.ajax({
                url: "{{ url('/user/pos/complete/payment') }}/" + userId,
                type: "GET",
                success: function (response) {
                    var res = response.data;
                    if (response.success == true) {
                        for (let i = 0; i < res.length; i++) {
                            if (res[i]['payment_date'] != null && res[i].admin_confirmation == 1) {
                                $(".hidePaymentBtn").hide();
                                $(".dashbordIamge").hide();
                                $(".hidePosDashbord").show();
                            } else {
                                $(".hidePaymentBtn").show();
                                $(".dashbordIamge").show();
                                $(".hidePosDashbord").hide();
                            }
                        }
                    }
                }
            });

            //    in partner dashboard count users
            $.ajax({
                url: "{{ url('/user/partner/count/users') }}/" + userId,
                type: "GET",
                success: function (response) {
                    var activeUser = response.activeUser;
                    var suspend = response.suspendUser;

                    $(".activeUsers").html(activeUser)
                    $(".suspendUsers").html(suspend)

                }
            });
        });

        //individual profile show by admin
        function getShowUserProfile(id) {
            window.location.assign(base_url + "/user/profile/info/" + id);
        }

        //    payment proves image upload function

        $("#showPaymentProves").hide();

        function displayPaymentProves(e) {
            if ($("#paymentProve").val() != '') {
                $("#showPaymentProves").show();
                $("#hidePaymentProves").hide();
            } else {
                $("#hidePaymentProves").show();
                $("#showPaymentProves").hide();
            }
            if (e.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector('#showPaymentProves').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }

        //    store payment proves to payment_history table

        $('#uploadPaymentBtn').on("click", function (event) {
            event.preventDefault();
            if (validatePos()) {
                let paymentProve = $("#paymentProve")[0].files;
                let userid = $(".posUser").val();
                let paymentMethod = $('input[name="paymentMethod"]').val();
                var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
                var fd = new FormData();

                // Append data
                fd.append('paymentProve', paymentProve[0]);
                fd.append('userid', userid);
                fd.append('paymentMethod', paymentMethod);
                fd.append('_token', CSRF_TOKEN);
                $.ajax({
                    url: "<?php echo e(route('upload.payment.method')); ?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'post',
                    data: fd,
                    dataType: 'json',
                    success: function (response) {

                        if (response.success == true) {
                            Toast.fire({
                                type: 'success',
                                title: response.msg,
                            });
                            location.reload();
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: response.msg,
                            });
                        }

                    },
                    error: function (error) {
                        Toast.fire({
                            type: 'error',
                            title: 'Something Error Found, Please try again.',
                        });
                    }
                });
            } else {
                return false;
            }
        });

        function ResetPaymentMethodForm() {
            $("#getPaymentMethodForm")[0].reset();
            $("#hidePaymentProves").show();
            $("#showPaymentProves").hide();
        }

        function validatePos() {
            if (!($('input[name="paymentMethod"]')[0].checked || $('input[name="paymentMethod"]')[1].checked)) {
                Toast.fire({
                    type: 'error',
                    title: 'Please choose the payment method.',
                });
                return false;
            }
            if ($('#paymentProve').val() == "") {
                $('#paymentProve').focus();
                Toast.fire({
                    type: 'error',
                    title: 'Please upload the payment proofs.',
                });
                return false;
            }
            return true;
        }

        //    update payment confirmation by admin
        function getUpdatePayment(id) {
            var result = confirm("Is payment is done then press OK");
            if (result) {
                $.ajax({
                    url: "{{ url('give/payment/confirmation') }}/" + id,
                    type: "GET",
                    success: function (response) {
                        if (response.success == true) {
                            Toast.fire({
                                type: 'success',
                                title: response.msg,
                            });
                            $('#payment_verification_table').DataTable().ajax.reload();
                        }
                    },
                    error: function (error) {
                        Toast.fire({
                            type: 'error',
                            title: 'Something Error Found, Please try again.',
                        });
                    }

                });
            }
        }

        //get payment slip function
        function getPaymentSlip(id) {
            $.ajax({
                url: "{{ url('get/payment/slip') }}/" + id,
                type: "GET",
                success: function (response) {
                    $("#paymentSlip").attr("src", "{{asset('documents/paymentProof/pos')}}/" + response[0].ref_image);
                },
                error: function (error) {
                    Toast.fire({
                        type: 'error',
                        title: 'not found.',
                    });
                }

            });
        }
    </script>

@endsection
