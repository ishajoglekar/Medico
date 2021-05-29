
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>@yield('title')</title>

    <!-- Favicons -->
    <link href="{{asset('dashboard/img/favicon.png')}}" rel="icon">
    <link href="{{asset('dashboard/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('dashboard/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('dashboard/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/zabuto_calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('dashboard/lib/gritter/css/jquery.gritter.css')}}" />
  <!-- Custom styles for this template -->
  <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/css/style-responsive.css')}}" rel="stylesheet">

  <link href="{{asset('dashboard/lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('dashboard/lib/advanced-datatable/css/DT_bootstrap.css')}}" />
  <script src="{{asset('dashboard/lib/chart-master/Chart.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <style>
    .dashboard-content{
        background:#FfFfff;
        height:100vh;
        overflow-x:hidden;
        position:fixed;
        top:50px;
        left:210px;
        width:85%;
        color:black;
        padding: 20px 20px 50px 20px;
        overflow-y: auto;
    }
    .title{
        border-bottom:solid 1px black;
        /* height:70px; */
        background:#F0F0F5;
        padding-left:2%;
        margin-top:-1%;
    }
    .title h4{
        font-size:24px;
        font-weight:600;
        line-height:70px;
    }
    .card span{
    color:red;
    font-size:17px;
    }
    .modal-backdrop{
            display: none!important;
        }

    </style>

    <link rel="stylesheet" href="{{asset('dashboard/css/modal.css')}}">
  @yield('page-level-styles')
</head>



<body>
  <section id="container">
    <!--header start-->
    @include('pharma.dashboard._header')
    <!--header end-->

    <!--sidebar start-->
    @include('pharma.dashboard.sidebar')
    <!--sidebar end-->

    <!--main content start-->
    <div class="dashboard-content">
    <div class="title" style="margin-bottom: 10px"><h4>@yield('dashboard-title')</h4></div>
    @include('pharma.dashboard.message')
        @yield('main-content')
    </div>
    <!--main content end-->
    <!--footer start-->

    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('dashboard/lib/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('dashboard/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('dashboard/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('dashboard/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('dashboard/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{asset('dashboard/lib/jquery.sparkline.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{asset('dashboard/lib/common-scripts.js')}}"></script>
  <script type="text/javascript" src="{{asset('dashboard/lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{asset('dashboard/lib/gritter-conf.js')}}"></script>
  <!--script for this page-->
  <script src="{{asset('dashboard/lib/sparkline-chart.js')}}"></script>
  <script src="{{asset('dashboard/lib/zabuto_calendar.js')}}"></script>

  <script type="text/javascript" language="javascript" src="{{asset('dashboard/lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
  <script type="text/javascript" src="{{asset('dashboard/lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>

  @yield('page-level-scripts')

    <script>
        var id = {{auth()->id()}}
        Echo.private(`notify.${id}`)
        .listen('NotificationEvent',(e)=>{
            console.log(e.message[1].message);
            $("#doc-nav-notification").prepend(`
                <li>
                    <a href="dashboard/pharma/supplierRequest">
                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                        ${e.message[1].message}${e.message[2]}
                    </a>
                </li>
            `);
            $("#unread").html((parseInt($("#unread").html())+1));
            $("#total-notify").html((parseInt($("#total-notify").html())+1));
        })
    </script>
    @include('partials.notification-read')
</body>
</html>
