function validateCharacter(value) {
  value = value.toLowerCase();
  if(value.indexOf('#') != -1){ return false; }
  else if(value.indexOf('!') != -1){ return false; }
  else if(value.indexOf('$') != -1){ return false; }
  else if(value.indexOf('%') != -1){ return false; }
  else if(value.indexOf('/') != -1){ return false; }
  else if(value.indexOf('(') != -1){ return false; }
  else if(value.indexOf(')') != -1){ return false; }
  else if(value.indexOf('=') != -1){ return false; }
  else if(value.indexOf('?') != -1){ return false; }
  else if(value.indexOf('¡') != -1){ return false; }
  else if(value.indexOf('¿') != -1){ return false; }
  else if(value.indexOf("'") != -1){ return false; }
  else if(value.indexOf('´') != -1){ return false; }
  else if(value.indexOf('*') != -1){ return false; }
  else if(value.indexOf('[') != -1){ return false; }
  else if(value.indexOf(']') != -1){ return false; }
  else if(value.indexOf('{') != -1){ return false; }
  else if(value.indexOf('}') != -1){ return false; }
  else if(value.indexOf('+') != -1){ return false; }
  else if(value.indexOf('"') != -1){ return false; }
  else if(value.indexOf('_') != -1){ return false; }
  else if(value.indexOf('|') != -1){ return false; }
  else if(value.indexOf('°') != -1){ return false; }
  else if(value.indexOf('&') != -1){ return false; }
  else if(value.indexOf('0') != -1){ return false; }
  else if(value.indexOf('1') != -1){ return false; }
  else if(value.indexOf('2') != -1){ return false; }
  else if(value.indexOf('3') != -1){ return false; }
  else if(value.indexOf('4') != -1){ return false; }
  else if(value.indexOf('5') != -1){ return false; }
  else if(value.indexOf('6') != -1){ return false; }
  else if(value.indexOf('7') != -1){ return false; }
  else if(value.indexOf('8') != -1){ return false; }
  else if(value.indexOf('9') != -1){ return false; }
  else{ return true; }
}


function validemail(value){
  if(value.indexOf('@', 0) == -1 || value.indexOf('.', 0) == -1) {
    return false;
  }else{
    return true;
  }
}



function haserror(id){
  var informacion = $('#'+id).val(); 

  if(informacion == ''){ 
    $('#'+id).addClass('has_error');
  }else{
    $('#'+id).removeClass('has_error');
  }

}

function selected_error(id,type){

  if($('#'+id).hasClass("has_error")){

    if(type != 1){
      $('#'+id).removeClass('has_error');  
    }
    
  }else{

    if(type != 2){
      $('#'+id).addClass('has_error');
    }
    
  }
}