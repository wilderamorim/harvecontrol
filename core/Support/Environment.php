<?php

namespace Core\Support;

use Core\Views\AbstractExtension;

class Environment extends AbstractExtension
{
    public static function isProduction(): bool
    {
        return config('app.env') === 'production';
    }
}