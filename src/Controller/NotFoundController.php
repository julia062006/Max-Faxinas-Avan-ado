<?php

namespace App\Controller;


class NotFoundController
{
    public function index(): void
    {
        include_once __DIR__ . '/../View/pages/erro.phtml';
    }
}