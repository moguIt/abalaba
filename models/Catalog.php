<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23.06.2019
 * Time: 10:37
 */

// Объявляем нужные константы
define('DB_HOST', 'localhost');
define('DB_USER', 'taxon');
define('DB_PASSWORD', 'welter64');
define('DB_NAME', 'kids_store');

// Подключаемся к базе данных
function connectDB() {
    // Устанавливаем соединение
    $db_host = DB_HOST;
    $db_name = DB_NAME;
    $dsn = "mysql:host={$db_host};dbname={$db_name}";
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);

    // Задаем кодировку
    $db->exec("set names utf8");

    return $db;
}

// Получение данных из массива _GET
function getOptions() {
    // Категория, цены и дополнительные данные
    $sectionId = (isset($_GET['section'])) ? (int)$_GET['section'] : 0;
    $minPrice = (isset($_GET['min_price'])) ? (int)$_GET['min_price'] : 0;
    $maxPrice = (isset($_GET['max_price'])) ? (int)$_GET['max_price'] : 1000;
    $needsData = (isset($_GET['needs_data'])) ? explode(',', $_GET['needs_data']) : array();

    // Бренды
    $brandsId = (isset($_GET['brands'])) ? $_GET['brands'] : null;

    if ($brandsId != null) {

        $i = 0; // Итератор

        $brands = array();
        foreach ($brandsId as $brandId) {
            switch ($brandId) {
                case 1:
                    $brands[$i] = "'Castorland'";
                    break;
                case 2:
                    $brands[$i] = "'JVToy'";
                    break;
                case 3:
                    $brands[$i] = "'Boef'";
                    break;
                case 4:
                    $brands[$i] = "'Украина'";
                    break;
                case 5:
                    $brands[$i] = "'Китай'";
                    break;
            }

            $i++;
        }

        $brands = implode($brands, ',');
    }

    // Сортировка
    $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'price_asc';
    $sort = explode('_', $sort);
    $sortBy = $sort[0];
    $sortDir = $sort[1];

    return array(
        'brands' => $brands,
        'section_id' => $sectionId,
        'min_price' => $minPrice,
        'max_price' => $maxPrice,
        'sort_by' => $sortBy,
        'sort_dir' => $sortDir,
        'needs_data' => $needsData
    );
}

// Получение всех данных
function getData($options, $con) {
    $result = array(
        'goods' => getGoods($options, $con)
    );

    $needsData = $options['needs_data'];

    if (empty($needsData))
        return $result;

    if (in_array('brands', $needsData)) {
        $result['brands'] = getBrands($options['section_id'], $con);
    }
    if (in_array('prices', $needsData)) {
        $result['prices'] = getPrices($options['section_id'], $con);
    }

    return $result;
}

// Получение товаров
function getGoods($options, $con) {
    // Обязательные параметры
    $minPrice = $options['min_price'];
    $maxPrice = $options['max_price'];
    $sortBy = $options['sort_by'];
    $sortDir = $options['sort_dir'];

    // Необязательные параметры
    $sectionId = $options['section_id'];
    $sectionWhere =
        ($sectionId !== 0)
            ? " product.category_id = category.id and category.section_id = section.id and section.id = $sectionId and "
            : ' product.category_id = category.id and category.section_id = section.id and ';

    $brands = $options['brands'];
    $brandsWhere =
        ($brands !== null)
            ? " product.brand in ($brands) and "
            : '';

    // Текст запроса к БД
    $query = "
        select
            product.id AS product_id,
            product.name AS product_name, 
            product.price AS product_price,
            product.brand
        from
            product,
            category,
            section
        where
            $sectionWhere
            $brandsWhere
            product.price between $minPrice and $maxPrice
        order by product.$sortBy $sortDir
    ";

    $data = $con->query($query);
    return $data->fetchAll();
}

// Получаем бренды по разделу
function getBrands($sectionId, $con)
{
    if ($sectionId !== 0) {
        $query = "
            select
                distinct 
                         product.brand
            from
                product,
                category,
                section
            where
                product.category_id = category.id 
                and category.section_id = section.id 
                and section.id = $sectionId
        ";
    } else {
        $query = 'SELECT DISTINCT product.brand from product';
    }
    $data = $con->query($query);
    $data = $data->fetchAll(PDO::FETCH_ASSOC);

    $i = 1;
    $j = 0;
    $dataArray = array();

    foreach ($data as $key => $val) {
        if (!in_array($val['brand'], $dataArray, true)) {
            $dataArray[$j]['brand_id'] = $i;
            $dataArray[$j]['brand_name'] = $val['brand'];
            $i++;
            $j++;
        }
    }

    return $dataArray;
}

// Получаем минимальную и максимальную цену
function getPrices($sectionId, $con) {
    $query = "
        select
            min(product.price) as min_price,
            max(product.price) as max_price
        from
            product,
            category,
            section 
    ";
    if ($sectionId !== 0) {
        $query .= " WHERE 
                product.category_id = category.id 
                and category.section_id = section.id 
                and section.id = $sectionId";
    }
    $data = $con->query($query);
    return $data->fetch();
}

// ----------------------------------------------- //

// Подключаемся к базе данных
$con = connectDB();

// Получаем данные от клиента
$options = getOptions();

// Получаем товары (было getGoods)
$data = getData($options, $con);

// Возвращаем клиенту успешный ответ
// стало 'data' => $data вместо 'goods' => $goods)
// также уберем строку options - завели ее для отладки, больше не понадобится
echo json_encode(array(
    'code' => 'success',
    'data' => $data
    //    'options' => $options,

));