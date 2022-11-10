<?php

namespace App\Models;

class Question
{

    public function BuildQuestion($app, $id, $type)
    {
        $option = new Option();
        return $option->BuildOption($app, $id, $type);

    }
}