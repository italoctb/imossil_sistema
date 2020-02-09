<!-- page content -->
<div class="right_col" role="main" style="background-color: #FAFAFA; ">
  <div class="appbody">
		<div class="view-card">
			<div class="row">
				<div class="col-lg-3" style="padding-left: 30px; margin-right: 45px">
					<div class="format-img">
						<img src="<?=base_url('static/uploads/'.$emp_insta->user_insta.'/'.$emp_insta->foto_perfil)?>" alt="" style="border-radius: 100%">
					</div>
				</div>
				<div class="col-lg-7" style="padding-left: 0">
					<div class="nome-acc">
						<h1 style="" id="user_insta">
							<?php echo $emp_insta->user_insta;?>
						</h1>
						<button class="follow_button">Seguindo</button>
						<button class="follow_button" style="padding: 0 12px; font-weight: bolder">▾</button>
						<h1 style="font-weight: bolder; position: relative; left: 27px; bottom: 8px">...</h1>
					</div>
					<div class="dados-acc">
						<h3><span>194</span> publicações</h3>
						<h3><span>535</span> seguidores</h3>
						<h3><span>600</span> seguindo</h3>
					</div>
					<div class="intro-acc">
						<p><span><?php echo $emp_insta->apelido;?></span><br>
							<?php echo $emp_insta->bio;?> <br>
							<a href="<?php echo $emp_insta->user_insta;?>"><?php echo $emp_insta->site;?></a>
							<h5>Seguido por <span>loremipsum</span>, <span>ipsum12</span>, <span>dolor.h</span> e outras 10 pessoas</h5>
						</p>
					</div>
				</div>
			</div>
			<div class="row" style="border-top: 0.5px solid #dbdbdb; width: 100%">
				<div class="col-lg-3 col-lg-offset-3 elements-sep" >
					<div style="float: right; margin-right: 38px; border-top: 0.5px solid black" id="publicacoes-mark" onclick="">
						<i class="fa fa-table" aria-hidden="true" style="margin-right: 10px"></i> PUBLICAÇÕES
					</div>
				</div>
				<div class="col-lg-3 elements-sep" style="float: left" >
					<div onclick="" id="marked-mark" style="color: grey; cursor: not-allowed">
						<i class="fa fa-user-circle-o" aria-hidden="true" style="margin-right: 10px"></i> STORIES
					</div>
				</div>
			</div>
		</div>
	  <div class="gallery">
		  <div class="row">

			<?php $i = 0;foreach ($posts as $post){
				++$i;
				$class_bg = "";
				$class_border = "";
				switch ($post->status){
					case "nsee":
						$class_bg = "bg-yellow";
						$class_border = "post-notsee";
						break;
					case "ok":
						$class_bg = "bg-green";
						$class_border = "post-aproved";
						break;
					case "nok":
						$class_bg = "bg-red";
						$class_border = "post-naproved";
						break;
				}
				echo
				'<div class="post '.$class_border.'" onmouseenter="show_details(this)" onmouseleave="hide_details(this)" style="background: url(';if($post->img_post){echo base_url("static/uploads/".$post->user_insta."/".$post->img_post);}else{echo base_url("static/images/logo_convence.png");}echo ') center; background-size: cover">
				  <div class="post-details '.$class_bg.'">
					  <i class="fa fa-thumb-tack fa-lg fa-2x" aria-hidden="true" onclick="fix_details(this)"></i>
					  <div style="float: right">
					  	<form action="'.base_url($emp_insta->user_insta.'/change_status').'" method="post">
					  	  <input type="hidden" name="status" id="status'.$i.'">
					  	  <input type="hidden" name="id_post_s" id="id_post_s" value="'.$post->id_post.'">
					  	  <input type="hidden" name="user_change" value="'.$user_data->usuario.'">
					  	  ';if($user_data->permissao <= 1 && $user_data->id_emp == 0){
					  	  		echo '<button type="submit" onclick="change_color(\'green\', '.$i.')" class="block-green" style="height: 20px; width: 20px; background-color: #1bf61bde; border: 1px solid silver; float: right; display: inline-block; cursor: pointer; border-top-right-radius: 11px; margin-right: 0; margin-bottom: 0"></button>
						  		<button type="submit" onclick="change_color(\'yellow\', '.$i.')" class="block-red" style="height: 20px; width: 20px; background-color: #f7a600f5; border: 1px solid silver; float: right; display: inline-block; cursor: pointer; margin-right: 0; margin-bottom: 0"></button>
								<button type="submit" onclick="change_color(\'red\', '.$i.')" class="block-yellow" style="height: 20px; width: 20px; background-color: #f60a1be6; border: 1px solid silver; float: right; display: inline-block; cursor: pointer; margin-right: 0; margin-bottom: 0"></button>';
					  	  }else{
					  	  	echo '<button type="submit" onclick="change_color(\'red\', '.$i.')" class="block-yellow" style="height: 20px; width: 20px; background-color: #f60a1be6; border: 1px solid silver; float: right; display: inline-block; cursor: pointer; margin-right: 0; margin-bottom: 0; border-top-right-radius: 11px;"></button>';
						  }echo '
					  	</form>
					  </div>
					  
					  <div class="container-details">
					  <div style="min-height: 375px">
						  <h1 style="margin-right: 15px;" id="id_post">Post_id: #'.substr($post->id_post,2).'</h1><a href="'.$post->link_briefing.'"><i class="fa fa-link fa-lg" aria-hidden="true"></i></a>
						  <h1 style="margin-left: 40px; font-weight: bolder; font-size: 18px">'.$post->data_publicacao.'</h1>
						  <h2>Para o Post:</h2>
						  <p>'.$post->post_details.'</p>
						  <h2 style="margin-top: 20px">Para o Texto:</h2>
						  <p>'.$post->post_text.'</p>
						  <h2 style="margin-top: 20px">Comentários:</h2>
						  <p>'.$post->post_coments.'</p>
						  </div>
						  <div class="foot-details">
						  <div style="display: inline-block; min-width: 172px">
							  <ul>';

							foreach ($rs as $r){
								if($r->id_post == $post->id_post){
									if($r->nome != 'facebook'){
										echo '<li><a href="javascript:void();"><i class="fa fa-'.$r->nome.'" aria-hidden="true" style=" margin-right: 5px; padding: 9px"></i></a></li>';
									}else{
										echo'<li><a href="javascript:void();"><i class="fa fa-'.$r->nome.'" aria-hidden="true" style="padding: 8px 11px; margin-right: 5px"></i></a></li>';
									}
								}
							}echo'
							  </ul>
							  </div>
							  <a href="'.base_url($emp_insta->user_insta.'/'.substr($post->id_post,2).'/delete_post').'" onclick="delete_post()"><button class="follow_button">Apagar Post</button></a>
							  <a href="'.base_url($emp_insta->user_insta.'/'.substr($post->id_post,2).'/edit_post').'"><button class="follow_button">Editar Post</button></a>
						  </div>
					  </div>
				  </div>
			  </div>';
			}?>
		  </div>
	  </div>
  </div>
</div>
<!-- /page content -->
