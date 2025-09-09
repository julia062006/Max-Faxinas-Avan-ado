<?php

namespace App\Controller;


class NotFoundController
{
    public function erro(): void
    {
        $page = 'erro';
        include_once __DIR__ . '/../View/pages/layout.phtml';
    }
}