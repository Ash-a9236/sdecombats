<?php

enum LoggerType {

    case INFORMATION;
    case SUCCESS;
    case WARNING;
    case ERROR;
    case OTHER;
    case UNDEFINED;
}

class Logger {

    public ?LoggerType $type;
    public ?string $log;


    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }

}


