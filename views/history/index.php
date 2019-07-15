<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <?php if (count($ordersList) == 0): ?>
                <h4>Список ваших заказов пуст.</h4>
                <br/>
            <?php else: ?>

                <h4>Список ваших заказов:</h4>
                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID заказа</th>
                        <th>Дата оформления</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                    <?php foreach ($ordersList as $order): ?>
                        <tr>
                            <td>
                                <a href="/cabinet/history/view/<?php echo $order['id']; ?>">
                                    <?php echo $order['id']; ?>
                                </a>
                            </td>
                            <td><?php echo $order['date']; ?></td>
                            <td><?php echo Order::getStatusText($order['status']); ?></td>
                            <td><a href="/cabinet/history/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif; ?>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

