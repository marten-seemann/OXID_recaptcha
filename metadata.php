<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'recaptcha',
    'title'        => 'ReCaptcha',
    'description'  => array(
        'en' => 'simplify captchas by using ReCaptcha',
        'de' => 'einfachere Captchas mit ReCaptcha'
        ),
    'version'      => '1.0',
    'author'       => 'Marten Seemann',
    'thumbnail'    => 'logo.png',
    'extend'       => array(
        'oxcaptcha' => 'recaptcha/core/oxcaptcha_ext',
        'oxconfig'  => 'recaptcha/core/oxconfig_ext',
        'oxviewconfig'  => 'recaptcha/core/oxviewconfig_ext',
    ),
    'blocks'       => array(
        array('template' => 'form/contact.tpl', 'block' => 'captcha_label', 'file' => '/views/blocks/captcha_label.tpl'),
        array('template' => 'form/pricealarm.tpl', 'block' => 'captcha_label', 'file' => '/views/blocks/captcha_label.tpl'),
        array('template' => 'form/suggest.tpl', 'block' => 'captcha_label', 'file' => '/views/blocks/captcha_label.tpl'),
        array('template' => 'form/privatesales/invite.tpl', 'block' => 'captcha_label', 'file' => '/views/blocks/captcha_label.tpl'),
        array('template' => 'form/contact.tpl', 'block' => 'captcha_body', 'file' => '/views/blocks/captcha_body.tpl'),
        array('template' => 'form/pricealarm.tpl', 'block' => 'captcha_body', 'file' => '/views/blocks/captcha_body.tpl'),
        array('template' => 'form/suggest.tpl', 'block' => 'captcha_body', 'file' => '/views/blocks/captcha_body.tpl'),
        array('template' => 'form/privatesales/invite.tpl', 'block' => 'captcha_body', 'file' => '/views/blocks/captcha_body.tpl'),
    ),
    'templates'    => array(
    ),
    'settings'     => array(
        array('group' => 'recaptcha_general', 'name' => 'recaptcha_site_key', 'type' => 'str',  'value' => '', 'position' => 1),
        array('group' => 'recaptcha_general', 'name' => 'recaptcha_secret_key', 'type' => 'str',  'value' => '', 'position' => 2),
    ),
    'url' => 'http://www.oxid-responsive.com'
);
