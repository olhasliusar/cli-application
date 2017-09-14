<?php

namespace Console\Command;

use Console\Input\InputInterface;
use Console\Output\OutputInterface;

interface CommandInterface
{
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    public function run(InputInterface $input, OutputInterface $output);

    /**
     * Command name.
     *
     * @return string
     */
    public function getName():string;

    /**
     * Description of command.
     *
     * @return string
     */
    public function getDescription():string;
}