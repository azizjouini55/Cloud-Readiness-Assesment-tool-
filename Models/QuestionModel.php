<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'cra_questions';
    protected $primaryKey = 'id';

//not tested
    public function getAllQuestions()
    {
        return $this->select('id')->find();
    }

    public function getQuestions($category)
    {
        return $this->where('category', $category)->select('id,question,type')->findAll();
    }

    public function getTyype($id)
    {
        return $this->where('id', $id)->select('type')->first();

    }

    public function getCategory($id)
    {
        return $this->where('id', $id)->select('category')->findAll();

    }


}