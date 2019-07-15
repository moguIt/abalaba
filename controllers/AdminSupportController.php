<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 30.06.2019
 * Time: 15:59
 */

class AdminSupportController extends AdminBase
{
    /**
     * Action для страницы "Управление "Поддержка"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список абзацов
        $supportList = Site::getSupportText();

        // Подключаем вид
        require_once(ROOT . '/views/admin_support/index.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать "Поддержка"
     */
    public function actionUpdate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список абзацов
        $supportList = Site::getSupportText();

        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $textDelPay = $_POST['text_del_pay'];
            $textRefund = $_POST['text_refund'];

            // Сохраняем внесенные изменения
            $result = Site::setSupportText($textDelPay, $textRefund);

            // Перемещаем пользователя в управление пунктом меню "Поддержка"
            ?>
            <script type="text/javascript">
                location.replace('/admin/support');
            </script>
            <?php
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_support/update.php');
        return true;
    }
}