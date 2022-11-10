<?php

namespace App\Models;

use CodeIgniter\Model;
class CategoryModel extends Model {

    protected $table = 'cra_categories';
    protected $primaryKey ='id';

    public function getCategory($category,$step){
        $data=[
            'id'=>$category,
            'step'=>$step
        ];

        return $this->where($data)->select('id,category')->findAll();
    }

    public function getCategories($step){

        return $this->where('step',$step)->select('id,category,step')->findAll();


    }
    public function getCategoryByStep($step){

        return $this->where('step',$step)->select('id')->first();


    }



}