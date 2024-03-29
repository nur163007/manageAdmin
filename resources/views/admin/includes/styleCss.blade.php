<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="app-url" content="{{ url('/api') }}">
<!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('assets/images/brand/favicon.ico')}}" />

<!-- TITLE -->
<title>@yield('title')</title>

<!-- BOOTSTRAP CSS -->
<link href="{{URL::asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

<!-- STYLE CSS -->
<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet"/>
<link href="{{URL::asset('assets/css/skin-modes.css')}}" rel="stylesheet"/>
<link href="{{URL::asset('assets/css/dark-style.css')}}" rel="stylesheet"/>

<!--C3 CHARTS CSS -->
<link href="{{URL::asset('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet"/>

<!-- P-scroll bar css-->
<link href="{{URL::asset('assets/plugins/p-scroll/perfect-scrollbar.css')}}" rel="stylesheet" />

<!--- FONT-ICONS CSS -->
<link href="{{URL::asset('assets/plugins/icons/icons.css')}}" rel="stylesheet"/>

<!-- sweetalert 2 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">

<!-- DataTables -->
{{--<link rel="stylesheet" href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}">--}}
<link rel="stylesheet" href="{{ asset('assets/plugins/datatable/dataTables.min.css') }}">

@yield('css')

<!-- SIDE-MENU CSS -->
<link href="{{URL::asset('assets/css/sidemenu.css')}}" rel="stylesheet"/>

<!-- SIDEBAR CSS -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet"/>

<!-- COLOR SKIN CSS -->
<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{URL::asset('assets/colors/color1.css')}}" />

<!-- NID SHOW CSS -->
<link rel="stylesheet" href="{{URL::asset('assets/css/nid-style.css')}}">
