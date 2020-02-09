var pin =0;
var fb = 0;
var insta  = 0;
var youtube = 0;
var sum = 0;
function select(element) {
	if(element.id == "marked-mark"){
		element.setAttribute("style", "border-top: 0.5px solid black");
		document.getElementById("publicacoes-mark").setAttribute("style", "border-top: none; float: right; margin-right: 38px;");
	}else{
		console.log(element.id);
		element.setAttribute("style", "border-top: 0.5px solid black; float: right; margin-right: 38px;");
		document.getElementById("marked-mark").setAttribute("style", "border-top: none");
	}
}

function show_details(element) {
	if (pin==0){
		$(element).children("div.post-details").fadeIn(200);
	}
}

function hide_details(element) {
	if(pin == 0){
		$(element).children("div.post-details").fadeOut(200);
	}

}

function fix_details(element) {
	pin = !pin;
	$(element).toggleClass("fa-2x");
	$(element).parent().toggleClass("fix-this");
}

function change_color(color, i) {
	switch (color) {
		case "green":
			$("#status"+i).val("ok");
			break;
		case "yellow":
			$("#status"+i).val("nsee");
			break;
		case "red":
			$("#status"+i).val("nok");
			break;
	}

}

function select_rs(element, c) {
	$(element).children().toggleClass('bg-yellow');
	switch (c) {
		case "insta":
			if(insta == 0){
				insta = 1;
				sum = sum + 1;
				console.log(sum);
			}else{
				insta = 0;
				sum = sum - 1;
				console.log(sum);
			}
			break;
		case 'fb':
			if(fb == 0){
				fb = 1;
				sum = sum + 10;
				console.log(sum);
			}else{
				fb = 0;
				sum = sum - 10;
				console.log(sum);
			}
			break;
		case 'youtube':
			if(youtube == 0){
				youtube = 1;
				sum = sum + 100;
				console.log(sum);
			}else{
				youtube = 0;
				sum = sum - 100;
				console.log(sum);
			}
			break;
	}
	$("#rs").val(sum);
}

function pay_attention() {
	if($("#rs").val() == 0){
		$("#pay_attention").fadeIn('fast');
		event.preventDefault();
		return false;
	}

}

function breakline(doc) {
	var key = window.event.keyCode;

	// If the user has pressed enter
	if (key === 13) {
		console.log("Ola Mundo");
		$(doc).val($(doc).val() + "<br>");
		console.log($(doc).val())
		return false;
	}
	else {
		return true;
	}
}

function delete_post() {
	if (confirm("Você tem certeza que quer apagar o post ?")) {
		return 1;
	} else {
		event.preventDefault();
	}
}

function delete_bookpost() {
	if (confirm("Você tem certeza que quer apagar o Bookpost ?")) {
		return 1;
	} else {
		event.preventDefault();
	}
}

function show_this_carac(i) {
	$("#arrow-down-"+i).hide();
	$("#imoveis-"+i).slideDown("slow");
	$("#arrow-up-"+i).fadeIn("slow");
}

function hide_this_carac(i) {
	$("#arrow-up-"+i).hide();
	$("#imoveis-"+i).slideUp("slow");
	$("#arrow-down-"+i).fadeIn("slow");

}
var k;
var pilha_selec = [];
var aux_add_fotos = 0;
function show_add_fotos(j) {
	pilha_selec.unshift(j);
	$("#num_imgs").val($('#num_fotos_input').val());
	if( aux_add_fotos == 0){
		aux_add_fotos = 1;
		for(var i = 1; i<=j; i++){
			$("#submit_fotos").before(
				"<div class=\"form-group form_add_fotos\" id=\"form_group_"+i+"\" style='display: none'>" +
				"<label class=\"control-label col-md-3 col-sm-3 col-xs-12\" for=\"comentarios\">Arquivo do Post<span class=\"required\"></span>" +
				"</label>"+"<div class=\"col-md-6 col-sm-6 col-xs-12\">"+
				"<input type=\"file\" required name=\"userfile_"+i+"\" style=\"margin-top: 30px\" id=\"input_file_"+i+"\" onblur=\"nomeArquivo("+i+")\">"+
				"<input type=\"hidden\" name=\"nome_arquivo_"+i+"\" id=\"nome_arquivo_"+i+"\">" +
				"</div>" +
				"</div>"
			);
			$("#form_group_"+i).fadeIn("slow");
		}
	}else{
		for(var i = k; i>=1; i--){
			$("#form_group_"+i).hide();
			// $("#form_group_"+i).remove();
		}
		for(var i = 1; i<=j; i++){
			if($("#form_group_"+i).length > 0){
				$("#form_group_"+i).fadeIn("slow");
			}else{
				$("#submit_fotos").before(
					"<div class=\"form-group\" id=\"form_group_"+i+"\" style='display: none'>" +
					"<label class=\"control-label col-md-3 col-sm-3 col-xs-12\" for=\"comentarios\">Arquivo do Post<span class=\"required\"></span>" +
					"</label>"+"<div class=\"col-md-6 col-sm-6 col-xs-12\">"+
					"<input type=\"file\" required name=\"userfile_"+i+"\" style=\"margin-top: 30px\" id=\"input_file_"+i+"\" onblur=\"nomeArquivo("+i+")\">"+
					"<input type=\"hidden\" name=\"nome_arquivo_"+i+"\" id=\"nome_arquivo_"+i+"\">" +
					"</div>" +
					"</div>"
				);
				$("#form_group_"+i).fadeIn("slow");
			}


		}
	}
	k = j;
}

function verify(j) {
	for(var i = pilha_selec[1]; i>pilha_selec[0]; i--){
		$("#form_group_"+i).remove();
	}
	for(var i = j; i<=j; i++){
		if($("input_file_"+i).val()==""){
			event.preventDefault();
			console.log("Preencha todos os campos!");
			return false;
		}
	}
	return true;
}
