<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/dataprocessing.php');

class page_public extends dataprocessing
{
    public function DisplayPage()
    {
        $this->MetaTag();
        $this->Menu();
        $this->Content();
    }

    // теги
    public function MetaTag()
    {
        ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Test</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
        <?php
    }

    // основний вміст
    protected function Content()
    {
        ?>
        <div class="container">
            <div class="row ajax">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <?php
                            $articles = $this->getArticles();
                            foreach($articles as $article) {
                                ?>
                                <div class="post-preview">
                                    <?php echo $article['content']; ?>
                                      <p style="color:grey;"> <?php echo $article['sharer_login']; ?></p>
                                            <form action="/update_page.php" method="get">
                                                <input type="hidden" value="<?php echo $article['id']; ?>" name="update" />
                                                <input type="submit" class="btn btn-default" value=" Редагувати " />
                                            </form>
                                            <form action="/library/crud_article.php" method="post">
                                                <input type="hidden" value="<?php echo $article['id']; ?>" name="delete" />
                                                <input type="submit"  class="btn btn-default" value="  Видалити  " />
                                            </form>
                                    <hr>
                                </div>
                                <?php
                            }
                        ?>
                </div>
            </div>
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                                <p style="display:none;" class="finish"></p>
                                <p class="preloader"></p>
                            <p>Добавити завдання:</p>
                            <form  action="/library/crud_article.php" method="post">
                                <input type="hidden" value="add" name="add" />
                                <input type="hidden" value="<?php $_SESSION['id'] ?>" name="login"  />

                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Share email: </label>
                                        <input type="text" class="form-control" placeholder="Share" id="share" name="share_email" >
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Завдання: </label>
                                        <textarea rows="10"  name="content"  class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" class="btn btn-default">  Добавити  </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
        <?php
    }

    // меню
    public function Menu()
    {
        ?>
        <!-- Navigation -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header page-scroll">
                    <a class="navbar-brand" href="index.php">Task manager</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if($_SESSION['username']){ ?>
                        <li>
                                <a>Привіт: <?php echo $_SESSION['username']; ?></a>
                        </li>
                        <li>
                                <a href="/sessiondestroy.php" id="link_top">Вихід</a>
                        </li>
                        <?php }else{ ?>
                            <li>
                                <a href="/enter.php" id="link_top">Вхід</a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="/registry.php" id="link_top">Реєстрація</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
    }
}
?>