<?php

namespace App\Models;

class Category
{
    public function BuildCategory($app, $id)
    {
        $question = new QuestionModel();
        $questionArray = $question->getQuestions($id);
        $qst = new Question();
        $result = array();

        foreach ($questionArray as $item) {
            $result[] = [[$item['id'], $item['question'], $item['type']], $qst->BuildQuestion($app, $item['id'], $item['type'])];
        }
        return $result;

    }


}