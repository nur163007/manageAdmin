@extends('admin.main2')
@section('title','login')
@section('css')
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
    <style>
        .error {
            color: red;
        }
    </style>
@endsection
@section('content')
    <!-- BACKGROUND-IMAGE -->
    <div class="login-img" style="background-color: #b3d7ff!important;">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{URL::asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->
        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto">
                    <div class="text-center">
                        <img src="{{URL::asset('assets/images/logos/OmniPOS-partners-panel-logo.png')}}"
                             class="header-brand-img" alt="">
                    </div>
                </div>
                {{--                {{ Session::get('error') }}--}}
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" id="loginForm">
                            {{ csrf_field() }}
                            <span class="login100-form-title">
									Login
								</span>
                            <div class="wrap-input100 validate-input"
                                 data-validate="Valid email is required: ex@abc.xyz">
                                <input class="input100" type="text" name="username" placeholder="Username or Email"
                                       autocomplete="off">
                                <span class="error usernameerr"></span>
                                <span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100" type="password" name="password" placeholder="Password"
                                       autocomplete="off">
                                <span class="error passworderr"></span>
                                <span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
                            </div>
                            <div class="text-right pt-1">
                                <p class="mb-0">
                                    <a href="javascript:void(0)" class="text-primary ml-1" data-target='#forgotPassForm'
                                       data-toggle='modal' data-toggle='Forgot Password'
                                       data-original-title='Forgot Password'>Forgot Password?</a>
                                </p>
                            </div>
                            <div class="container-login100-form-btn">
                                <input type="submit" name="submit" value="Login" id="submit"
                                       class="login100-form-btn btn-primary">

                            </div>
                            <div class="text-center pt-3">
                                {{--                                <p class="text-dark mb-0">Not a member?<a href="{{url('registration')}}" class="text-primary ml-1">Sign UP now</a></p>--}}
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
                <!-- Modal -->
                <div class="modal fade" id="forgotPassForm" aria-hidden="true" aria-labelledby="exampleModalTitle"
                     role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Password Reset Form</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                        onclick="ResetPasswordForm();">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formresetPassword" name="formresetPassword" autocomplete="off">
                                    @csrf
                                    <div class="container-fluid">

                                        <label class="col-md-3 control-label"><strong>Email :</strong></label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control" name="resetEmail" id="resetEmail"
                                                   placeholder="Give your valid email">
                                        </div>
                                        <h5 class="errorEmail mt-2 ml-3 text-danger"></h5>
                                        <div class="model-footer mt-5 ml-3">
                                            <input type="submit" name="submit" value="Submit"
                                                   class="btn btn-primary mr-3" id="btnResetPassSubmit">
                                            <button type="button" class="btn btn-default btn-outline"
                                                    data-dismiss="modal" aria-label="Close"
                                                    onclick="ResetPasswordForm();">Close
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
@endsection
@section('js')

    <script>
        var base_url = window.location.origin;

        let getToken = localStorage.getItem("accessToken");
        let getExpiry = localStorage.getItem("expires_in");
        let currentURL = localStorage.getItem("currentURL");
        if (getToken != null || getExpiry != null) {
            window.location.assign(currentURL);
        }
        //  SweetAlert2
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            showConfirmbutton: false,
            timer: 3000
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // LOGIN FORM

        $('#loginForm').on("submit", function (event) {
            event.preventDefault();
            var form = $(this).serialize();
            $.ajax({
                url: "{{route('logincheck')}}",
                data: form,
                type: "POST",
                success: function (response) {
                    localStorage.setItem("accessToken", response.access_token);
                    localStorage.setItem("expires_in", response.expires_in);
                    localStorage.setItem("created_at", response.created_at);
                    let getToken = localStorage.getItem("accessToken");
                    let getExpiry = localStorage.getItem("expires_in");
                    let created_at = localStorage.getItem("created_at");
                    let tokenCreateTime = new Date(created_at).getTime() / 1000;
                    let currentTime = new Date().getTime() / 1000;
                    let now = Math.floor(currentTime - tokenCreateTime);

                    let r = JSON.stringify(response.user);
                    let data = JSON.parse(r);
                    localStorage.setItem("userData", r);
                    // if (response.success == true){
                    if (getToken != null || getExpiry >= now) {
                        window.location.assign(base_url + "/dashboard");
                    } else {
                        window.location.assign(base_url + "/");
                    }

                    // $("#loginForm")[0].reset();
                    $(".error").text("");
                    Toast.fire({
                        type: 'success',
                        title: response.msg,
                    });
                },
                error: function (error) {
                    Toast.fire({
                        type: 'error',
                        title: 'Invalid username Or password',
                    });
                }
            });
        });

        //RESET PASSWORD

        $('#formresetPassword').on("submit", function (event) {
            event.preventDefault();
            var form = $(this).serialize();
            if (valideEmail()){
                $("#btnResetPassSubmit").attr('disabled', true);
                $.ajax({
                    url: "{{route('reset.password')}}",
                    data: form,
                    type: "POST",
                    success: function (response) {

                        if (response.success == true){
                            $("#btnResetPassSubmit").attr('disabled', false);
                            ResetPasswordForm();
                            Toast.fire({
                                type: 'success',
                                title: response.msg,
                                timer: 9000
                            });
                        }else{
                            $(".errorEmail").text(response.msg)
                        }

                    },
                });
            }else{
                return false;
            }

        });

        function printErrorMsg(msg) {
            $(".error").text("");
            $.each(msg, function (key, value) {
                $("." + key + "err").text(value);
            });
        }

        function ResetPasswordForm() {
            $("#formresetPassword")[0].reset();
            $("#forgotPassForm").modal('hide');
        }
        function valideEmail() {
            if($("#resetEmail").val()==""){
                $("#resetEmail").focus();
                $(".errorEmail").text('Email filed is Required')
                return false;
            }
            return true;
        }
    </script>
@endsection
