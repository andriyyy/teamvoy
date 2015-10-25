<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/page_public.php');

class activate extends page_public
{
    protected function Content()
    {
        ?>
        <div class="container">
        <div class="row ajax">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php
                    $hash = $_GET['hash'];
                    if ($hash != "")
                    {
                        $conn = $this->ConnectDB();
                        // шукаєм хеш в базі
                        $result = mysql_query ("SELECT id FROM user WHERE hash = '$hash'");
                        $num_rows = mysql_num_rows($result);
                        // якщо хеш знайдений - активуєм, чистим хеш
                        if ($num_rows > 0)
                        {
                            $conn = $this->ConnectDB();
                            $result = mysql_query ("UPDATE user SET status = 1, hash = '' WHERE hash = '$hash'");

                            echo "<center><br><a href='../index.php'>Активація пройшла успішно. Вернутись на головну.</a></center>";
                        }
                        else
                            echo "<center><br><a href='../index.php'>Помилка. Вернутись на головну.</a></center>";
                    }
                    else
                        echo "<center><br><a href='../index.php'>Невірний лінк. Вернутись на головну.</a></center>";

                    ?>
                            </div>
                       </div>
                    </div>
                </body>

            </html>
     <?php
    }

}

$page = new activate();
$page->DisplayPage();
?>