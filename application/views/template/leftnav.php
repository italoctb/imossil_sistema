<body class="nav-sm" style="padding-bottom: 50px">
<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
					<a href="<?=base_url()?>" class="site_title"><i class="fa fa-television" aria-hidden="true"></i><span>Admin Post</span></a>
				</div>

				<div class="clearfix"></div>

				<!-- menu profile quick info -->
				<div class="profile clearfix">
					<div class="profile_pic">
						<img src="<?=base_url('static/sistema/'.$user_data->foto)?>" style="width: 65px; height: 70px" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Bem vindo,</span>
						<h2 style="font-weight: bold"><?php if(strstr($user_data->nome_user, ' ', true) == ''){
							echo $user_data->nome_user;} else {
								echo strstr($user_data->nome_user, ' ', true);
							}?>.</h2>
					</div>
				</div>
				<!-- /menu profile quick info -->

				<br />

				<!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="menu_section">
						<h3>Sistema</h3>
						<ul class="nav side-menu">
							<?php
								echo '
								<li><a><i class="fa fa-address-book-o" aria-hidden="true"></i>Gerenciamento<span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="'.base_url('imoveis').'">Posts Imoveis</a></li>';
										if ($user_data->permissao == 0){
											echo '<li><a href="'.base_url('add_post').'">Usuários</a></li>';
										}echo'
									</ul>
								</li>
							';?>
						</ul>
					</div>
				</div>
				<div class="sidebar-footer hidden-small">

					<a data-toggle="tooltip" data-placement="top" title="" style="background-color: #007936; cursor: initial;">
					</a>
					<a data-toggle="tooltip" data-placement="top" title="" style="background-color: #007936; cursor: initial;">
					</a>
					<a data-toggle="tooltip" data-placement="top" title="" style="background-color: #007936; cursor: initial;">
					</a>
					<a data-toggle="tooltip" data-placement="top" title="Sair" href="<?=base_url('login')?>">
						<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
					</a>
				</div>
				<!-- /menu footer buttons -->
			</div>
		</div>
