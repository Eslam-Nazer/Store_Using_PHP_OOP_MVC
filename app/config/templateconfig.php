<?php

return [
    "template"  => [
        'navbar'            => TEMPLATE_PATH . 'navbar.php',
        'sidebar'           => TEMPLATE_PATH . 'sidebar.php',
        ':view'             => ':action_view',
    ],
    'header_resources'  => [
        'css' => [
            'normalize' => CSS . "normalize.css",
            'styles' => CSS . "styles.css",
            'datatables' => CSS . "datatables.css",
            'fontawesome' => CSS . "fontawesome/all.css",
            'input' => CSS . "input.css",
            'output' => CSS . "output.css",
        ],
        'js' => [
            'datatables' => JS . "datatables.js"
        ]
    ],
    'footer_resources'  => [
        'js' => [
            'main'  => JS .  "main.js",
            'loginform' => JS . "logform.js",
            'datatablemaker' => JS . 'datatablemaker.js',
            'AjaxChecker' => JS . 'AjaxChecker.js',
        ]
    ]
];
