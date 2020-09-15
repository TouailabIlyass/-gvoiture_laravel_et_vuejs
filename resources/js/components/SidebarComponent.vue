<template>
<div class="row">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>SoftCaisse</span></a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>


<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
               
				<img src="storage/img/logo.png" class="img-responsive" alt="" style="width: 90%;height: 90%;">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">User session</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>admin</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
		<li class="active"><router-link to="/client"><em class="fa fa-dashboard">&nbsp;</em> Clients</router-link></li>
		<li ><router-link to="/vehicule"><em class="fa fa-calendar">&nbsp;</em> Vehicules</router-link></li>
		<li ><router-link to="/reservation"><em class="fa fa-calendar">&nbsp;</em> Reservations</router-link></li>
		<li ><a href="#"><em class="fa fa-bar-chart">&nbsp;</em> Produits</a></li>
			
			<li><a href="../index.php?LogOut=''"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('sidebar mounted.')
        },
        data()
        {
            return {
                profile_pic : '',
            }
        }
        ,
        created()
        {
            
        }
    }
   
</script>
