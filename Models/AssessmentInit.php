<?php

namespace App\Models;
class AssessmentInit
{

    public function createAssessment($app)
    {
        $questions = new QuestionModel();
        $assessment = new AssessmentModel();
        $questionsArray = $questions->getAllQuestions();
        $data = array();
        $result = array();
        foreach ($questionsArray as $element) {
            $data = ['question' => $element['id'], '_option' => null, 'application' => $app, 'textarea' => null, 'note' => null, 'timestamp' => '2022-05-30 15:38:59.0'];
            $assessment->addRow($data);

        }


    }
}