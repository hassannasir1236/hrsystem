<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div style="height: 100vh;" class="d-flex justify-content-center align-items-center">
	<div >
		<img src="{{auth()->user()->avatar}}"><pre>{{auth()->user()->name}}</pre>
		<p>{{auth()->user()->email}}</p>
		<a href="{{route('logout')}}" class="btn btn-outline-danger">Logout</a>
	</div> 
</div>
</body>
</html>