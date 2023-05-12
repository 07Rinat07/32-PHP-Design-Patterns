<?php

interface Definer
{
    public function define($arg): string;
}
class Data
{
    private Definer $definer;
    private int|string|bool $arg;

    /**
     * @param bool|int|string $arg
     */
    public function setArg(bool|int|string $arg): void
    {
        $this->arg = $arg;
    }

    /**
     * @param Definer $definer
     */
    public function __construct(Definer $definer)
    {
        $this->definer = $definer;
    }
    public function executeStrategy(): string
    {
       return $this->definer->define($this->arg);
    }
}
class IntDefiner implements Definer
{

    public function define($arg): string
    {
        return $arg . ' from int strategy';
    }
}
class StringDefiner implements Definer
{

    public function define($arg): string
    {
        return $arg . ' from string strategy';
    }
}
class BoolDefiner implements Definer
{

    public function define($arg): string
    {
        return $arg . ' from bool strategy';
    }
}

$date = new  Data(new  IntDefiner());

$date->setArg('some arg for first');

var_dump($date->executeStrategy());