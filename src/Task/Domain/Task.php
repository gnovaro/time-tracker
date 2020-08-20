<?php

declare(strict_types = 1);

namespace TimeTracker\Task\Domain;

use TimeTracker\Task\Domain\ValueObjects\EndTime;
use TimeTracker\Task\Domain\ValueObjects\StartTime;
use TimeTracker\Task\Domain\ValueObjects\TaskId;
use TimeTracker\Task\Domain\ValueObjects\TaskName;
use TimeTracker\Task\Domain\ValueObjects\TaskStatus;

class Task
{

    private $id;
    private $name;
    private $startTime;
    private $endTime;
    private $status;

    public function __construct(TaskId $id, TaskName $name, StartTime $startTime, EndTime $endTime, TaskStatus $status)
    {
        $this->id        = $id;
        $this->name      = $name;
        $this->startTime = $startTime;
        $this->endTime   = $endTime;
        $this->status    = $status;
    }

    public static function create(TaskId $id, TaskName $name): Task
    {
        return new self(
            $id,
            $name,
            new StartTime(null),
            new EndTime(null),
            new TaskStatus('initialized')
        );
    }

    public function id(): TaskId
    {
        return $this->id;
    }

    public function name(): TaskName
    {
        return $this->name;
    }

    public function startTime(): StartTime
    {
        return $this->startTime;
    }

    public function endTime(): EndTime
    {
        return $this->endTime;
    }

    public function status(): TaskStatus
    {
        return $this->status;
    }

    public function toArray()
    {
        return [
            'id' => $this->id()->value(),
            'name' => $this->name()->value(),
            'startTime' => $this->startTime()->value(),
            'endTime' => $this->endTime()->value(),
            'status' => $this->status()->value()
        ];
    }

}
