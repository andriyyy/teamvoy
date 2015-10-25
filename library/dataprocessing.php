<?php

class dataprocessing
{
    public function __construct()
    {
        session_start();
    }

    //Підключення до бази данних
    public function ConnectDB()
    {
        $host = "localhost";
        $database = "test";
        $login_db = "root";
        $password_db = "";
        $db = mysql_connect ($host, $login_db, $password_db);
        mysql_select_db ($database, $db);

        if (!$db)
            throw new Exception('Не вдалось підключитись добази данних.');
        else

            return $db;

    }

    //проверка на шкідливі символи
    public function CheckUserData($var)
    {
        //забираєм шкідливі символи
        $res = htmlspecialchars($var, ENT_QUOTES);
        //екрануєм спецсимволи
        return addslashes($res);
    }


    //Пошук логіна в базі
    public function FindLogin($login)
    {
        $conn = $this->ConnectDB();
        $result =  mysql_query("SELECT login FROM user WHERE login = '$login'");
        $num_rows = mysql_num_rows($result);
        return $num_rows;
    }

    //Пошук email в базі
    public function FindEmail($email)
    {
        $this->ConnectDB();
        $result =  mysql_query("SELECT email FROM user WHERE email = '$email'");
        $num_rows = mysql_num_rows($result);
        return $num_rows;
    }

    //отримання записів з бази
    public function getArticles()
    {
        $db = $this->ConnectDB();
        $result = mysql_query("SELECT user.login, user.status, article.id, article.sharer_id, article.content FROM article LEFT JOIN user ON (article.user_id = user.id) WHERE article.user_id = {$_SESSION['id']}
        ORDER BY article.id DESC", $db);
        while($myrow = mysql_fetch_assoc($result)){
            $statement[] = $myrow;}
        $unicSharer = array();
        foreach($statement as $item){
            $unicSharer[] = $item['sharer_id'];

        }
        $forSelect = implode(",", array_unique($unicSharer));
        $result = mysql_query("SELECT id, login FROM user WHERE id IN ({$forSelect})", $db);
        while($myrow = mysql_fetch_assoc($result)){
            $statementNew[] = $myrow; }

        $statementFinish = array();
        foreach($statement as $item){
                foreach($statementNew as $itemNew){
                    if($item['sharer_id'] == $itemNew['id']){
                        $item['sharer_login'] = $itemNew['login'];
                    }
                }
            $statementFinish[] = $item;
        }

        return $statementFinish;
    }
    //отримання запису з бази
    public function getArticleById($id)
    {
        $db = $this->ConnectDB();
        $result = mysql_query("SELECT * FROM article LEFT JOIN user ON (article.user_id = user.id) WHERE article.id = '$id' ORDER BY article.id DESC", $db);
        $myrow = mysql_fetch_assoc($result);
        return $myrow;
    }
}
?>