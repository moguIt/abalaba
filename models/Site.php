<?php

/**
 * Класс Site - модель для работы с пунктами меню "О нас", "Поддержка" и "Отзывы"
 */
class Site
{

    /**
     * Возвращает массив с текстом пункта "О нас"
     * @return array <p>Массив "О нас"</p>
     */
    public static function getAboutText()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT text FROM about');

        // Получение и возврат результатов
        $result = $result->fetch();

        $aboutList = explode("\n", $result['text']);
        return $aboutList;
    }

    /**
     * Обновляет значения текста пункта "О нас"
     * @return boolean
     */
    public static function setAboutText($textAbout)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE about SET text = :text";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':text', $textAbout, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Возвращает массив с текстом пункта "Поддержка"
     * @return array <p>Массив "Поддержка"</p>
     */
    public static function getSupportText()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT del_pay, refund FROM support');

        // Получение и возврат результатов
        $list = $result->fetch();

        $supportList['del_pay'] = explode("\n", $list['del_pay']);
        $supportList['refund'] = explode("\n", $list['refund']);

        return $supportList;
    }

    /**
     * Обновляет значения текста пункта "Поддержка"
     * @return boolean
     */
    public static function setSupportText($textDelPay, $textRefund)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE support SET del_pay = :del_pay, refund = :refund";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':del_pay', $textDelPay, PDO::PARAM_STR);
        $result->bindParam(':refund', $textRefund, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Возвращает массив со всеми комментариями на сайте
     * @return array <p>Массив комментариев</p>
     */
    public static function getComments()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT name, comment, date_post FROM comment ORDER BY date_post DESC');

        // Получение и возврат результатов
        $commentList = array();
        $i = 0;

        while ($comment = $result->fetch()) {
            $commentList[$i]['name'] = $comment['name'];
            $commentList[$i]['comment'] = $comment['comment'];
            $commentList[$i]['date_post'] = $comment['date_post'];
            $i++;
        }

        return $commentList;
    }

    /**
     * Добавляет новый комментарий на сайт
     * @return boolean
     */
    public static function setComments($author, $comment)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO comment SET name = :author, comment = :comment";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        return $result->execute();
    }
}