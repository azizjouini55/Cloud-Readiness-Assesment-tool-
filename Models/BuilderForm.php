<?php

namespace App\Models;

class BuilderForm
{
    public $step;
    public $category;
    public $application;

    function __construct($app,$stp, $ctg)
    {
        $this->step = $stp;
        $this->category = $ctg;
        $this->application=$app;
    }

    public function Build()
    {
        $step = new Step();
        $stepModel = new StepModel();
        return [$stepModel->getStep($this->step), $step->BuildStep($this->application,$this->category,$this->step)];

    }


}