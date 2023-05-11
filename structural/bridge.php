<?php

interface Formater
{
    public function format($str): string;
}
class SimpleText implements Formater
{

    public function format($str): string
    {
        return $str;
    }
}

class HTMLText implements Formater
{

    public function format($str): string
    {
        return "<p>$str</p>";
    }
}

abstract class BridgService
{
    public Formater $formater;

    /**
     * @param Formater $formater
     */
    public function __construct(Formater $formater)
    {
        $this->formater = $formater;
    }
    abstract public function getFormater($str): string;
}
class SimpleTextService extends BridgService
{

    public function getFormater($str): string
    {
        return $this->formater->format($str);
    }
}
class HTMLTextService extends BridgService
{

    public function getFormater($str): string
    {
       return $this->formater->format($str);
    }
}

$simpleText = new SimpleText();
$htmlText = new HTMLText();


$simpleTextService = new SimpleTextService($simpleText);
$htmlTextService = new HTMLTextService($htmlText);

var_dump($simpleTextService->getFormater('Hello'));
var_dump($htmlTextService->getFormater('Hello Bro'));