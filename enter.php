<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/page_public.php');

class index extends page_public
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
    //форма входу
    private function ShowLoginForm()
    {
        ?>
                    <form method='post'  action='../library/page_user.php'>
                               <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Логін: </label>
                                        <input type="text" class="form-control" name="user_login"  placeholder="Login"  required data-validation-required-message="Please enter your login.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Пароль: </label>
                                        <input type="password" class="form-control" name="user_passwd"  placeholder="Password" required data-validation-required-message="Please enter your login.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" class="btn btn-default">  Вхід  </button>
                                    </div>
                                </div>
                        <input type="hidden" value="enter" name="enter" />
                    </form>

        <?php
    }
}
$page = new index();
//вивід головної сторінки
$page->DisplayPage();

?>