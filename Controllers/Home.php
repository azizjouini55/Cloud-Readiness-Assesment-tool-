<?php

namespace App\Controllers;

use App\Models\AssessmentModel;
use App\Models\BuilderForm;
use App\Models\CategoryModel;
use App\Models\StepModel;

class Home extends BaseController
{


    public function assessment($app, $step, $category)
    {
        $form = new BuilderForm($app, $step, $category);
        $form_ = $form->Build();
        $data['formBuilder'] = $form_;
        $layout = $this->fetchCategories($step);
        $data['app'] = $app;
        $data['steps'] = $layout[0];
        $data['url'] = base_url();
        $data['categories'] = $layout[1];
        //echo json_encode($var);
        return view('/step', $data);
    }



    public function fetchCategories($step)
    {

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories($step);
        $fCategory = $categories[0]['step'];
        $data['categories'] = $categories;
        $var = $this->initiate();
        return [$var, $data, $fCategory];
    }

    public function initiate()
    {
        $stepModel = new StepModel();
        $steps = $stepModel->getSteps();
        $data['steps'] = $steps;

        return $data;

    }



}

















