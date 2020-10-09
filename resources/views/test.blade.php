
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}"/>
	<title>SoftCaisse - Clients</title>
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{ asset('css/datepicker3.css')}}" rel="stylesheet">
	<link href="{{ asset('css/sweetalert.min.css')}}" rel="stylesheet">
	<link href="{{ asset('css/styles.css')}}" rel="stylesheet">
	
	<!--Custom Font-->
	<!--[if lt IE 9]>
	<script src="{{ asset('js/html5shiv.js')}}"></script>
	<script src="{{ asset('js/respond.min.js')}}"></script>
	<![endif]-->
</head>
<body>
    <div id="app">
		<sidebar-component v-if="!this.$store.state.reservations.generateContrat" user="{{ Auth::user()->name }}"></sidebar-component>
		<router-view></router-view>
        <div class="row" v-if="!this.$store.state.reservations.generateContrat">
            <div class="col-sm-12">
            <p class="back-link">SoftCaisse Theme by <a href="https://www.softandscripts.com">Soft&Scripts</a></p>
		</div>
		</div>
    </div>
</body>

	<script src="{{ asset('js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
	<script src="{{ asset('js/custom.js')}}"></script>
	<script src="{{ asset('js/sweetalert.min.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
	

</html>