function odswiezCounter(){
	var lp = document.querySelectorAll(".collection tr").length; 
	 document.getElementsByClassName("counter")[0].innerHTML = lp;
}
function odswiez(){
	var usuns = document.getElementsByClassName("usun");
	var dogorys = document.getElementsByClassName("dogory");
	var wdols = document.getElementsByClassName("wdol");
	for(var i = 0; i < usuns.length; i++) {
       usuns[i].addEventListener("click", function(){
		  this.closest("tr").remove();
		  odswiezCounter();
	   });
	}
	for(var i = 0; i < dogorys.length; i++) {
       dogorys[i].addEventListener("click", function(){
			var tbody = this.closest("tbody");
			var tr = this.closest("tr");
			var prev = tr.previousElementSibling;
			if(prev){
				tbody.insertBefore(tr, prev);
			}
	   });
	}
	for(var i = 0; i < wdols.length; i++) {
       wdols[i].addEventListener("click", function(){
			var tbody = this.closest("tbody");
			var tr = this.closest("tr");
			var next = tr.nextElementSibling;
			if(next){
				tbody.insertBefore(next, tr);
			}
	   });
	}
}
odswiez();
odswiezCounter();
document.getElementsByClassName("dodaj")[0].addEventListener("click", function(){
	var tbody = document.getElementsByClassName("collection")[0];
	tbody.innerHTML += "<tr>"+
				"<td contenteditable=\"true\"></td>"+
				"<td contenteditable=\"true\"></td>"+
				"<td><button class=\"usun\">Usuń</button><button class=\"dogory\">W góre</button><button class=\"wdol\">W dół</button></td>"+
			"</tr>	";
	odswiez();
	odswiezCounter();
});