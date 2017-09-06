@include("client.layout.header")
<body id="flexshop" class="">
	@include("client.layout.top-menu")
		
	<div id="container" class="wrapper fix-width">
		@yield('contentClient')
		
	</div>
	
<script src="{{ asset('public') }}/client/js/wow.min.js"></script>
	<script>
              new WOW().init();
              </script>
@include("client.layout.footer")
