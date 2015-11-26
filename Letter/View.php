<?php

class View
{

    /**
     * @param $file
     * @param array $data
     */
    public function render($file, array $data)
    {
        $file = $file . ".php";

        if (!file_exists($file)) die(sprintf('this file doesn\'t exists, %s', $file));
        ob_start();
        extract($data);
        include __DIR__ . '/' . $file;
        $content = ob_get_clean();

        include __DIR__ . '/views/layouts/master.php';
    }

}