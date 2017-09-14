<?php

namespace Console\Output;


interface OutputInterface
{

    /**
     * Writes a message to the output.
     *
     * @param string|array $messages The message as an array of lines or a single string
     * @param bool         $newline  Whether to add a newline
     */
    public function write($messages, $newline = false);

    /**
     * Writes a message to the output and adds a newline at the end.
     *
     * @param string|array $messages The message as an array of lines of a single string
     */
    public function writeln($messages);
}