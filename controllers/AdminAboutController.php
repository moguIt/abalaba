<?php

/**
 * Контроллер AdminAboutController
 * Управление категориями товаров в админпанели
 */
class AdminAboutController extends AdminBase
{
    /**
     * Action для страницы "Управление "О нас"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список абзацов
        $aboutList = Site::getAboutText();

        // Подключаем вид
        require_once(ROOT . '/views/admin_about/index.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать пункт "О нас"
     */
    public function actionUpdate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список абзацов
        $aboutList = Site::getAboutText();

        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $textAbout = $_POST['textAbout'];

            // Сохраняем внесенные изменения
            $result = Site::setAboutText($textAbout);

            // Перемещаем пользователя в управление пунктом меню "О нас"
            ?>
            <script type="text/javascript">
                location.replace('/admin/about');
            </script>
            <?php
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_about/update.php');
        return true;
    }

}
