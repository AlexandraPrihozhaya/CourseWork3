<?php 

    $role = $_POST['radio'];
    $first__name = filter_var(trim($_POST['first__name']), FILTER_SANITIZE_STRING);
    $second__name = filter_var(trim($_POST['second__name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    // $password = password_hash($password, PASSWORD_DEFAULT);

    $dbh = new PDO('mysql:host=localhost;dbname=schoolservicedb', 'root', 'root123');

    $password = md5($password."rgfvjhks65495");
    $user = $dbh->query("SELECT * FROM `users` WHERE `Login` = '$login' OR `Pass` = '$password'")->fetch(PDO::FETCH_ASSOC);
    $teacher = $dbh->query("SELECT * FROM `teachers` WHERE `Login` = '$login'")->fetch(PDO::FETCH_ASSOC);
    $student = $dbh->query("SELECT * FROM `students` WHERE `Login` = '$login'")->fetch(PDO::FETCH_ASSOC);
    $result = $dbh->query("SELECT * FROM `users`")->fetch(PDO::FETCH_ASSOC);


    if(empty($result)){
        $q = "INSERT INTO users(IDUser, UserRole, FirstName, LastName, Email, Login, Pass) VALUES (1, 'Директор', :first__name, :second__name, :email, :login, :password)";
                $sth = $dbh->prepare($q);
                $sth->bindParam(':first__name', $first__name, PDO::PARAM_STR);
                $sth->bindParam(':second__name', $second__name, PDO::PARAM_STR);
                $sth->bindParam(':email', $email, PDO::PARAM_STR);
                $sth->bindParam(':login', $login, PDO::PARAM_STR);
                $sth->bindParam(':password', $password, PDO::PARAM_STR);

                $sth->execute();
                echo "1";
    } else {
        //регистрация
        if(!empty($user)) {
            echo '<script>
            window.location = "/";
            alert("Данный логин или пароль уже используется. Введите другие данные");
            </script>';
        } else {
            if(empty($teacher) && empty($student)) {
                echo '<script>
                window.location = "/";
                alert("Ошибка регистрации! Вы не являетесь ни учителем, ни учащимся школы");
                </script>';
            exit();
            } else {
                if(($role=="Преподаватель" && !empty($teacher)) OR ($role=="Учащийся" && !empty($student))) {
                    $q = "INSERT INTO users(UserRole, FirstName, LastName, Email, Login, Pass) VALUES (:role, :first__name, :second__name, :email, :login, :password)";
                    $sth = $dbh->prepare($q);
                    $sth->bindParam(':role', $role, PDO::PARAM_STR);
                    $sth->bindParam(':first__name', $first__name, PDO::PARAM_STR);
                    $sth->bindParam(':second__name', $second__name, PDO::PARAM_STR);
                    $sth->bindParam(':email', $email, PDO::PARAM_STR);
                    $sth->bindParam(':login', $login, PDO::PARAM_STR);
                    $sth->bindParam(':password', $password, PDO::PARAM_STR);

                    $sth->execute();
                    echo "1";
                    //mysqli_close($dbh);

                    // echo '<script>
                    // window.location = "/index2.html";
                    // alert("Вы успешно зарегистрировались в системе");
                    // </script>';
                } else {
                    echo '<script>
                    window.location = "/";
                    alert("Выберите правильную роль");
                    </script>';
                }
            }
        }
    }
?>