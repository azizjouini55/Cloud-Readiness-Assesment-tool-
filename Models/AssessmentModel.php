<?php

namespace App\Models;

use CodeIgniter\Model;

class AssessmentModel extends Model
{
    protected $table = 'cra_assessment';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['application', '_option', 'question', 'textarea', 'note', 'timestamp', 'current_action', 'is_final'];


    function getAnswer($app, $qId)
    {
        $data = ['application' => $app,
            'question' => $qId,
            'is_final' => 1
        ];


        return $this->where($data)->select('textarea,_option')->find();
    }

    public function addRow($data)
    {
        $this->save($data);
    }

    public function appExists($app)
    {
        $this->where('application', $app);
        $query = $this->select('application');
        if ($query->countAllResults() > 0)
            return true;
        else
            return false;
    }

    public function getKeys($app, $question)
    {
        $data = [
            'question' => $question,
            'application' => $app
        ];
        return $this->where($data)->findColumn('id');
    }

    public function setNotCurrent($keys)
    {
        $data = [
            'is_final' => 0,
        ];

        $this->update($keys, $data);

    }

    public function saveOption($app, $question, $option, $text)
    {

        $data = [
            'application' => $app,
            'question' => $question,
            '_option' => $option,
            'textarea' => $text,
            'note' => null,
            'is_final' => 1,
            'current_action'=>date('y-m-d h:i:s')
        ];

        $this->insert($data);
    }

    public function getLatest($app)
    {
        return $this->where('application',$app)->orderBy('timestamp', 'desc')->select('timestamp')->limit(10)->find();

    }

    public function getCurrent($app)
    {
        $var = $this->where('application', $app)->selectMax('current_action')->first();

        return $this->where('current_action', $var["current_action"])->select('current_action,timestamp')->first();

    }

    public function updateMaxCurrent($key){

        $data=[
            'current_action'=>date('y-m-d h:i:s')

        ];
        $this->update($key,$data);
    }
   public function getmaxKey($app){
        $data1=[
            'application'=>$app,
            'current_action'=>'timestamp'
        ];
       $var = $this->where($data1)->selectMax('current_action')->first();
       $data=['current_action'=>$var ["current_action"]

       ];
       var_dump($var);
     //  return  $this->where($data)->select('id')->first();


}
    public function getKeyCurrent($latest){
        $data=['current_action'=>$latest];
        return $this->where($data)->select('id')->find();
    }
    public function update_current($keys){
        $data=[
            'current_action'=>date('y-m-d h:i:s'),
            'is_final'=>1
        ];
        $this->update($keys,$data);
    }


    public function deleteDraft($app)
    {
        $data = ['application' => $app,
            'is_final' => 0];
        $this->where($data)->delete();

    }


}

