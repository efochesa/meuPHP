<?php
namespace MeuPHP\Core;

use MeuPHP\Routing\Router;

class App {
    public function run() {
        Router::dispatch();
    }
}
