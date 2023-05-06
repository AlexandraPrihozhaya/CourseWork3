<?php 

    $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
    $firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
    $patronymic = filter_var(trim($_POST['patronymic']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $idsubject=(INT)$_POST['subject'];

    $dbh = new PDO('mysql:host=localhost;dbname=schoolservicedb', 'root', 'root123');

    $teacher = $dbh->query("SELECT * FROM `teachers` WHERE `Login` = '$login'")->fetch(PDO::FETCH_ASSOC);

    if(empty($teacher)){
        $q = "INSERT INTO teachers(LastName, FirstName, Patronymic, Login, IDSubject) VALUES (:lastname, :firstname, :patronymic, :login, :idsubject)";
                $sth = $dbh->prepare($q);
                $sth->bindParam(':lastname', $lastname, PDO::PARAM_STR);
                $sth->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $sth->bindParam(':patronymic', $patronymic, PDO::PARAM_STR);
                $sth->bindParam(':login', $login, PDO::PARAM_STR);
                $sth->bindParam(':idsubject', $idsubject, PDO::PARAM_INT);
                $sth->execute();
                $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index5.php';
                header("Location: $redirect");
                exit();
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index5.php';
        header("Location: $redirect");
        exit();
        echo '<script>
            alert("Преподаватель с таким логином уже добавлен в систему");
            </script>';
    }
?>