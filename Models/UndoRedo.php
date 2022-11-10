<?php

namespace App\Models;
use App\Libraries\Stack;

class UndoRedo
{

    protected $undo;
    protected $redo;
    function __construct()
    {

    }

    public function setUndo(){

        $this->undo= new Stack();

    }
    public function setRedo(){

        $this->redo= new Stack();
    }
    public function getUndo(){
        return $this->undo;
    }
    public function getRedo(){

        return $this->redo;

    }


    public function fillUndo($app){

        $assessment = new AssessmentModel();
        $actions=$assessment->getLatest($app);
        foreach($actions as $element){
            $this->undo->push($element);}
    }

    public function undo(){


        if( $this->undo->isEmpty()){

            return "cant undo ";
        }
        else {
            $this->redo->push( $this->undo->top());
            $val=$this->undo->pop();
        }
        return $val;

    }

    public function redo(){

        if( $this->redo->isEmpty()){
            return "cant redo ";
        }
        else {
            $this->undo->push( $this->redo->top());
            $val=$this->redo->pop();
        }
        return $val;

    }


}