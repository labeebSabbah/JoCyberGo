<?php 

namespace App\Controllers;

class Controller {
    protected function render($view, $title = "", $data = []) {
        extract($data);
        ob_start();
        include "Views/$view.php";
        $content = ob_get_clean();
        include "Views/Layout/app.php";
    }
}