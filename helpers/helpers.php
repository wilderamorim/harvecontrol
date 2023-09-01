<?php

if(!function_exists('config')){
    function config(string $path, string $separator = '.'){
        //config('app.route_dir')
        $explode = explode($separator,$path);
        $fileName = $explode[0];

        if(!file_exists($config = __DIR__ .'/../config/'.$fileName.".php")){
            return null;
        }

        array_shift($explode);

        $file = dot(require $config);

        if (empty($explode)){
            return $file->all();
        }

        return dot(require $config)->get(implode($separator, $explode));

    }
}