<?php

namespace App\Controllers;

use App\Models\AssessmentModel;
use App\Models\History;
use App\Models\UndoRedo;
use Config\Services;

class Save extends BaseController
{
    public function saveAnswer()

    {
        $assessment = new  AssessmentModel();
        $input_data  = json_decode(file_get_contents('php://input'),true);

        $var = $assessment->getKeys($input_data['application'],  $input_data['question']);
        $assessment->setNotCurrent($var);
        $assessment->saveOption($input_data['application'], $input_data['question'], $input_data['option'],  $input_data['text']);

    }

    public function undo(){
        $input_data  = json_decode(file_get_contents('php://input'),true);
        $history = new History();
        $history->undo($input_data["application"]);
    }
    public function redo(){
        $input_data  = json_decode(file_get_contents('php://input'),true);
        $history = new History();
        $history->redo($input_data["application"]);
    }

    public function saveFinal(){
        $input_data  = json_decode(file_get_contents('php://input'),true);
        $history = new History();
        $history->saveFinal($input_data["application"]);
    }


    public function test(){

        $assessment = new  AssessmentModel();
        $history= new History();

        //$var=$history->undo(2);

        $var=$assessment->getmaxKey(1);
        $assessment->updateMaxCurrent($var['id']);



      var_dump($var);


    }


}