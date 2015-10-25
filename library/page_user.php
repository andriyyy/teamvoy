<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/dataprocessing.php');

class page_user extends dataprocessing
{
     //авторизація користовача
    public function Index()
    {
        //логін - переірка на спецсимволи CheckUserData
        @ $username = $this->CheckUserData($_POST['user_login']);
        //пароль - переірка на спецсимволи CheckUserData
        @ $passwd = $this->CheckUserData($_POST['user_passwd']);

        if ($username && $passwd)
        {
            try
            {
                //перевіряєм логін і пароль
                if($row = $this->CheckLoginAndPasswd($username, $passwd)){
                    //створюєм зміннну в сессії
                    $_SESSION['username'] = $row['login'];
                    $_SESSION['id'] = $row['id'];

                    header('Location: ../index.php');
                }
            }
            //якщо авторизація пройшла невдало, виводим помилку
            catch (Exception $e)
            {
                //виводим текст помилки $e->getMessage()
                echo "<center><br><a href='../index.php'>" . $e->getMessage() . "</a></center>";
                exit;
            }
        }
        else echo "<center><br><a href='../index.php'>Логін або пароль введені невірно.</a></center>";
    }
    //реєстрація користовача
    public function registryUser()
    {
        //логін - переірка на спецсимволи CheckUserData
        @ $username = $this->CheckUserData($_POST['user_login']);
        //email - переірка на спецсимволи CheckUserData
        @ $email = $this->CheckUserData($_POST['user_email']);
        //пароль - переірка на спецсимволи CheckUserData
        @ $passwd = $this->CheckUserData($_POST['user_passwd']);

        if ($username && $email && $passwd)
        {
            $passwd = md5($passwd);

                if($this->FindLogin($username) > 0 || $this->FindEmail($email) > 0){
                    echo "<center><br><a href='../registry.php'>Вказаний логін або email вже є в базі.</a></center>";
                    exit;
                }
                // створюєм лінк для активації користувача через почту
                $from = 'admin@admin.com';
                $hash = rand(100000, 999999);
                $subject = "Підтвердження реєстрації";
                $site = "http://" . $_SERVER['SERVER_NAME'];
                $message = "Ви подали заявку на реєстрацію. " .
                    "Підтвердіть свою заявку клікнувши по лінку: " .
                    $site . "/activate.php?hash=" . $hash;
                // відправляєм лист
                if (!mail($email, $subject, $message, 'From: ' . $from))
                    // якщо лист не відправлений це значить що користувач невірно вказав свою пошту
                    echo "<center><br><a href='../registry.php' >Ви невірно вказали форму.</a></center>";
                else
                {
                    // якщо лист відправлений
                    $db = $this->ConnectDB();
                    $query = "INSERT INTO user (login, password, email, hash, status) VALUES ('{$username}','{$passwd}', '{$email}','{$hash}', 0 )";
                    mysql_query($query);
                    $id = mysql_insert_id();
                    echo "<center><br><a href='../index.php'>Для завершення реєстрації перейдіть по лінку в Вашій поштовій скринці.</a></center>";
                    exit;
                }
        }
        else echo "<center><br><a href='../registry.php'>Логін, пароль, email введені невірно.</a></center>";
    }
    //перевірка логіна і пароля
    private function CheckLoginAndPasswd($username, $passwd)
    {
        $passwd = md5($passwd);
        $db = $this->ConnectDB();
        $result = mysql_query("SELECT * FROM user WHERE login ='$username' and password = '$passwd'", $db);
        $row = mysql_fetch_assoc($result);
        if (!$result) throw new Exception('Не вдалося виконати запит до бази данних.');

        //якщо логін і пароль знайдені
        if (mysql_num_rows($result) > 0){
            //якщо користувач неактивований по email
            if ($row['status'] != 1)
                throw new Exception('Ви не підтвердили активацію по email.');
            return $row;
        }
        else
            throw new Exception('Ви невірно ввели дані для входу.');
    }
}
$start = new page_user();
if($_POST['enter']){
    $start->Index();
}
if($_POST['registry']){
    $start->registryUser();
}
?>