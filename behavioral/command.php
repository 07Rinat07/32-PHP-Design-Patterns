<?php

interface Command
{
    public function execute();
}

interface Undoable extends Command
{
    public function undo();
}

class Output
{
    private bool $isEnable = true;
    private string $body = '';

    public function enable()
    {
        $this->isEnable = true;
    }

    /**
     * @return bool
     */
    public function isEnable(): bool
    {
        return $this->isEnable;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    public function disable()
    {
        $this->isEnable = false;
    }

    public function write($str)
    {
        if ($this->isEnable) {
            $this->body = $str;
        }
    }
}

class Invoker
{
    private Command $command;

    /**
     * @return Command
     */
    public function getCommand(): Command
    {
        return $this->command;
    }

    /**
     * @param Command $command
     */

    public function run()
    {
        $this->command->execute();
    }
}

class Message implements Command
{
    private Output $output;

    /**
     * @param Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function execute()
    {
        $this->output->write('some string from execute');
    }
}

class ChangerStatus implements Undoable
{
    private Output $output;

    /**
     * @param Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function execute()
    {
        $this->output->enable();
    }

    public function undo()
    {
        $this->output->disable();
    }
}

$output = new Output();

$invoker = new Invoker();

$message = new Message($output);
$changerStatus = new ChangerStatus($output);
$changerStatus->undo();
$changerStatus->execute();
$message->execute();

var_dump($output->getBody());
//у нас есть какой то обьект на основе класса у которого способность выкл выполнение того или иного процесса которого хачу вызвать
