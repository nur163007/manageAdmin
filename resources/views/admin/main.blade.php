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
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        getSidebar();
        //
    });
    function getSidebar(){
        $.ajax({
            url:"{{url('api/get/sidebar')}}",
            type:"GET",
            success:function(response){
                var html = '<li><h3>Main</h3></li>';

                if (response.sidebar.length > 0){
                    for (let i=0;i<response.sidebar.length; i++){
                        let sidebar = response.sidebar;
                        let url = sidebar[i]['url'];
                        if (sidebar[i]['parent'] == null && sidebar[i]['url'] != null){
                            html +="<li>"+'<a class="side-menu__item" href="'+url+'"><i class="side-menu__icon '+sidebar[i]['icon']+'"></i><span class="side-menu__label">'+sidebar[i]['name']+'</span></a>'+"</li>";
                        }
                        else{
                            html +="<li class='slide'>"+'<a class="side-menu__item submenu" data-toggle="slide" href="javascript:void(0)" onclick="getSubmenu(this)"><i class="side-menu__icon '+sidebar[i]['icon']+'"></i><span class="side-menu__label">'+sidebar[i]['name']+'</span><i class="angle fa fa-angle-right"></i></a><ul class="slide-menu">';
                            for (let j=0; j<response.submenu.length; j++){
                                let submenu = response.submenu;
                                let suburl = submenu[j]['url'];
                                if (submenu[j]['parent'] == sidebar[i]['id'] && submenu[j]['url'] != null){
                                    html +="<li>"+'<a href="'+suburl+'" class="slide-item"><i class="'+submenu[j]['icon']+'"></i><span class="side-menu__label ml-1">'+submenu[j]['name']+'</span></a>'+"</li>";
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


    function getSubmenu(menu) {
        menu.classList.toggle("active");
        var dropdownContent = menu.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    }
    // $(".side-menu__item").on('click',function () {
    //     alert(234)
    // })

</script>
</body>
</html>
