<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/page_public.php');

class index extends page_public
{

}
session_start();

if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {

    header('Location: enter.php');
    die();
 }


$page = new index();
//вивід головної сторінки
$page->DisplayPage();

?>