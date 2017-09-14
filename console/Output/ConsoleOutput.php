<?php

namespace Console\Output;


class ConsoleOutput implements OutputInterface
{
    private $stream;

    public function __construct()
    {
        $this->stream = $this->openOutputStream();
    }


    /**
     * Gets the stream attached to this StreamOutput instance.
     *
     * @return resource A stream resource
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * @return resource
     */
    private function openOutputStream()
    {
        return @fopen('php://stdout', 'w') ?: fopen('php://output', 'w');
    }

    /**
     * Writes a string to the output.
     *
     * @param string $message
     * @param $newline
     */
    protected function doWrite(string $message, $newline)
    {
        if (false === @fwrite($this->stream, $message) || ($newline && (false === @fwrite($this->stream, PHP_EOL)))) {
            // should never happen
            throw new \RuntimeException('Unable to write output.');
        }

        fflush($this->stream);
    }

    /**
     * {@inheritdoc}
     */
    public function write($messages, $newline = false)
    {
        $messages = (array) $messages;

        foreach ($messages as $message) {
            $this->doWrite($message, $newline);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function writeln($messages)
    {
        $this->write($messages, true);
    }
}