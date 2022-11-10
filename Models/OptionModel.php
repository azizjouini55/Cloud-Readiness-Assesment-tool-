<?php

namespace App\Models;

use CodeIgniter\Model;

class OptionModel extends Model {
    protected $table ='cra_options' ;
    protected $primaryKey='id';

    public function  getOptions($question){
        return $this->where('question',$question)->select('id,_option')->findAll();

    }






}