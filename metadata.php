<?php
/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = [
    'id'           => 'recaptcha',
    'title'        => 'ReCaptcha',
    'description'  => array(
        'en' => 'protect the contact form using ReCaptcha',
        'de' => 'Kontakt-Formular mit ReCaptcha schützen'
        ),
    'version'      => '2.0',
    'author'       => 'Marten Seemann',
    'thumbnail'    => 'logo.png',
    'extend'       => [
        \OxidEsales\Eshop\Application\Controller\ContactController::class => \SeemannIT\Recaptcha\Application\Controller\ContactController::class,
        \OxidEsales\Eshop\Core\Config::class => \SeemannIT\Recaptcha\Core\Config::class,
        \OxidEsales\Eshop\Core\ViewConfig::class => \SeemannIT\Recaptcha\Core\ViewConfig::class,
    ],
    'blocks'       => [
        [
            'template' => 'form/contact.tpl',
            'block' => 'captcha_form',
            'file' => '/views/blocks/contact.tpl'
        ],
    ],
    'settings'     => [
        [
            'group' => 'recaptcha_general',
            'name' => 'recaptcha_site_key',
            'type' => 'str',
            'value' => '',
            'position' => 1
        ],
        [
            'group' => 'recaptcha_general',
            'name' => 'recaptcha_secret_key',
            'type' => 'str',
            'value' => '',
            'position' => 2
        ],
    ],
    'templates' => [
        'captcha_label.tpl' => 'seemannit/recaptcha/views/blocks/captcha_label.tpl',
        'captcha_body.tpl' => 'seemannit/recaptcha/views/blocks/captcha_body.tpl',
    ],
    'url' => 'https://www.oxid-responsive.com'
];
