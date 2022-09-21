function loadareas(){
	var selectareas = "<option value=''>Seleccione una Opcion</option>";
	var url = "queries/empleados/load_areas.php";
      $.post(url, {},
      function(responseText) {        
        var abc = jQuery.parseJSON(responseText);

        for (var i = 0; i < abc.length; i++) { 

        	selectareas += "<option value='"+abc[i].id+"'>"+abc[i].nombre+"</option>";
        }

        $('#ModalCrearEmpleado_area,#ModalEditarEmpleado_area').html(selectareas);
     });
}

function loadroles(){
	var checksroles = "";
	var checksrolesedit = "";
	var url = "queries/empleados/load_roles.php";
      $.post(url, {},
      function(responseText) {
        var abc = jQuery.parseJSON(responseText);

        for (var i = 0; i < abc.length; i++) { 

        	checksroles += '<div class="form-check">'+
                  '<input class="form-check-input" type="checkbox" value="'+abc[i].id+'" id="ModalCrearEmpleado_roles_'+abc[i].id+'">'+
                  '<label class="form-check-label" for="flexCheckDefault">'+abc[i].nombre+'</label>'+
                '</div>';

                checksrolesedit += '<div class="form-check">'+
                  '<input class="form-check-input" type="checkbox" value="'+abc[i].id+'" id="ModalEditarEmpleado_roles_'+abc[i].id+'">'+
                  '<label class="form-check-label" for="flexCheckDefault">'+abc[i].nombre+'</label>'+
                '</div>';
        }

        $('#ModalCrearEmpleado_roles').html(checksroles);
        $('#ModalEditarEmpleado_roles').html(checksrolesedit);
     });
}


function ladempleados(){
	var listadoempleados ="";

	var url = "queries/empleados/load_empleados.php";
      $.post(url, {},
      function(responseText) {
        var abc = jQuery.parseJSON(responseText);
        $('#Lista_empleados').html("");
        for (var i = 0; i < abc.length; i++) { 
        	listadoempleados += '<tr>'+
        											'<td>'+abc[i].nombre+'</td>'+
        											'<td>'+abc[i].email+'</td>'+
        											'<td>'+abc[i].sexo+'</td>'+
        											'<td>'+abc[i].area_id+'</td>'+
        											'<td>'+abc[i].boletin+'</td>'+
        											'<td class="text-center"><i class="fa fa-pencil-square-o" onclick="actionsempleados(1,'+abc[i].id+')" style="font-size:25px"></i></td>'+
        											'<td class="text-center"><i class="fa fa-trash" onclick="actionsempleados(2,'+abc[i].id+')" style="font-size:25px"></i></td>'+
        										'</tr>';
        	 
        }

        $('#Lista_empleados').html(listadoempleados);
     });

}

function actionsempleados(type,idempleado){

	var url = "queries/empleados/search_empleado.php";
      $.post(url, {idempleado:idempleado},
      function(responseText) {
      	console.log(responseText);
        var abc = jQuery.parseJSON(responseText);

        if(type == 1){
        	$('#ModalEditarEmpleado_idempleado').val(abc.id);
					$('#ModalEditarEmpleado_nombrecompleto').val(abc.nombre);
					$('#ModalEditarEmpleado_correoelectronico').val(abc.email);
					$('#ModalEditarEmpleado_area').val(abc.area_id);
					$('#ModalEditarEmpleado_descripcion').val(abc.descripcion);

					if(abc.sexo == 'F'){
						$('#ModalEditarEmpleado_sexo_f').prop('checked',true);
						$('#ModalEditarEmpleado_sexo_m').prop('checked',false);
					}else{
						$('#ModalEditarEmpleado_sexo_m').prop('checked',true);
						$('#ModalEditarEmpleado_sexo_f').prop('checked',false);
					}

					if(abc.boletin == 1){
						$('#ModalEditarEmpleado_boletininformativo').prop('checked',true);
					}else{
						$('#ModalEditarEmpleado_boletininformativo').prop('checked',false);
					}


					 for (var i = 0; i < abc.roles.length; i++) {
					 	console.log(abc.roles[i]);
					 		$('#ModalEditarEmpleado_roles_'+abc.roles[i]).prop('checked',true);
					 }




        	$('#ModalEditarEmpleado').modal('show');
        }else if(type == 2){
        	var confirmacion = confirm("Esta seguro que desea eliminar el empleado "+abc.nombre+"?");

        	if(confirmacion){
	        		var url = "queries/empleados/delete_empleado.php";
				      $.post(url, {idempleado:idempleado},
				      function(responseText) {
				        var abc = jQuery.parseJSON(responseText);

				        if(abc.error == 1){
				        	alert("El empleado se elimino con exito");
				        	ladempleados();
				        }else{
				        	alert("Error al Eliminar el empleado");
				        }
				     });
        	}
        }
     });

}

