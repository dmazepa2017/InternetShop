<?php

    return array(
        '^news$/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
        //'news/([0-9]+)' => 'news/view', //actionView in NewsController
        //'news' => 'news/index', // actionIndex in NewsController
        'author' => 'author/list', // actionList in AuthorController
        'picture' => 'picture/all', //actionAll in PictureController
        'contacts' => 'contacts/contact', //actionContact in ContactsController

    );