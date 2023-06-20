<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class MainTask extends Task
{
    public function mainAction()
    {
        echo 'This is the default task and the default action' . PHP_EOL;
    }
    public function reviewAction($id, $rating = 0)
    {
        $arr = [
            'id' => $id,
            'rating' => $rating
        ];
        $success = $this->mongo->rating->insertOne($arr);
        if ($success->getInsertedCount()) {
            echo "Review Has Been Uploaded" . PHP_EOL;
        }
    }
    public function displayAction()
    {
        $data = $this->mongo->rating->find();
        foreach ($data as $value) {
            echo "[ID: $value[id], Rating: $value[rating]]" . PHP_EOL;
        }
    }
}
