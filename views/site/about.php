<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <h3>Информация о магазине</h3>

                <br/>

                <?php foreach ($aboutList as $about): ?>
                    <p><?php echo $about; ?></p>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>