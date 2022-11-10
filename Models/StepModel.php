<?php

namespace App\Models;

use CodeIgniter\Model;

class StepModel extends Model
{
    protected $table = 'cra_steps';
    protected $primaryKey = 'id';

    public function getStep($step)
    {

        return $this->where('id',$step)->select('id,step')->findAll();
    }
    public function getSteps(){

        return $this->select('id,step')->findAll();


    }


}