<template>
<div class="row">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Softway Car</span></a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>


<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
               
				<img src="storage/img/logo.jpg" class="img-responsive" alt="" style="width: 90%;height: 90%;">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>{{this.user}}</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
		<li :class="[$route.path.includes('client')? 'active': '','nav-item']"><router-link to="/client"><em class="fa fa-dashboard">&nbsp;</em> Clients</router-link></li>
		<li :class="[$route.path.includes('vehicule')? 'active': '','nav-item']"><router-link to="/vehicule"><em class="fa fa-calendar">&nbsp;</em> Vehicules</router-link></li>
		<li :class="[$route.path.includes('reservation')? 'active': '','nav-item']"><router-link to="/reservation"><em class="fa fa-calendar">&nbsp;</em> Reservations</router-link></li>
		 <li><a href="http://localhost:8000/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
		<form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;">
        <input type="hidden" name="_token" :value="token">                                    </form>
        </li>
		
		</ul>
	</div><!--/.sidebar-->
</div>
</template>

<script>
    export default {
		props:[
			'user',
		],
		data(){
			return {
				token: $('meta[name="csrf-token"]').attr('content'),
			}
		}
		,created(){
			console.log(this.user);
		}
    }
   
</script>
