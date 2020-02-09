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
						<h2>Adicionar Imagens ao post #<?php echo $imovel + 1000;?></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="" data-parsley-validate class="form-horizontal form-label-left" onsubmit="pay_attention()" enctype="multipart/form-data" method="post" action="<?=base_url('processamento_imgs')?>">
							<div class="form-group" id="beg-process">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="comentarios">Digite o número de fotos que você deseja adicionar no post: <span class="required">*</span>
								</label>
								<div class="col-md-1 col-sm-1 col-xs-12">
									<input type="number" value="1" id="num_fotos_input" class="num_fotos_input">
								</div>
								<button type="button" class="button_fotos_input" onclick="show_add_fotos($('#num_fotos_input').val())">Ok</button>
								<input type="hidden" id="id_imovel" value="<?php echo $imovel?>" name="id_imovel">
								<input type="hidden" id="num_imgs" name="num_imgs">
							</div>
							<div class="form-group" id="submit_fotos">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit"  class="btn btn-success"  style="background-color: #007936; border: 1px solid #007936; margin-top: 20px" onclick="verify($('#num_fotos_input').val())">Adicionar</button>
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
