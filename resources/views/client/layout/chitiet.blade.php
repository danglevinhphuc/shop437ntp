@include("client.layout.header")
<style type="text/css">
	a:hover{
		text-decoration: none !important;
	}
</style>
<body id="flexshop" class="">
	@include("client.layout.topnonslide")
	
	<div id="container" class="wrapper fix-width">
		@yield('contentClient')
		
	</div>
	
<script src="{{ asset('public') }}/client/js/wow.min.js"></script>
	<script>
              new WOW().init();
              </script>
@include("client.layout.footer")
