$(document).ready(function(){
	$("#mensajeConfirmacion").hide();
	$('#mensajeCancelacion').fadeOut();

	//evento click para el boton de guardar
	$('#btn_Guardar').click(function(){
	//obtener valores del formuario
	 var nombre=$('#txt_Nombre').val();
	 var apellidos=$('#txt_Apellidos').val();
	 var sexo=$('#Lista_Sexo').val();
	 var correo=$('#txt_Correo').val();
	 var ocupacion=$('#txt_Ocupacion').val();

	 //evento para ocultar los valores del formulario
	 /* $("#txt_Nombre").hide();
	 $("#txt_Apellidos").hide();
	 $("#txt_Correo").hide();
	 $("#txt_Ocupacion").hide(); */

	 //asignar valores a etiquetas en el mensaje de confirmacion
	 $("#lbl_Nombre").text(nombre);
	 $("#lbl_Apellidos").text(apellidos);
	 $("#lbl_Sexo").text(sexo);
	 $("#lbl_Correo").text(correo);
	 $("#lbl_Ocupacion").text(ocupacion);

	 $("#mensajeConfirmacion").show()

    });

    //evento click para el boton Cancelar
    $("#btn_Cancelar").click(function(){
    	$('#mensajeCancelacion').fadeIn();
    	$("#mensajeConfirmacion").hide();
    });

});