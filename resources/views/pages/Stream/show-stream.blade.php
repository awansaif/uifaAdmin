<html lang="en">
    <head>
		<title>Live Stream</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.agora.io/sdk/web/AgoraRTCSDK-2.8.0.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}"/>
    </head>
    <body>
			<div class="container-fluid p-0">
				<div id="full-screen-video"></div>
				<div id="watch-live-overlay">
					<div id="overlay-container">
							<div class="col-md text-center">
									<button id="watch-live-btn" type="button" class="btn btn-block btn-primary btn-xlg">
										<i id="watch-live-icon" class="fas fa-broadcast-tower"></i><span>Watch the Live Stream</span>
									</button>
								</div>
					</div>
			</div>
			</div>
		</body>
		<script src="{{ asset('js/agora-audience-client.js')}}"></script>
</html>
