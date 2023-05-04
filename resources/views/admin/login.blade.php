@extends('admin.main2')
@section('title','login')
@section('css')
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
    <style>
        .error{
            color: red;
        }
    </style>
@endsection
@section('content')
    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

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
                        <img src="{{URL::asset('assets/images/brand/logo.png')}}" class="header-brand-img" alt="">
                    </div>
                </div>
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" id="loginForm">
							@csrf
                                <span class="login100-form-title">
									Login
								</span>
                            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                <input class="input100" type="text" name="username" placeholder="Username or Email" autocomplete="off">
                                <span class="error usernameerr"></span>
                                <span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                <input class="input100" type="password" name="password" placeholder="Password" autocomplete="off">
                                <span class="error passworderr"></span>
                                <span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
                            </div>
                            <div class="text-right pt-1">
                                <p class="mb-0"><a href="forgot-password.html" class="text-primary ml-1">Forgot Password?</a></p>
                            </div>
                            <div class="container-login100-form-btn">
                                <input type="submit" name="submit" value="Login" id="submit" class="login100-form-btn btn-primary">

                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Not a member?<a href="{{url('api/registration-form')}}" class="text-primary ml-1">Sign UP now</a></p>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
@endsection
@section('js')

    <script>

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

        $('#loginForm').on("submit",function(event){
            event.preventDefault();
            var form = $(this).serialize();
            $.ajax({
                url:"{{route('logincheck')}}",
                data:form,
                /*   contentType:false,
                   cache:false,
                   processData:false,*/
                type:"POST",
                success:function(response){

                    if (response.msg){
                        window.location.assign("http://127.0.0.1:8000/api/dashboard");
                        // $("#loginForm")[0].reset();
                        $(".error").text("");
                        Toast.fire({
                            type:'success',
                            title:response.msg,
                        });
                    }else {
                        printErrorMsg(response);
                        Toast.fire({
                            type:'error',
                            title:response.error,
                        });
                    }
                },
                error:function(error){
                    Toast.fire({
                        type:'error',
                        title:'Something Error Found, Please try again.',
                    });
                }
            });
        });

        function printErrorMsg(msg) {
            $(".error").text("");
            $.each(msg,function(key,value) {
                $("."+key+"err").text(value);
            });
        }
    </script>
@endsection
