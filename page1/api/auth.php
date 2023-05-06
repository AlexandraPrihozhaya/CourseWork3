<?php

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    $password = md5($password."rgfvjhks65495");

    $link = new mysqli("localhost", "root", "root123", "schoolservicedb");

    $result1 = $link->query("SELECT * FROM `users` WHERE `Login` = '$login' AND `Pass` = '$password'");
    $result2 = $link->query("SELECT * FROM `teachers` WHERE `Login` = '$login'");
    $result3 = $link->query("SELECT * FROM `students` WHERE `Login` = '$login'");

    //авторизация
    $user = mysqli_fetch_assoc($result1);
    if(empty($user)) {
        echo '<script>
        window.location = "/";
        alert("Такой пользователь не найден");
        </script>';
    } else {
        if($user['IDUser']==1) {
            // echo '<script>
            // window.location = "/index1.html";
            // alert("Вы вошли в роли учителя");
            // </script>';
            header("Location: /index5.php?get=$login");
        }
        $teacher = mysqli_fetch_assoc($result2);
        if(!empty($teacher)) {
            // echo '<script>
            // window.location = "/index1.html";
            // alert("Вы вошли в роли учителя");
            // </script>';
            header("Location: /index1.php?get=$login");
        }
        $student = mysqli_fetch_assoc($result3);
        if(!empty($student)) {
            // echo '<script>
            // window.location = "/";
            // alert("Вы вошли в роли учащегося");
            // </script>';
            header("Location: /index4.php?get=$login");
        }
    } 


    setcookie("login", $user['Login'], time()+3600);
    mysqli_close($link);

    // setcookie('user', $user['LastName'], time() + 3600);

    // if($_COOKIE['user'] != 0) {
    //   echo '<script>
    //   window.location = "/index.html";
    //   var el = document.getElementById("acc");
    //   var a_href = document.createElement("a");
    //   a_href.id = "accnew";
    //   a_href.innerHTML = "<a class="acc" id="accnew" href="/index1.html"><img src="page1/resources/user.png" width="40px"></a>";
    //   $("el").replaceWith("a_href");
    //   el.parentNode.replaceChild(a_href, el);
    //   </script>';
    // }
?>