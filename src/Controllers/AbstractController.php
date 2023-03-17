<?php

namespace App\Controllers;

/**
 * Renderer class : render the view with params
 */
abstract class AbstractController
{
    /**
     * @param string $viewPath
     * @param array|null $params
     * 
     * @return string
     */
    public function render(string $viewPath, ?array $params = []): string
    {
        ob_start();
        
        extract($params);
        
        require BASE_VIEW_PATH . $viewPath . '.php';

        return strval(ob_get_clean());
    }
}