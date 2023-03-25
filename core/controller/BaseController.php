<?php
namespace Core\Controller;

abstract class BaseController
{
    const TEMPLATE_PATH = 'templates/';
    const TEMPLATE_BASE = 'layout';
    protected $templateExtension = '.php';

    protected function renderClassicView(string $template, array $variables = [], string $blockJSPath = '') {
        ob_start();
        extract($variables);
        require self::TEMPLATE_PATH . $template . $this->templateExtension;
        $content = ob_get_clean();
        require self::TEMPLATE_PATH. self::TEMPLATE_BASE.'.php';
    }
}