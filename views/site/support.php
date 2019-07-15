<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <h3>Доставка и оплата</h3>

                <br/>

                <?php foreach ($supportList['del_pay'] as $delPay): ?>
                    <p><?php echo $delPay; ?></p>
                <?php endforeach; ?>

                <h3>Возврат</h3>

                <br/>

                <?php foreach ($supportList['refund'] as $refund): ?>
                    <p><?php echo $refund; ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>