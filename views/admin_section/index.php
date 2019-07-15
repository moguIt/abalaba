<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление разделами</li>
                </ol>
            </div>

            <a href="/admin/section/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить раздел</a>

            <h4>Список разделов</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID раздела</th>
                    <th>Название раздела</th>
                    <th>Порядковый номер</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($sectionsList as $section): ?>
                    <tr>
                        <td><?php echo $section['id']; ?></td>
                        <td><?php echo $section['name']; ?></td>
                        <td><?php echo $section['sort_order']; ?></td>
                        <td><?php echo Section::getStatusText($section['status']); ?></td>
                        <td><a href="/admin/section/update/<?php echo $section['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/section/delete/<?php echo $section['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

