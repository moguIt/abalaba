<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями товаров в админпанели
 */
class AdminsectionController extends AdminBase
{

    /**
     * Action для страницы "Управление разделами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список разделов
        $sectionsList = Section::getSectionsListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_section/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить раздел"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый раздел
                Section::createSection($name, $sortOrder, $status);

                // Перенаправляем пользователя на страницу управлениями разделами
                ?>
                <script type="text/javascript">
                    location.replace('/admin/section');
                </script>
                <?php
            }
        }

        require_once(ROOT . '/views/admin_section/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать раздел"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $section = Section::getSectionById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Section::updateSectionById($id, $name, $sortOrder, $status);

            // Перенаправляем пользователя на страницу управлениями категориями
            ?>
            <script type="text/javascript">
                location.replace('/admin/section');
            </script>
            <?php
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_section/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить раздел"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем раздел
            Section::deleteSectionById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            ?>
            <script type="text/javascript">
                location.replace('/admin/section');
            </script>
            <?php
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_section/delete.php');
        return true;
    }

}
