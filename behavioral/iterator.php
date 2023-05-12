<?php

class WorkerList
{
    private array $list = [];
    private int$index = 0;

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @param int $index
     */
    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }

    /**
     * @param array $list
     */
    public function setList(array $list): void
    {
        $this->list = $list;
    }
    public function getItem($key): ?Worker
    {
        if ($this->list[$key]) {
            return $key;
        }
        return null;
    }
    public function next()
    {
       if ($this->index < count($this->list) - 1) {
           $this->index++;
       }
    }
    public function prev()
    {
        if ($this->index !== 0) {
            $this->index--;
        }
    }
    public function getByIndex(): Worker
    {
        return $this->list[$this->index];
    }
}

class Worker
{
    private string $name = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

}

$worker = new Worker('Boris');
$worker2 = new Worker('Rinat');
$worker3 = new Worker('Alex');

$workerList = new WorkerList();
$workerList->setList([$worker, $worker2, $worker3]);

$workerList->next();
$workerList->next();

var_dump($workerList->getByIndex()->getName());

