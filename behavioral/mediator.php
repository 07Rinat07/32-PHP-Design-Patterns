<?php
//
//interface Mediator
//{
//    public function getWorker();
//}
//abstract class Worker
//{
//    private string $name;
//
//    /**
//     * @param string $name
//     */
//    public function __construct(string $name)
//    {
//        $this->name = $name;
//    }
//    public function sayhello()
//    {
//        printf('Hello');
//    }
//    public function work(): string
//    {
//        return $this->name . ' is working';
//    }
//}
//class InfoBase
//{
//    public function printInfo(Worker $worker)
//    {
//        printf($worker->work());
//    }
//}
//class WorkInfoBaseMediator implements Mediator
//{
//    private Worker $worker;
//    private InfoBase $infoBase;
//
//    /**
//     * @param Worker $worker
//     * @param InfoBase $infoBase
//     */
//    public function __construct(Worker $worker, InfoBase $infoBase)
//    {
//        $this->worker = $worker;
//        $this->infoBase = $infoBase;
//    }
//
//    public function getWorker()
//    {
//        $this->infoBase->printInfo($this->worker);
//    }
//}
//class Developer extends Worker
//{
//
//}
//
//$developer = new  Developer('Boriska');
//$infoBase = new InfoBase();
//$workerInfoBaseMediator = new WorkInfoBaseMediator($developer, $infoBase);
//
//$workerInfoBaseMediator->getWorker();
//


