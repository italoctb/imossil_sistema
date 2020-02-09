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
						<h2>Adicionar um Post</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" onsubmit="pay_attention()"enctype="multipart/form-data" method="post" action="<?=base_url('processamento_edit_cliente')?>">
							<div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Data do post <span class="required"></span>
									</label>
									<div class='input-group date col-md-2 col-sm-6 col-xs-12' id='myDatepicker' style="padding-left: 10px">
										<input type='text'  id="test" name="date_post" class="form-control"/>
										<input type="hidden" id="teste2" value="<?php echo $post->data_publicacao;?>">
										<span class="input-group-addon">
										   <span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Link para o Cartão do Trello  <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="first-name" name="link" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $post->link_briefing;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="post">Para o Post <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea style="height: 100px" type="text" onkeypress="breakline(this)" id="last-name" name="post" required="required" class="form-control col-md-7 col-xs-12 textarea"><?php echo $post->post_details;?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="texto">Para o Texto <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea style="height: 100px" type="text" onkeypress="breakline(this)" id="last-name" name="texto" required="required" class="form-control col-md-7 col-xs-12 textarea"><?php echo $post->post_text;?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="comentarios">Comentários <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea style="height: 100px" type="text" onkeypress="breakline(this)" id="last-name" name="comentarios" required="required" class="form-control col-md-7 col-xs-12 textarea"><?php echo $post->post_coments;?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="comentarios">Arquivo do Post<span class="required"></span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="userfile" style="margin-top: 30px" id="input_file" onblur="nomeArquivo()" value="C:\fakepath\<?php echo $post->img_post;?>">
									<input type="hidden" name="nome_arquivo" id="nome_arquivo" value="C:\fakepath\<?php echo $post->img_post;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rs">Redes sociais do post <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12 form-rs foot-details">
									<ul>
										<li onclick="select_rs(this, 'insta');"><i class="fa fa-instagram" aria-hidden="true"></i></li>
										<li onclick="select_rs(this, 'fb');"><i class="fa fa-facebook" aria-hidden="true" style="padding: 10px 15px"></i></li>
										<li onclick="select_rs(this, 'youtube');"><i class="fa fa-youtube" aria-hidden="true"></i></li>
									</ul>
									<input type="hidden" id="rs" name="rs">
									<input type="hidden" name="id_emp" value="<?php echo $emp->id_emp?>">
									<input type="hidden" name="id_post" value="<?php echo $post->id_post_cliente?>">
									<input type="hidden" name="user_change" value="<?php echo $user_data->usuario?>">
								</div>

							</div>
							<div class="form-group">
								<span class=" col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="pay_attention" style="padding: 5px; background: #000000ad; color: #f7a90a; border: 1px solid silver; border-radius: 5px; text-align: center; display: none">Não esqueça de colocar as novas redes sociais aceitas para o post, mesmo que não permaneçam as mesmas!</span>							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit" class="btn btn-success"  style="background-color: #f7a600f5; border: 1px solid #f7a600f5">Postar</button>
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
