const form = document.querySelector('#pp');
const popup = document.querySelector('.popup');
const popup__container = document.querySelector('.popup__container');
const form2 = document.querySelector('#pp2');
const popup2 = document.querySelector('.popup2');
const popup__container2 = document.querySelector('.popup__container2');
const form3 = document.querySelector('#pp3');
const popup3 = document.querySelector('.popup3');
const popup__container3 = document.querySelector('.popup__container3');
const form4 = document.querySelector('#pp4');
const popup4 = document.querySelector('.popup4');
const popup__container4 = document.querySelector('.popup__container4');
const form5 = document.querySelector('#pp5');
const popup5 = document.querySelector('.popup5');
const popup__container5 = document.querySelector('.popup__container5');
const form6 = document.querySelector('#pp6');
const popup6 = document.querySelector('.popup6');
const popup__container6 = document.querySelector('.popup__container6');


function addSubject() {
  form2.classList.add('open');
  popup2.classList.add('popup_open');
};

function addTeacher() {
  form.classList.add('open');
  popup.classList.add('popup_open');
};

function openDelete() {
  form3.classList.add('open');
  popup3.classList.add('popup_open');
};

function openChange() {
  form5.classList.add('open');
  popup5.classList.add('popup_open');
};

function openDelete2() {
  form4.classList.add('open');
  popup4.classList.add('popup_open');
};

function openChange2() {
  form6.classList.add('open');
  popup6.classList.add('popup_open');
};

var $popup__container = $(".popup__container"),
    $popup = $(".popup"),
    $popup__container2 = $(".popup__container2"),
    $popup2 = $(".popup2"),
    $popup__container3 = $(".popup__container3"),
    $popup3 = $(".popup3"),
    $popup__container4 = $(".popup__container4"),
    $popup4 = $(".popup4"),
    $popup__container5 = $(".popup__container5"),
    $popup5 = $(".popup5"),
    $popup__container6 = $(".popup__container6"),
    $popup6 = $(".popup6");

// закрываем попап при клике на любую область экрана
$popup.on("mousedown", function () {
    $popup.remove();
});

// клик по самому попапу не должен его закрывать
$popup__container.on("mousedown", function (e) {
    e.stopPropagation();
});

// закрываем попап при клике на любую область экрана
$popup2.on("mousedown", function () {
    $popup2.remove();
});

// клик по самому попапу не должен его закрывать
$popup__container2.on("mousedown", function (e) {
    e.stopPropagation();
});

function exit() {
  $popup3.remove();
};

function exit2() {
  $popup4.remove();
};

function exit3() {
  $popup5.remove();
};

function exit4() {
  $popup6.remove();
};

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


function showSubjects() {

  
    var strURL="page6/api/showsubjects.php";
    var req = getXMLHTTP();

    if (req) {
      req.onreadystatechange = function() {
        if (req.readyState == 4) {
        // Только в случае нажатия «ОК»
          if (req.status == 200) {
            document.getElementById('subjectsdiv').innerHTML=req.responseText;
          } else {
            alert("Problem while using XMLHTTP:n" + req.statusText);
          }
        }
      }
      req.open("GET", strURL, true);
      req.send(null);
    }
}

function showTeachers() {

  
    var strURL="page6/api/showteachers.php";
    var req = getXMLHTTP();

    if (req) {
      req.onreadystatechange = function() {
        if (req.readyState == 4) {
        // Только в случае нажатия «ОК»
          if (req.status == 200) {
            document.getElementById('teachersdiv').innerHTML=req.responseText;
          } else {
            alert("Problem while using XMLHTTP:n" + req.statusText);
          }
        }
      }
      req.open("GET", strURL, true);
      req.send(null);
    }
}

// function showTeachers() { 
// document.getElementById('teachersdiv').hidden = false;
// }

function hiddenTable1() {
  document.getElementById('subjectsdiv').style.display = "none";
}

function hiddenTable2() {
  document.getElementById("teachersdiv").style.display = "none";
}

function showTable1() {
  document.getElementById("subjectsdiv").style.display = "block";
}

function showTable2() {
  document.getElementById("teachersdiv").style.display = "block";
}

// $('#table2').on('click','tr',function(event){
//     alert("clicked");
//     $(event.currentTarget).toggleClass('redRow');
// });

