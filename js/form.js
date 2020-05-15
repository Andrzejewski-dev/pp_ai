function isEmpty(str){
	return str.length==0 || isWhiteSpace(str);
}
function isWhiteSpace(str){
	var ws = "\t\n\r ";
	for(var i = 0; i < str.length; i++){
		var c = str.charAt(i);
		if(ws.indexOf(c) == -1) {
			return false;
		}
	}
	return true;
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function toArray(obj) {
  var array = [];
  // iterate backwards ensuring that length is an UInt32
  for (var i = obj.length >>> 0; i--;) { 
    array[i] = obj[i];
  }
  return array;
}
function validate(input){
	var out = {
		status: true,
		errors: []
	};
	var tr = input.closest("tr");
	switch(input.name){
		case 'haslo':
			if(input.value.length<8)
				out.errors.push("Hasło musi zawierać 8 znaków!");
			if ( !(/\d/.test( input.value )) )
				out.errors.push("Hasło musi zawierać przynajmniej 1 cyfrę!");
			break;
		case 'haslo2':
			if(input.value!=document.querySelectorAll('[name="haslo"]')[0].value)
				out.errors.push("Hasła muszą być takie same!");
			
			break;
		case 'opis':
			if(input.value.length>20)
				out.errors.push("Opis musi zawierać poniżej 20 znaków!");
			break;
		case 'email':
			if(input.value.indexOf('@')<0)
				out.errors.push("Nieprawidłowy adres email!");
			break;
	}
	
	
	if(isEmpty(input.value)){
		out.errors.push(tr.children[0].innerText+" nie może być puste!");
	}
	
	out.status = out.errors.length==0;
	if(out.status){
		tr.classList.remove("danger");
	} else {
		tr.classList.add("danger");
	}

	return out;
}
function validateForm(form, event){
	var alertDiv = document.getElementsByClassName("alert")[0];
	var errors = [];

	toArray(form.elements).forEach(function(v,k){
		console.log([k,v])
		if(/\d/.test( k )){
			var outElement = validate(v);
			if(!outElement.status){
				errors = errors.concat(outElement.errors);
			}
		}
	});
	
	alertDiv.style.display = 'none';
	if(errors.length>0){
		event.preventDefault();
		alertDiv.style.display = 'block';
	}
	alertDiv.innerHTML = errors.join("<br/>");
}