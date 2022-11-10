<?php

namespace App\Models;

use CodeIgniter\Debug\Toolbar\Collectors\Views;

class Option
{
    public function BuildOption($app, $id, $type)
    {
        $option = new OptionModel();
        $assessment = new AssessmentModel();
        $assessmentInit = new AssessmentInit();
        $option_array = $option->getOptions($id);
        $resulting_array = array();
        $answer = $assessment->getAnswer($app, $id);


        if (!$assessment->appExists($app)) {
            $assessmentInit->createAssessment($app);
            if ($type == 'textarea') {
                return "";
            } else {
                foreach ($option_array as $value) {
                    $resulting_array[] = [$value, 'selected' => false];
                }
            }
            return $resulting_array;

        } elseif ($assessment->appExists($app)) {

            if ($type == 'textarea') {
                return $answer[0]['textarea'];
            } elseif ($type == 'number') {
                return $answer[0]['textarea'];
            } elseif ($type == 'radio-group') {
                foreach ($option_array as $value) {

                    if ($value['id'] == $answer[0]['_option']) {
                        $resulting_array[] = [$value, 'selected' => true];
                    } else {
                        $resulting_array[] = [$value, 'selected' => false];
                    }

                }
                return $resulting_array;
            }


        }

    }
}