<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/support">Управление пунктом "Поддержка"</a></li>
                    <li class="active">Редактировать пункт меню "Поддержка"</li>
                </ol>
            </div>


            <h4>Редактировать "Поддержка"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form update-about">
                    <form action="#" method="post">
                        <p>Доставка и оплата</p>
                        <textarea name="text_del_pay"><?php foreach ($supportList['del_pay'] as $delPay): echo $delPay; endforeach; ?></textarea>

                        <br><br>

                        <p>Возврат</p>
                        <textarea name="text_refund"><?php foreach ($supportList['refund'] as $refund): echo $refund; endforeach; ?></textarea>

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

