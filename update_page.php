<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/page_public.php');

class update_page extends  page_public
{
    // основний вміст
    protected function Content()
    {
        ?>
        <div class="container">
            <div class="row ajax">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <?php  $this->ShowLoginForm(); ?>
                    </div>
             </div>
         </div>
                </body>
            </html>
        <?php
    }
    //форма обновлення
    private function ShowLoginForm()
    {
        ?>
           <p>Редагувати завдання:</p>
           <form action="/library/crud_article.php" method="post">
              <input type="hidden" value="update" name="update" />
              <input type="hidden" value="<?php $article = $this->getArticleById($_GET['update']); echo $_GET['update']; ?>" name="id" />
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Завдання: </label>
                                        <textarea rows="10" cols="40 " name="content"  class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."><?php  echo $article['content'] ?></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" class="btn btn-default">  Добавити  </button>
                                    </div>
                                </div>
            </form>
        <?php
    }
}
$page = new update_page();
$page->DisplayPage();
?>