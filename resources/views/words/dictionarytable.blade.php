<!DOCTYPE html>
<html lang="en">
<head>
	<title>WORD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="/img/bal.png" rel="shortcut icon"/>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
<!--===============================================================================================-->
</head>
<body>
		
		<div class="limiter">
		
		<div class="container-table100">
		
			<div class="wrap-table100">
			<div class="row header">
						<h1>English Word</h1>
						</div>
					<div class="table">

						<div class="row header">
							<div class="cell">
								Word ID
							</div>
							<div class="cell">
								 WORD
							</div>
							<div class="cell">
								Inserted At
							</div>
							<div class="cell">
								Deleted At
							</div>
						</div>

						@foreach ( $data as $value)

						<div class="row">
							<div class="cell" data-title="Sentence ID">
								{{ $value->id }}
							</div>
							<div class="cell" data-title="Sentence">
                            {{ $value->banglaWord }}
							</div>
							<div class="cell" data-title="Inserted At">
                            {{ $value->englishWord }}
							</div>
							<div class="cell" data-title="Updated At">
							hello
							</div>
						</div>

						@endforeach
					</div>
			</div>
		</div>
		


		



	</div>


	

<!--===============================================================================================-->	
	<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/bootstrap/js/popper.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/js/main.js"></script>

</body>
</html>