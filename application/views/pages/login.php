<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Gerenciamento do Site - Imossil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?=base_url('static/images/icons/favicon.ico')?>"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/vendor/bootstrap/css/bootstrap.min.css')?>">
	<!--===============================================================================================-->
	<link href="<?=base_url('static/font-awesome-4.7.0/css/font-awesome.min.css')?>" rel="stylesheet">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/vendor/animate/animate.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/vendor/css-hamburgers/hamburgers.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/vendor/animsition/css/animsition.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/vendor/select2/select2.min.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/vendor/daterangepicker/daterangepicker.css')?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/css/util_f.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/css/main_f.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('static/css/bootstrap.min.css')?>">
	<!--===============================================================================================-->
</head>


<body>
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
			<form class="login100-form validate-form flex-sb flex-w" action="<?=base_url('autenticate')?>" method="post">
					<span class="login100-form-title p-b-32">
						<img src="<?=base_url('static/images/imossil_logo.png')?>" style="height: 145px" alt="">
					</span>

				      <?php $msg = $this->session->userdata('error_msg');if($msg){?>
						  <div class="alert alert-danger" style="display: block; width: 100%; text-align: center">
                                <?php echo $msg; ?>
                            </div>
						  <?php
					  }?>
				<span class="txt1 p-b-11">
						Usuário
					</span>
				<div class="wrap-input100 validate-input m-b-36" data-validate = "Obrigatório">
					<input class="input100" type="text" name="user">
					<span class="focus-input100"></span>
				</div>

				<span class="txt1 p-b-11">
						Senha
					</span>
				<div class="wrap-input100 validate-input m-b-12" data-validate = "Obrigatório">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
					<input class="input100" type="password" name="pass" >
					<span class="focus-input100"></span>
				</div>

				<div class="row" style="width: 100%">
					<div class="col-lg-12 col-sx-12">
						<div class="container-login100-form-btn" style="margin-top: 35px;">
							<button class="login100-form-btn" type="submit" style="display: inline-block; margin: 0 auto;">
								Entrar
							</button>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
<script src="<?=base_url('static/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url('static/vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url('static/vendor/bootstrap/js/popper.js')?>"></script>
<script src="<?=base_url('static/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url('static/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url('static/vendor/daterangepicker/moment.min.js')?>"></script>
<script src="<?=base_url('static/vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url('static/vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url('static/js/main_f.js')?>"></script>

</body>
</html>
