<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
<!--				<h3>Form Elements</h3>-->
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Adicionar um BookPost</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?=base_url('processamento_bookpost')?>">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario_insta">Nome de usuário das redes sociais (p.e Instagram)<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="usuario_insta" name="usuario_insta" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome_empresa">Nome da Empresa<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="nome_empresa" name="nome_empresa" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="apelido">Apelido do Instagram<span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="apelido" name="apelido" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="bio">Bio do Instagram<span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea style="height: 100px" type="text" onkeypress="breakline(this)" id="bio" name="bio" class="form-control col-md-7 col-xs-12 textarea"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="link">Link<span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="link" name="link" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="perfil">Foto de Perfil<span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="userfile" style="margin-top: 30px" id="input_file" onblur="nomeArquivo()">
									<input type="hidden" name="nome_arquivo" id="nome_arquivo">
								</div>
							</div>

							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit" class="btn btn-success" style="background-color: #f7a600f5; border: 1px solid #f7a600f5">Adicionar Bookpost</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

<!-- footer content -->
<!-- /footer content -->
</div>
</div>
