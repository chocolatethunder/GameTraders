// JavaScript Document

/////////////// JQUERY ///////////////////////////////

// faq animation
$(document).ready(function() {
  $('.bodytext').find('dd').addClass('answers').hide().end().find('dt').addClass('questions').click(function() {
    $(this).next().slideToggle();
  });
});

/////////////////////////////////////////////////////

// Function to clear out all the check boxes on load

function uncheckall() {

	if (document.getElementById("check_1").checked == true) {
		if (document.getElementById('pctiv').style.display=="none") {
				document.getElementById('pctiv').style.visibility = "visible";
				document.getElementById('pctiv').style.display = "block";
				
				document.getElementById("error").style.visibility = "hidden";
				document.getElementById("error").style.display = "none";
				
		}
	}
	
	if (document.getElementById("check_2").checked == true) {
		if (document.getElementById('xbox360tiv').style.display=="none") {
				document.getElementById('xbox360tiv').style.visibility = "visible";
				document.getElementById('xbox360tiv').style.display = "block";
				
				document.getElementById("error").style.visibility = "hidden";
				document.getElementById("error").style.display = "none";
				
		}
	}

	if (document.getElementById("check_3").checked == true) {
		if (document.getElementById('ps3tiv').style.display=="none") {
				document.getElementById('ps3tiv').style.visibility = "visible";
				document.getElementById('ps3tiv').style.display = "block";
				
				document.getElementById("error").style.visibility = "hidden";
				document.getElementById("error").style.display = "none";
				
		}
	}
	
	if (document.getElementById("check_4").checked == true) {
		if (document.getElementById('wiitiv').style.display=="none") {
				document.getElementById('wiitiv').style.visibility = "visible";
				document.getElementById('wiitiv').style.display = "block";
				
				document.getElementById("error").style.visibility = "hidden";
				document.getElementById("error").style.display = "none";
				
		}
	}
	
	if (document.getElementById("check_5").checked == true) {
		if (document.getElementById('xboxtiv').style.display=="none") {
				document.getElementById('xboxtiv').style.visibility = "visible";
				document.getElementById('xboxtiv').style.display = "block";
				
				document.getElementById("error").style.visibility = "hidden";
				document.getElementById("error").style.display = "none";
				
		}
	}
	
	if (document.getElementById("check_6").checked == true) {
		if (document.getElementById('ps2tiv').style.display=="none") {
				document.getElementById('ps2tiv').style.visibility = "visible";
				document.getElementById('ps2tiv').style.display = "block";
				
				document.getElementById("error").style.visibility = "hidden";
				document.getElementById("error").style.display = "none";
				
		}
	}
	
	if (document.getElementById("check_7").checked == true) {
		if (document.getElementById('gctiv').style.display=="none") {
				document.getElementById('gctiv').style.visibility = "visible";
				document.getElementById('gctiv').style.display = "block";
				
				document.getElementById("error").style.visibility = "hidden";
				document.getElementById("error").style.display = "none";
				
		}
	}
	
	if (document.getElementById("check_8").checked == true) {
		if (document.getElementById('dstiv').style.display=="none") {
				document.getElementById('dstiv').style.visibility = "visible";
				document.getElementById('dstiv').style.display = "block";
				
				document.getElementById("error").style.visibility = "hidden";
				document.getElementById("error").style.display = "none";
				
		}
	}
	
	if (document.getElementById("check_9").checked == true) {
		if (document.getElementById('psptiv').style.display=="none") {
				document.getElementById('psptiv').style.visibility = "visible";
				document.getElementById('psptiv').style.display = "block";
				
				document.getElementById("error").style.visibility = "hidden";
				document.getElementById("error").style.display = "none";
				
		}
	}

}

// Function to show and hide platform TIVs and show the error

