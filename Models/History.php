<?php

namespace App\Models;

class History
{

    protected $actions;
    protected $current;

    function __construct($actions = [], $current = [])
    {
        $this->$actions = $actions;
        $this->$current = $current;

    }

    public function getActions($app)
    {
        return $this->actions;
    }

    public function setActions($app)
    {
        $assessment = new AssessmentModel();
        $this->actions = $assessment->getLatest($app);
    }

    public function getCurrent($app)
    {
        return $this->current;
    }

    public function setCurrent($app)
    {
        $assessment = new AssessmentModel();
        $this->current = $assessment->getCurrent($app);
    }

    public function undo($app)
    {
        $assessment = new AssessmentModel();
        $i = 0;
        $this->setCurrent($app);
        $this->setActions($app);
        $keys=$assessment->getKeyCurrent($this->current['current_action']);
        var_dump($keys[0]['id']);
        foreach ($this->actions as $elt) {
            // current = [timestamp, current_action]

            if ($elt['timestamp'] == $this->current['timestamp']) {
               var_dump($elt['timestamp']);
                if ($i < 9) {
                    $i = $i + 1;
                    $this->actions[$i]['timestamp']=date('y-m-d h:i:s');
                    //echo $this->actions[$i]['timestamp'];
                    $var=$assessment->update_current($keys[0]['id']);
                    var_dump($var);
                    echo 'mriguel';
                    return true ;

                } else {

                    echo 'impossible de faire UNDO';
                }
            }else {
                echo 'impossible';
            }

            $i = $i + 1;
        }


    }



    public function setFinal()
    {

    }

    public function redo($app)
    {
    }

    public function saveFinal($app)
    {
        $assessment = new AssessmentModel();

        $assessment->deleteDraft($app);

    }

}