<?php
namespace App\Core;
use Twig_Environment;

class View
{
    protected $loader;
    protected $twig;
    public function render(string $filename, array $data)
    {
        extract($data);
        require_once __DIR__."/../views/".$filename.".php";
    }

    public function __construct($data = [])
    {
        $this->loader = new \Twig_Loader_Filesystem(APP_PATH.'views');
        $this->twig = new Twig_Environment($this->loader);
    }

    public function twigLoad(string $filename, array $data)
    {
        echo $this->twig->render($filename.".twig", $data);
    }
}