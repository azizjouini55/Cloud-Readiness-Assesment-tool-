<?php

namespace App\Models;

class Step
{
    public function BuildStep($app,$category,$step)
    {
        $categoryModel = new CategoryModel();
        $ctg = $categoryModel->getCategory($category,$step);
        $category_ = new Category();


            return  [$ctg, $category_->BuildCategory($app, $category)];



    }

}