$(document).ready(function(){
		loadareas();
		loadroles();
		ladempleados();
});



$('#ModalCrearEmpleado_btnguardar').click(function(){
let nombrecompleto = $('#ModalCrearEmpleado_nombrecompleto').val();
let correoelectronico = $('#ModalCrearEmpleado_correoelectronico').val();
let sexo = $('input[name=ModalCrearEmpleado_sexo]:checked').val();
let area = $('#ModalCrearEmpleado_area').val();
let descripcion = $('#ModalCrearEmpleado_descripcion').val();
var boletininformativo = 0; 
var arrayroles = [];
var extra = "";
 

if ($('#ModalCrearEmpleado_boletininformativo').is(":checked"))
{
  boletininformativo = 1;
}


$("#ModalCrearEmpleado_roles input:checkbox:checked").each(function() {
    arrayroles.push($(this).val());
});


if(nombrecompleto != "" && correoelectronico != "" && sexo != undefined && area != "" && descripcion != "" && arrayroles.length > 0){

	if(validateCharacter(nombrecompleto) && validemail(correoelectronico) ){
		
		$('#ModalCrearEmpleado_btnguardar').addClass('m-progress');
		var url = "queries/empleados/create_empleado.php";
      $.post(url, {nombrecompleto:nombrecompleto,
				correoelectronico:correoelectronico,
				sexo:sexo,
				area:area,
				descripcion:descripcion,
				boletininformativo:boletininformativo,
				arrayroles:arrayroles},
      function(responseText) {
      	console.log(responseText);
        var abc = jQuery.parseJSON(responseText); 

        if(abc.error == 1){
        	$('#ModalCrearEmpleado_showalert').addClass('alert-success');
			$('#ModalCrearEmpleado_showalert').slideDown('fast');
			$('#ModalCrearEmpleado_showalert').html('La Informacion se guardo con Exito');
			ladempleados();


				haserror("ModalCrearEmpleado_nombrecompleto",2);
				haserror("ModalCrearEmpleado_correoelectronico",2);
				haserror("ModalCrearEmpleado_area");
				haserror("ModalCrearEmpleado_descripcion");
				selected_error("ModalCrearEmpleado_sexo_contenedor",2);
				selected_error("ModalCrearEmpleado_roles",2);

				$('#ModalCrearEmpleado_nombrecompleto').val('');
				$('#ModalCrearEmpleado_correoelectronico').val('');
				$('#ModalCrearEmpleado_area').val('');
				$('#ModalCrearEmpleado_descripcion').val('');

				$('#ModalCrearEmpleado_boletininformativo').prop( "checked", false );
				$('input[name=ModalCrearEmpleado_sexo]').prop( "checked", false );

				$("#ModalCrearEmpleado_roles input:checkbox:checked").each(function() {
				    $(this).prop( "checked", false );
				});


        }else if(abc.error == 2){
        	$('#ModalCrearEmpleado_showalert').addClass('alert-warning');
			$('#ModalCrearEmpleado_showalert').slideDown('fast');
			$('#ModalCrearEmpleado_showalert').html('Algunos valores no tiene la Informacion correcta');
        }else{
        	$('#ModalCrearEmpleado_showalert').addClass('alert-error');
			$('#ModalCrearEmpleado_showalert').slideDown('fast');
			$('#ModalCrearEmpleado_showalert').html('Error al Guardar la Informacion');
        }

        $('#ModalCrearEmpleado_btnguardar').removeClass('m-progress');

        setTimeout(function(){
			$("#ModalCrearEmpleado_showalert").slideUp('fast').removeClass('alert-warning').removeClass('alert-error').removeClass('alert-success');
		},3000);
      });


	}else{
		if(!validateCharacter(nombrecompleto)){
			selected_error("ModalCrearEmpleado_nombrecompleto",1);
			extra += "<br/> <strong>Nombre completo</strong> solo puedo incluir texto y tildes";
		}


		if(!validemail(correoelectronico)){
			selected_error("ModalCrearEmpleado_correoelectronico",1);
			extra += " <br/> <strong>Correo Electronico</strong> debe ser valido";
		}


		$('#ModalCrearEmpleado_showalert').addClass('alert-warning');
		$('#ModalCrearEmpleado_showalert').slideDown('fast');
		$('#ModalCrearEmpleado_showalert').html('Algunos campos no estan correctos '+extra);


		setTimeout(function(){
			$("#ModalCrearEmpleado_showalert").slideUp('fast').removeClass('alert-warning');
		},3000);
	}
}else{
	$('#ModalCrearEmpleado_showalert').addClass('alert-danger');
	$('#ModalCrearEmpleado_showalert').slideDown('fast');
	$('#ModalCrearEmpleado_showalert').html('Algunos campos estan Vacios');

	haserror("ModalCrearEmpleado_nombrecompleto");
	haserror("ModalCrearEmpleado_correoelectronico");
	haserror("ModalCrearEmpleado_area");
	haserror("ModalCrearEmpleado_descripcion");

	if(sexo == undefined){
		selected_error("ModalCrearEmpleado_sexo_contenedor",1);
	} 

	if(!arrayroles.length > 0){
		selected_error("ModalCrearEmpleado_roles",1);	
	}


	setTimeout(function(){
		$("#ModalCrearEmpleado_showalert").slideUp('fast').removeClass('alert-danger');
},3000);

	


}
 
});




