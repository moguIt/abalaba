<?php

/**
 * Контроллер CartController
 */
class SiteController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        // Список разделов для левого меню
        $sections = Section::getSectionsList();

        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список последних товаров
        $latestProducts = Product::getLatestProducts(15);

        // Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

        /**
     * Action для сортировки товаров по параметру, который пришел
     * @param string $id
     */
    public function actionSort($id) {
        // Список разделов для левого меню
        $sections = Section::getSectionsList();

        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список последних товаров
        $latestProducts = Product::getLatestProducts(15, $id);

        // Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();

        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    /**
     * Action для страницы "Поддержка"
     */
    public function actionSupport()
    {
        // Получаем список абзацов
        $supportList = Site::getSupportText();

        // Подключаем вид
        require_once(ROOT . '/views/site/support.php');
        return true;
    }

    /**
     * Action для страницы "О нас"
     */
    public function actionAbout()
    {
        // Получаем список абзацов
        $aboutList = Site::getAboutText();

        // Подключаем вид
        require_once(ROOT . '/views/site/about.php');
        return true;
    }

    /**
     * Action для страницы "Отзывы"
     */
    public function actionComment()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Переменные для формы
        $name = false;
        $comment = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $comment = $_POST['comment'];

            // Получаем имя пользователя из БД
            $user = User::getUserById($userId);
            $name = $user['name'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkComment($comment)) {
                $errors[] = 'Текст комментария отсутствует';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем комментарий на сайт
                $result = Site::setComments($name, $comment);
            }
        }

        // Получаем список комментариев из БД
        $commentList = Site::getComments();

        // Подключаем вид
        require_once(ROOT . '/views/site/comment.php');
        return true;
    }

    /**
     * Action для страницы "Контакты"
     */
    public function actionContact()
    {

        // Переменные для формы
        $userEmail = false;
        $userText = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Отправляем письмо администратору 
                $adminEmail = 'php.start@mail.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }

    /**
     * Action для поиска
     * @param string $id
     */
    public function actionSearch()
    {
        // Список разделов для левого меню
        $sections = Section::getSectionsList();

        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список последних товаров
        $latestProducts = Product::getProductSearch($_POST['query']);

        // Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();

        // Подключаем вид
        require_once(ROOT . '/views/site/search.php');
        return true;
    }
}
