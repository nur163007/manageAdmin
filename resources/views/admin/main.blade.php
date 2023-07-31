<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Volgh –  Bootstrap 4 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat Laravel Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="dashboard, admin, dashboard template, admin template, laravel, php laravel, laravel bootstrap, laravel admin template, bootstrap laravel, bootstrap in laravel, laravel dashboard template, laravel admin, laravel dashboard, laravel blade template, php admin">

    @include('admin.includes.styleCss')
    <style>
        .sidebarerr{
            color: red;
            font-size: 20px;
        }
    </style>
</head>

<body class="app sidebar-mini">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{URL::asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

        @include('admin.includes.left_sidebar')

        @include('admin.includes.mobile-header')

        <div class="app-content">
            <div class="side-app">

                <div class="page-header">
                    @yield('page-header')
                    @include('admin.includes.notification')
                </div>

                @yield('content')

                @include('admin.includes.right_sidebar')

                @include('admin.includes.footer')

            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
</div>

@include('admin.includes.styleJs')
<script type="text/javascript">
    //  SweetAlert2
    const Toast = Swal.mixin({
        toast:true,
        position:'top-end',
        icon:'success',
        showConfirmbutton: false,
        timer:3000
    });

    // localStorage.removeItem("accessToken");
    // localStorage.removeItem("expires_in");
    // localStorage.removeItem("userData");

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });
    var base_url = window.location.origin;
    var current_url = window.location.href;
    localStorage.setItem("currentURL", current_url);

    let getToken = localStorage.getItem("accessToken");
    $("#hiddenToken").val(getToken);
    $("#hiddenMobileToken").val(getToken);
    let getExpiry = localStorage.getItem("expires_in");
    let created_at = localStorage.getItem("created_at");
    let tokenCreateTime = new Date(created_at).getTime() / 1000;
    let currentTime = new Date().getTime() / 1000;
    let now = Math.floor(currentTime - tokenCreateTime);

    if(now >= getExpiry){
        localStorage.removeItem("accessToken");
        localStorage.removeItem("expires_in");
    }

    if(getToken == null || getExpiry == null){
        window.location.assign(base_url+"/login");
    }
    $(document).ready(function () {
        let getUser = localStorage.getItem("userData");

        var data = JSON.parse(getUser);
        //call sidebar fucntion
        var isauthor =data.isauthorized;

        if (isauthor == 1){
            getSidebar();
        }

        $(".getFullName").html(data.firstname +' '+data.lastname);
        $(".getCompany").html(data.company);
        $(".getEmail").html(data.email);
        $(".getMobile").html(data.mobile);
        $(".getAddress").html(data.address +','+data.city+','+data.state+'-'+data.zipcode+','+data.country);
        $(".getNid").html(data.nid);
        $(".getuserName").html(data.username);
        $(".memberShip").html(new Date(data.createdon).toLocaleDateString('en-us', {year:"numeric", month:"short", day:"numeric"}));

        //desktop logout function

        $("#logout-desktop").on('submit',function (event) {
            event.preventDefault();
            var form = $(this).serialize();
            $.ajax({
                url:"{{route('user_logout')}}",
                data:form,
                type:"POST",
                success:function(response){
                    if (response.success == true){

                        localStorage.removeItem("accessToken");
                        localStorage.removeItem("expires_in");
                        localStorage.removeItem("userData");
                        window.location.assign(base_url+"/login");
                    }
                    $(".error").text("");
                    Toast.fire({
                        type:'success',
                        title:response.msg,
                    });
                },
                error:function(error){
                    Toast.fire({
                        type:'error',
                        title:'Something Error Found, Please try again.',
                    });
                }
            });
        });


        //mobile logout function

        $("#logout-mobile").on('submit',function (event) {
            event.preventDefault();
            var form = $(this).serialize();
            $.ajax({
                url:"{{route('user_logout')}}",
                data:form,
                type:"POST",
                success:function(response){
                    if (response.success == true){
                        localStorage.removeItem("accessToken");
                        localStorage.removeItem("expires_in");
                        localStorage.removeItem("userData");
                        window.location.assign(base_url+"/login");
                    }
                    $(".error").text("");
                    Toast.fire({
                        type:'success',
                        title:response.msg,
                    });
                },
                error:function(error){
                    Toast.fire({
                        type:'error',
                        title:'Something Error Found, Please try again.',
                    });
                }
            });
        });
    });

    //sidebar function
    function getSidebar(){
        $.ajax({
            url:"{{url('get/sidebar')}}",
            type:"GET",
            success:function(response){
                var html = '<li><h3>Main</h3></li>';
                let url;
                if (response.sidebar.length > 0){
                    for (let i=0;i<response.sidebar.length; i++) {
                        let sidebar = response.sidebar;
                        if (getToken == null) {
                            url = base_url+"/login";
                        }else {
                            url = sidebar[i]['url'];
                        }
                        if (sidebar[i]['parent'] == null && sidebar[i]['url'] != null) {
                            html += "<li>" + '<a class="side-menu__item active" href="' + url + '"><i class="side-menu__icon ' + sidebar[i]['icon'] + '"></i><span class="side-menu__label">' + sidebar[i]['name'] + '</span></a>' + "</li>";
                        } else {
                            html += "<li class='slide'>" + '<a class="side-menu__item submenu" data-toggle="slide" href="javascript:void(0)" onclick="getSubmenu(this)"><i class="side-menu__icon ' + sidebar[i]['icon'] + '"></i><span class="side-menu__label">' + sidebar[i]['name'] + '</span><i class="angle fa fa-angle-right"></i></a><ul class="slide-menu">';
                            for (let j = 0; j < response.submenu.length; j++) {
                                let submenu = response.submenu;
                                let suburl;
                                if (getToken == null) {
                                    suburl = base_url+"/login";
                                }else {
                                    suburl = submenu[j]['url'];
                                }
                                if (submenu[j]['parent'] == sidebar[i]['id'] && submenu[j]['url'] != null) {
                                    html += "<li>" + '<a href="' + suburl + '" class="slide-item"><i class="' + submenu[j]['icon'] + '"></i><span class="side-menu__label ml-1">' + submenu[j]['name'] + '</span></a>' + "</li>";
                                }
                                // $(".submenu").html(sub);
                            }
                            html += "</ul></li>";
                        }
                    }
                    $(".side-menu").html(html);
                    // alert(html)
                }
                else {
                    $(".sidebarerr").text('No data found');
                }
            },
            error:function(error){

            }
        });
    }

    $('.side-menu__item').click(function(){
        $('.side-menu__item').each(function(){
            $(this).removeClass('active');
        });
        $(this).addClass('active');
    });

    function getSubmenu(menu) {
        menu.classList.toggle("active");
        var dropdownContent = menu.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    }


</script>
</body>
</html>
