<?php 

    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);

    // $password = password_hash($password, PASSWORD_DEFAULT);

    $dbh = new PDO('mysql:host=localhost;dbname=schoolservicedb', 'root', 'root123');

    $sel = $dbh->query("SELECT * FROM `subjects` WHERE `Name` = '$name'")->fetch(PDO::FETCH_ASSOC);

    if(empty($sel)){
        $q = "INSERT INTO subjects(Name) VALUES (:name)";
            $sth = $dbh->prepare($q);
            $sth->bindParam(':name', $name, PDO::PARAM_STR);
            $sth->execute();
            $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index5.php';
            header("Location: $redirect");
            exit();
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'index5.php';
        header("Location: $redirect");
        exit();
        echo '<script>
            const button = document.querySelector(".addbtn");
            button.innerHTML("<p>Данный предмет уже существует. Введите другое название</p>");
            </script>';
    }
?>