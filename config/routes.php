<?php

return array(
    // Товар:
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    // Каталог:
    'catalog/sortCategory/([0-9]+)/([a-z]+)/page-([0-9]+)' => 'catalog/sortCategory/$1/$2/$3', // actionCategory в CatalogController
    'catalog/sortCategory/([0-9]+)/([a-z]+)' => 'catalog/sortCategory/$1/$2', // actionCategory в CatalogController
    'catalog' => 'catalog/index', // actionIndex в CatalogController
    // Раздел товаров:
    'section/([0-9]+)/page-([0-9]+)' => 'catalog/section/$1/$2', // actionSection в CatalogController
    'section/([0-9]+)' => 'catalog/section/$1', // actionSection в CatalogController
    // Категория товаров:
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController   
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController
    // Корзина:
    'cart/checkout' => 'cart/checkout', // actionAdd в CartController    
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController    
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController    
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
    'cart' => 'cart/index', // actionIndex в CartController
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet/history/view/([0-9+])' => 'cabinet/historyView/$1',
    'cabinet/history' => 'cabinet/history',
    'cabinet' => 'cabinet/index',
    // Управление разделами:
    'admin/section/create' => 'adminSection/create',
    'admin/section/update/([0-9]+)' => 'adminSection/update/$1',
    'admin/section/delete/([0-9]+)' => 'adminSection/delete/$1',
    'admin/section' => 'adminSection/index',
    // Управление категориями:
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление товарами:    
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // Управление заказами:    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // Управление "О нас":
    'admin/about/update' => 'adminAbout/update',
    'admin/about' => 'adminAbout/index',
    // Управление "Поддержка":
     'admin/support/update' => 'adminSupport/update',
     'admin/support' => 'adminSupport/index',
    // Админпанель:
    'admin' => 'admin/index',
    // О нас:
    'about' => 'site/about',
    // Поддержка:
    'support' => 'site/support',
    // Отзывы:
    'comments' => 'site/comment',
    // Контакты:
    'contacts' => 'site/contact',
    // Главная страница:
    'site/search' => 'site/search',
    'site/sort/([a-z]+)' => 'site/sort/$1',
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
);
