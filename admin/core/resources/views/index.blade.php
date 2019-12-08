<!DOCTYPE html>
<html>
<head>
	<title>Admin Ecommerce</title>
	
	@include('script-style.style')
	@include('script-style.script')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		@include('header.header')
		@include('sidebar.sidebar')
		<div class="content-wrapper">
			{!! $content !!}
		</div>
		@include('footer.footer')
	</div>
</body>
</html>