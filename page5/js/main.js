// var strURL="page3/api/findStudent.php?teacher_firstname";

// document.getElementById('fio').innerHTML='<div>strURL</div>';


function getXMLHTTP() {
var xmlhttp=false;
try {
	xmlhttp=new XMLHttpRequest();
}
catch(e) {
	try {
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	}
	catch(e) {
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		}
    	catch(e1) {
			xmlhttp=false;
		}
	}
}
return xmlhttp;
}




function getTeacher(login) {

var strURL="page3/api/sel.php?login="+login;
var req = getXMLHTTP();

	if (req) {
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
			// Только в случае нажатия «ОК»
				if (req.status == 200) {
					document.getElementById('fio').innerHTML=req.responseText;
				} else {
					alert("Problem while using XMLHTTP:n" + req.statusText);
				}
			}
		}
		req.open("POST", strURL, true);
		req.send(null);
	}
}
