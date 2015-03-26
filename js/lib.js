$(function(){
	$('#ponente').change(function(){
		$('#ponente').removeClass('alert-danger');
	});
	$('#instructor').change(function(){
		$('#instructor').removeClass('alert-danger');
	});
});

function valida_conferencia(){
	var flag = true;
	var cad = $('option:selected').val().trim();
	if(cad == '')
	{
		$('#ponente').addClass('alert-danger');
		//alert('Debe seleccionar un ponente');
		$('#dialog p').html("Debe selecciona un ponente");
		$('#dialog').dialog();
		flag=false;
	}
	if (flag){
		$('form').submit();
	}
};
function valida_taller(){
	var flag = true;
	var cad = $('option:selected').val().trim();
	if(cad == '')
	{
		$('#instructor').addClass('alert-danger');
		//alert('Debe seleccionar un instructor');
		$('#dialog p').html("Debe selecciona un instructor");
		$('#dialog').dialog();
		flag=false;
	}
	if (flag){
		$('form').submit();
	}
};