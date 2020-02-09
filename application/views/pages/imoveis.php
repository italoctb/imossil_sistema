<!-- page content -->
<div class="right_col" role="main" style="background-color: #FAFAFA; ">
  <div class="appbody" style="padding-bottom: 100px; min-height: 600px">
	  <div class="row">
		  <?php $i = 1; foreach ($imoveis as $imovel){
		  	echo'
			<div class="col-lg-4 col-md-4">
				<div class="card-imoveis">
				  <div class="imoveis-slider">
					  <div class="slider_area">
						  <div class="slider_active owl-carousel">';
					foreach ($fotos as $foto){
						if($foto->id_imovel == $imovel->id_imovel){
							echo '
								  <div class="single_slider align-items-center justify-content-center slider_bg_1" style="background: url('.base_url('static/uploads/'.$imovel->id_imovel.'/'.$foto->nome_foto).'); background-size: contain; background-repeat: no-repeat; background-color: #00793640">
									  <div class="container">
										  <div class="row">
											  <div class="col-xl-12">
												  <div class="slider_text text-center">
	
												  </div>
											  </div>
										  </div>
									  </div>
								  </div>';}}
							echo '
								  </div>
							  </div>
						  </div>';
			  echo'
				  <div class="menu-imoveis">
					  <ul>
						  <li><form action="'.base_url('processamento_status/'.$imovel->id_imovel).'" method="post">
								  <input type="hidden" name="status-imovel" value="'.$imovel->status.'">
								  Status<br><button class="status-button '.$imovel->status.'"></button>
							  </form></li>

						  <li style="bottom: 20px"><a href="'.base_url('add_images/'.($imovel->id_imovel+1000)).'">Add Fotos<br><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
						  <li style="bottom: 20px"><a href="'.base_url('edit_post/'.($imovel->id_imovel+1000)).'">Editar Post <br><i class="fa fa-wrench" aria-hidden="true"></i></a></li>
						  <li style="bottom: 20px"><a href="'.base_url('del_post/'.($imovel->id_imovel+1000)).'">Apagar Post<br> <i class="fa fa-trash" aria-hidden="true"></i></a></li>
					  </ul>
					  <div class="row">
						  <div class="col-lg-12 col-md-12" style="text-align: center; font-size: 20px">
							  <i class="fa fa-sort-desc" style="cursor: pointer" onclick="show_this_carac('.$i.')" id="arrow-down-'.$i.'" aria-hidden="true"></i>
							  <i class="fa fa-sort-up" style="display: none; cursor: pointer " onclick="hide_this_carac('.$i.')" id="arrow-up-'.$i.'" aria-hidden="true"></i>
						  </div>
					  </div>
					  <div class="info-imoveis" id="imoveis-'.$i.'" style="display: none">
						  <ul>
							  <h5 style="text-align: center; color: white; font-weight: 600">Características</h5>
							  <li>Nome: '.$imovel->nome_imovel.'.</li>
							  <br>
							  <li>Descrição: '.$imovel->descricao_imovel.'.</li>
							  <br>
							  <li>Endereço: '.$imovel->endereco.'.</li>
							  <br>
							  <li>Bairro: '.$imovel->bairro.'.</li>
							  <br>
							  <li>Valor: R$'.$imovel->valor_imovel.'.</li>
							  <br>
							  <li>Tipo do imóvel: '.$imovel->tipo_imovel.'.</li>
							  <li>Quantidade de suítes: '.$imovel->qtd_suites.'.</li>
							  <br>
							  <li>Quantidade de quartos: '.$imovel->qtd_quartos.'.</li>
							  <br>
							  <li>Quantidade de banheiros: '.$imovel->qtd_banheiros.'.</li>
							  <br>
							  <li>Garagem p/ carro: '.$imovel->garagem_carro.'.</li>
							  <br>
							  <li>Garagem p/ moto: '.$imovel->garagem_moto.'.</li>
							  <br>
							  <li>Cozinha: '.$imovel->has_cozinha.'.</li>
							  <br>
							  <li>Dispensa: '.$imovel->has_dispensa.'.</li>
							  <br>
							  <li>Lavanderia: '.$imovel->has_lavanderia.'.</li>
							  <br>
							  <li>Piscina: '.$imovel->has_piscina.'.</li>
							  <br>
							  <li>Área de Lazer: '.$imovel->has_lazer.'.</li>
							  <br>
							  <li>IPTU: '.$imovel->has_iptu.'.</li>
							  <br>
							  <li>Condomínio: '.$imovel->has_condominio.'.</li>
							  <br>
						  </ul>
					  </div>
				  </div>

			  </div>
		  </div>';
		  $i++;}?>

	  </div>
  </div>
</div>
<!-- /page content -->
