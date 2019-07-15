<?php include ROOT . '/views/layouts/header.php'; ?>

<section class="container">
    <div class="row">

        <!-- Заглушка -->
        <div class="col-md-2">
        </div>

        <div class="col-md-8">

            <?php if ($result): ?>
                <p>Комментарий успешно добавлен!</p>
            <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Форма для отправки комментария -->
            <div class="panel">
                <div class="panel-body">
                    <form method="post">
                        <textarea class="form-control" rows="3" placeholder="Добавьте Ваш комментарий" name="comment"></textarea>
                        <div class="clearfix">
                            <input type="submit" name="submit" class="btn btn-sm btn-primary pull-right" value="Добавить">
                        </div>
                    </form>
                </div>
            </div>
            <!-- Конец формы для отправки комментария -->

            <!-- Блок отображения комментариев -->
            <div class="panel">
                <div class="panel-body">

                    <!-- Комментарий -->
                    <?php foreach ($commentList as $comment): ?>
                        <div class="media-block">
                            <div class="media-body">
                                <div class="mar-btm">
                                    <a href="#" class="btn-link text-semibold media-heading box-inline">
                                        <?php echo $comment['name']; ?>
                                    </a>
                                    <p class="date"><?php echo $comment['date_post']; ?></p>
                                </div>
                                <p><?php echo $comment['comment']; ?></p>
                                <hr>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <!-- Конец блока отображения комментариев -->

        </div>

        <!-- Заглушка -->
        <div class="col-md-2">
        </div>

    </div><!-- /.row -->
</section><!-- /.container -->

<?php include ROOT . '/views/layouts/footer.php'; ?>