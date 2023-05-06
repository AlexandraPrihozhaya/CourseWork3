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



var select = document.getElementById('class');

function getStudent(classId) {

	var getValue = select.value;
	if (getValue == "all") {
		document.getElementById('studentdiv').innerHTML= '<img class="no__res" src="page3/resources/free-icon-sad-face-4989865.png" width="90px"><p class="no__res__text">Ничего не найдено(</p>';
	} else {

		var strURL="page3/api/findStudent.php?class="+classId;
		var req = getXMLHTTP();

		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
				// Только в случае нажатия «ОК»
					if (req.status == 200) {
						$("#class__par").prop("selectedIndex", 0);
						document.getElementById('studentdiv').innerHTML=req.responseText;
					} else {
						alert("Problem while using XMLHTTP:n" + req.statusText);
					}
				}
			}
			req.open("GET", strURL, true);
			req.send(null);
		}
	}
}



var select1 = document.getElementById('class__par');

function getParStudent(classId) {

var getValue = select1.value;
	if (getValue == "all") {
		document.getElementById('studentdiv').innerHTML= '<img class="no__res" src="page3/resources/free-icon-sad-face-4989865.png" width="90px"><p class="no__res__text">Ничего не найдено(</p>';
	} else {

		var strURL="page3/api/findParStudent.php?class__par="+classId;
		var req = getXMLHTTP();

		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
				// Только в случае нажатия «ОК»
					if (req.status == 200) {
						$("#class").prop("selectedIndex", 0);
						document.getElementById('studentdiv').innerHTML=req.responseText;
					} else {
						alert("Problem while using XMLHTTP:n" + req.statusText);
					}
				}
			}
			req.open("GET", strURL, true);
			req.send(null);
		}
	}
}



function getAllStudent(classId) {

var strURL="page3/api/findAllStudent.php?class="+classId;
var req = getXMLHTTP();

	if (req) {
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
			// Только в случае нажатия «ОК»
				if (req.status == 200) {
					$("#class").prop("selectedIndex", 0);
					$("#class__par").prop("selectedIndex", 0);
					document.getElementById('studentdiv').innerHTML=req.responseText;
				} else {
					alert("Problem while using XMLHTTP:n" + req.statusText);
				}
			}
		}
		req.open("GET", strURL, true);
		req.send(null);
	}
}

