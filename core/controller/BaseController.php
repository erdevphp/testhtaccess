<?php
namespace Core\Controller;

class BaseController
{
    const TEMPLATE_PATH = 'templates/';
    const TEMPLATE_BASE = 'layout';
    protected $templateExtension = '.php';

    public function renderClassicView($template) {
        ob_start();
        require self::TEMPLATE_PATH . $template . $this->templateExtension;
        $content = ob_get_clean();
        require self::TEMPLATE_PATH. self::TEMPLATE_BASE.'.php';
    }
}