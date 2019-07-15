<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление пунктом "Поддержка"</li>
                </ol>
            </div>

            <h4>Пункт меню "Поддержка"</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>Доставка и оплата</th>
                    <th>Возврат</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <?php foreach ($supportList['del_pay'] as $delPay):
                             echo $delPay;
                         endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($supportList['refund'] as $refund):
                            echo $refund;
                        endforeach; ?>
                    </td>
                    <td><a href="/admin/support/update" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                </tr>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

