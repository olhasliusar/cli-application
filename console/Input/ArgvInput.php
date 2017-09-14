<?php

namespace Console\Input;


class ArgvInput extends Input
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $argv = $_SERVER['argv'];

        # remove the application name
        array_shift($argv);

        $this->arguments = $argv;
    }
}