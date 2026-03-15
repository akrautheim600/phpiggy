<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\VaildatorService;

class AuthController
{

    public function __construct(
        private TemplateEngine $view,
        private VaildatorService $vaildatorService
    ) {}

    public function registerView()
    {

        echo $this->view->render("register.php");
    }

    public function register()
    {
        $this->vaildatorService->vaildateRegister($_POST);
    }
}
