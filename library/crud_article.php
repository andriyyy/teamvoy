<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/dataprocessing.php');

class crud_article extends dataprocessing
{
    //добавити завдання
    public function addArticle()
    {

        $login = $_SESSION['username'];
        $content = trim($this->CheckUserData($_POST['content']));
        $share_email = $_POST['share_email'];

        if ($content && $login)
        {
            try
            {
                $db = $this->ConnectDB();
                if(trim($share_email)){

                    $result = mysql_query("SELECT id FROM user WHERE email = '$share_email'", $db);
                    $share_id = mysql_fetch_assoc($result);

                    if($share_id != false){
                        $query = "INSERT INTO article (content, user_id, sharer_id) VALUES ('{$content}', '{$share_id["id"]}', '{$_SESSION['id']}')";
                    }else{
                        //виводим текст помилки $e->getMessage()
                        echo "<center>Не існує share </center>";
                        exit;
                    }


                }else{
                    $query = "INSERT INTO article (content, user_id) VALUES ('{$content}', '{$_SESSION['id']}')";
                }

                mysql_query($query);
                header('Location: ../index.php');
            }
            catch (Exception $e)
            {
                $this->MetaTag();
                //виводим текст помилки $e->getMessage()
                echo "<center><br><a href='../index.php'>" . $e->getMessage() . "</a></center>";
                exit;
            }
        }
    }

    //видалити завдання
    public function deleteArticle()
    {
        $id = $this->CheckUserData($_POST['delete']);
        if ($id)
        {
            try
            {
                $user = $this->getArticleById((int)$_POST['delete']);
                if($_SESSION['username'] == $user['login']){
                    $this->ConnectDB();
                    $query = "DELETE FROM article WHERE id=$id";
                    mysql_query($query);
                    header('Location: ../index.php');
                }
            }
                //якщо авторизація пройшла невдало, виводим помилку
            catch (Exception $e)
            {
                $this->MetaTag();
                //виводим текст помилки $e->getMessage()
                echo "<center><br><a href='../index.php'>" . $e->getMessage() . "</a></center>";
                exit;
            }
        }
    }
    //редагувати завдання
    public function updateArticle()
    {
        $id = $_POST['id'];
        $content = trim($this->CheckUserData($_POST['content']));

        if ($_POST['update'])
        {
            try
            {

                if($_SESSION['id']) {
                    $this->ConnectDB();
                    $query = "UPDATE article SET content='{$content}' WHERE user_id={$_SESSION['id']} and id={$id}  ";
                    mysql_query($query);
                    header('Location: ../index.php');
                }
            }
               catch (Exception $e)
            {
                $this->MetaTag();
                //виводим текст помилки $e->getMessage()
                echo "<center><br><a href='../index.php'>" . $e->getMessage() . "</a></center>";
                exit;
            }
        }
    }
}
    $start = new crud_article();
    if($_POST['delete']){
        $start->deleteArticle();
    }
    if($_POST['add']){
        $start->addArticle();
    }
    if($_POST['update']){
        $start->updateArticle();
    }
?>