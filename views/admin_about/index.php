<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление пунктом "О нас"</li>
                </ol>
            </div>

            <h4>Пункт меню "О нас"</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>Информация о магазине</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                        <?php foreach ($aboutList as $about): ?>
                            <?php echo $about; ?>
                        <?php endforeach; ?>
                    </td>
                    <td><a href="/admin/about/update" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                </tr>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