var myModalEl = document.getElementById('ModalEditarEmpleado')
myModalEl.addEventListener('hidden.bs.modal', function (event) {


haserror("ModalEditarEmpleado_nombrecompleto",2);
				haserror("ModalEditarEmpleado_correoelectronico",2);
				haserror("ModalEditarEmpleado_area");
				haserror("ModalEditarEmpleado_descripcion");
				selected_error("ModalEditarEmpleado_sexo_contenedor",2);
				selected_error("ModalEditarEmpleado_roles",2);

				$('#ModalEditarEmpleado_nombrecompleto').val('');
				$('#ModalEditarEmpleado_correoelectronico').val('');
				$('#ModalEditarEmpleado_area').val('');
				$('#ModalEditarEmpleado_descripcion').val('');

				$('#ModalEditarEmpleado_boletininformativo').prop( "checked", false );
				$('input[name=ModalEditarEmpleado_sexo]').prop( "checked", false );

				$("#ModalEditarEmpleado_roles input:checkbox:checked").each(function() {
				    $(this).prop( "checked", false );
				});
})




$('#ModalEditarEmpleado_btnguardar').click(function(){
	let idempleado = $('#ModalEditarEmpleado_idempleado').val();
let nombrecompleto = $('#ModalEditarEmpleado_nombrecompleto').val();
let correoelectronico = $('#ModalEditarEmpleado_correoelectronico').val();
let sexo = $('input[name=ModalEditarEmpleado_sexo]:checked').val();
let area = $('#ModalEditarEmpleado_area').val();
let descripcion = $('#ModalEditarEmpleado_descripcion').val();
var boletininformativo = 0; 
var arrayroles = [];
var extra = "";
 

if ($('#ModalEditarEmpleado_boletininformativo').is(":checked"))
{
  boletininformativo = 1;
}


$("#ModalEditarEmpleado_roles input:checkbox:checked").each(function() {
    arrayroles.push($(this).val());
});


if(nombrecompleto != "" && correoelectronico != "" && sexo != undefined && area != "" && descripcion != "" && arrayroles.length > 0){

	if(validateCharacter(nombrecompleto) && validemail(correoelectronico) ){
		
		$('#ModalEditarEmpleado_btnguardar').addClass('m-progress');
		var url = "queries/empleados/edit_empleado.php";
      $.post(url, {idempleado:idempleado,
      	nombrecompleto:nombrecompleto,
				correoelectronico:correoelectronico,
				sexo:sexo,
				area:area,
				descripcion:descripcion,
				boletininformativo:boletininformativo,
				arrayroles:arrayroles},
      function(responseText) {
      	console.log(responseText);
        var abc = jQuery.parseJSON(responseText); 

        if(abc.error == 1){
        	$('#ModalEditarEmpleado_showalert').addClass('alert-success');
			$('#ModalEditarEmpleado_showalert').slideDown('fast');
			$('#ModalEditarEmpleado_showalert').html('La Informacion se guardo con Exito');
			ladempleados();


				haserror("ModalEditarEmpleado_nombrecompleto",2);
				haserror("ModalEditarEmpleado_correoelectronico",2);
				haserror("ModalEditarEmpleado_area");
				haserror("ModalEditarEmpleado_descripcion");
				selected_error("ModalEditarEmpleado_sexo_contenedor",2);
				selected_error("ModalEditarEmpleado_roles",2); 


        }else if(abc.error == 2){
        	$('#ModalEditarEmpleado_showalert').addClass('alert-warning');
			$('#ModalEditarEmpleado_showalert').slideDown('fast');
			$('#ModalEditarEmpleado_showalert').html('Algunos valores no tiene la Informacion correcta');
        }else{
        	$('#ModalEditarEmpleado_showalert').addClass('alert-error');
			$('#ModalEditarEmpleado_showalert').slideDown('fast');
			$('#ModalEditarEmpleado_showalert').html('Error al Guardar la Informacion');
        }

        $('#ModalEditarEmpleado_btnguardar').removeClass('m-progress');

        setTimeout(function(){
			$("#ModalEditarEmpleado_showalert").slideUp('fast').removeClass('alert-warning').removeClass('alert-error').removeClass('alert-success');
		},3000);
      });


	}else{
		if(!validateCharacter(nombrecompleto)){
			selected_error("ModalEditarEmpleado_nombrecompleto",1);
			extra += "<br/> <strong>Nombre completo</strong> solo puedo incluir texto y tildes";
		}


		if(!validemail(correoelectronico)){
			selected_error("ModalEditarEmpleado_correoelectronico",1);
			extra += " <br/> <strong>Correo Electronico</strong> debe ser valido";
		}


		$('#ModalEditarEmpleado_showalert').addClass('alert-warning');
		$('#ModalEditarEmpleado_showalert').slideDown('fast');
		$('#ModalEditarEmpleado_showalert').html('Algunos campos no estan correctos '+extra);


		setTimeout(function(){
			$("#ModalEditarEmpleado_showalert").slideUp('fast').removeClass('alert-warning');
		},3000);
	}
}else{
	$('#ModalEditarEmpleado_showalert').addClass('alert-danger');
	$('#ModalEditarEmpleado_showalert').slideDown('fast');
	$('#ModalEditarEmpleado_showalert').html('Algunos campos estan Vacios');

	haserror("ModalEditarEmpleado_nombrecompleto");
	haserror("ModalEditarEmpleado_correoelectronico");
	haserror("ModalEditarEmpleado_area");
	haserror("ModalEditarEmpleado_descripcion");

	if(sexo == undefined){
		selected_error("ModalEditarEmpleado_sexo_contenedor",1);
	} 

	if(!arrayroles.length > 0){
		selected_error("ModalEditarEmpleado_roles",1);	
	}


	setTimeout(function(){
		$("#ModalEditarEmpleado_showalert").slideUp('fast').removeClass('alert-danger');
},3000);

	


}
 
});