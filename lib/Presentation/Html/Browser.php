<?php

/**
 * Class Browser
 */
class Browser
{
    /** @var string $path */
    public $path;

    /**
     * Browser constructor.
     */
    public function __construct()
    {
        $this->path = __DIR__ . '/../../../resources/views/';
    }

    /**
     * Show the view file specified in the $fileName
     *
     * @param string $fileName
     * @param mixed[] $variables
     */
    public function show($fileName, $variables=array()) {
        $viewPath = sprintf(
            $this->path . '%s.view.php',
            $fileName
        );
        extract($variables);
        include($viewPath);
    }
}
