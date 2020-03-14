
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
<!-- 
Easy Profile Template
http://www.templatemo.com/tm-467-easy-profile
-->
	<!-- stylesheet css -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/templatemo-blue.css">
</head>
<body data-spy="scroll" data-target=".navbar-collapse" style="font-family: Arial">

<!-- preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-wordpress">
       <span class="sk-inner-circle"></span>
     </div>
</div>

    @yield('content')

<!-- javascript js -->	
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>	
<script src="/js/jquery.backstretch.min.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/profile.js"></script>

</body>
</html>