<?php


class Controller {

    public static function loadView(string $path, array $data = null) {

        extract($data);

        $caminho = __DIR__ . "/../views/" . $path;

        if(file_exists($caminho)) {
            require $caminho;
        } else {
            print "Error";
        }
    }
}