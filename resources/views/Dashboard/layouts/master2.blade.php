<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin Dashboard,admin Dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 Dashboard,bootstrap admin,bootstrap admin Dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap Dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,Dashboard bootstrap 4,Dashboard design,Dashboard html,Dashboard template,Dashboard ui kit,envato templates,flat ui,html,html and css templates,html Dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		@include('Dashboard.layouts.head')
	</head>
	
	<body class="main-body bg-primary-transparent">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/Dashboard/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		@yield('content')		
		@include('Dashboard.layouts.footer-scripts')	
	</body>
</html>