function showMe(id) { // This gets executed when the user clicks on the checkbox
	var obj = document.getElementById(id);
	var err= document.getElementById("error");
		
if (obj.style.visibility=="visible") { // if it is checked, make it visible, if not, hide it
	obj.style.visibility = "hidden";
	obj.style.display = "none";
	} else {
	obj.style.visibility = "visible";
	obj.style.display = "block";
	}

		
		if (document.getElementById("check_1").checked == true ||
			document.getElementById("check_2").checked == true ||
			document.getElementById("check_3").checked == true ||
			document.getElementById("check_4").checked == true ||
			document.getElementById("check_5").checked == true ||
			document.getElementById("check_6").checked == true ||
			document.getElementById("check_7").checked == true ||
			document.getElementById("check_8").checked == true ||									
			document.getElementById("check_9").checked == true) {
			err.style.visibility = "hidden";
			err.style.display = "none";
		} else {
			err.style.visibility = "visible";
			err.style.display = "block";
		}

}


// Function to search wikipedia for ESRB and Platform info

function lookforboth(){
	var gamet = document.getElementById("gametitle").value;	
	if (!gamet) {
		document.getElementById("errorlnk").innerHTML = "&nbsp;<b>Error:</b> You must enter something in the \"Name of the game\" field <br><br>";
		var errdel = 1;
	} else {			
		var myExp = /\s/g;
		var pname = gamet.replace(myExp,"_");
		
		var myExp2 = /\s/g;
		var pname2 = gamet.replace(myExp2,"+");
		
		if (errdel == 1) {
			document.getElementById("errorlnk").innerHTML = " ";
		}
		
		window.open("http://en.wikipedia.org/wiki/"+pname);			
		
		window.open("http://www.youtube.com/results?search_query="+pname2+"+trailer&search_type=&aq=f");
	}
}

function lookforwiki(){
	var gamet = document.getElementById("gametitle").value;	
	if (!gamet) {
		document.getElementById("errorlnk").innerHTML = "&nbsp;<b>Error:</b> You must enter something in the \"Name of the game\" field <br><br>";
	} else {			
		var myExp = /\s/g;
		var pname = gamet.replace(myExp,"_");
		document.getElementById("errorlnk").innerHTML = " ";
		
		window.open("http://en.wikipedia.org/wiki/"+pname);
	}
}

// Function to search Youtube for a video link

function lookforvid(){
	var gamet = document.getElementById("gametitle").value;	
	if (!gamet) {
		document.getElementById("errorlnk").innerHTML = "&nbsp;<b>Error:</b> You must enter something in the \"Name of the game\" field<br><br>";
	} else {			
		var myExp = /\s/g;
		var pname = gamet.replace(myExp,"+");
		document.getElementById("errorlnk").innerHTML = " ";		
		
		window.open("http://www.youtube.com/results?search_query="+pname+"+trailer&search_type=&aq=f");
	}
}


//function showhide_charts(div) { // This gets executed when the user clicks on the showhide button
//	var para = document.getElementById(div);
//
//if (para.style.visibility=="visible") {
//	para.style.visibility = "hidden";
//	para.style.display = "none";
//	document.getElementById('showhide_charts').innerHTML = "SHOW";
//	} else {
//	para.style.visibility = "visible";
//	para.style.display = "block";
//	document.getElementById('showhide_charts').innerHTML = "&nbsp;&nbsp;HIDE";
//	}
//}
//
//function showhide_comments(div) { // This gets executed when the user clicks on the showhide button
//	var para = document.getElementById(div);
//
//if (para.style.visibility=="visible") {
//
//	document.getElementById('showhide_comments').innerHTML = "SHOW";
//	} else {
//	para.style.visibility = "visible";
//	para.style.display = "block";
//	document.getElementById('showhide_comments').innerHTML = "&nbsp;&nbsp;HIDE";
//	}
//}

var currLayerId = "charts";

function toggleLayer(id) {
	if(currLayerId) setDisplay(currLayerId, "none");
	if(id)setDisplay(id, "block");
	currLayerId = id;
}

function setDisplay(id,value){
	var divtype = document.getElementById(id);
	divtype.style.display = value;
} 
