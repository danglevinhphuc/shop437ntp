<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Admin - Shop HANAH</title>
    <meta name="description" content="Website 437 Nguyễn Tri Phương Phường 8,Quận 10, HANAH GIFT SHOP là cửa hàng quà lưu niệm hàng đầu tại TPHCM,Chuyên bán các loại quà lưu niệm chất lượng cao"/>
    <meta name="keywords" content="437nguyentriphuong, Quà lưu niệm, Shop hanah, quà lưu niệm tại tphcm , shophanah quà lưu niệm, Nguyễn tri phương quà lưu niệm, Nguyễn tri phương, thú bông hanah , thú bông nguyễn tri phương, quà lưu niệm tphcm" />
    <meta name="copyright" content="147nguyentriphuong" />
    <meta name="author" content="147nguyentriphuong" />
    <meta name="geo.placename" content="437 Nguyễn Tri Phương Phường 8, Quận 10" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.position" content="10.764396;106.667749" />
    <meta name="ICBM" content="10.764396, 106.667749" />
    <meta name="dc.description" content="@yeild('description')">
    <meta name="dc.keywords" content="">
    <meta name="dc.subject" content="Website shop HANAH quà lưu niệm">
    <meta name="dc.created" content="2016-11-01">
    <meta name="dc.publisher" content="Website shop HANAH quà lưu niệm">
    <meta name="dc.creator.name" content="147nguyentriphuong">
    <meta name="dc.identifier" content="{{route('trangchu')}}">
    <meta name="dc.rights.copyright" content="147nguyentriphuong">
    <meta name="dc.language" content="vi-VN">
    <base href="{{ asset('') }}">
    <link rel="icon" href='{{ asset("public") }}/client/img/logo.jpg'>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public') }}/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('public') }}/admin_assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('public') }}/admin_assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('public') }}/admin_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{ asset('public') }}/admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('public') }}/admin_assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div id="wrapper">

        @include("admin.layout.header")

        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('public') }}/admin_assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('public') }}/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('public') }}/admin_assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('public') }}/admin_assets/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('public') }}/admin_assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public') }}/admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script type="text/javascript" language="javascript" src="{{ asset('public') }}/admin_assets/ckeditor/ckeditor.js" ></script>
    @yield('script')
</body>

</html>
