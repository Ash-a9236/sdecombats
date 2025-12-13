enum LoggerType {
    INFORMATION,
    SUCCESS,
    WARNING,
    ERROR,
    OTHER,
    UNDEFINED
}

class Logger {
    type : LoggerType;
    log : string;

    public constructor(type: LoggerType, log: string) {
        this.type = type;
        this.log = log;
    }

    public logFormatter (log : string) : string {
        return `${this.type} : ${log}`;
    }

    public getLoggerType () : LoggerType {
        return this.type;
    }

    public setLoggerType (newType : LoggerType) {
        this.type = newType;
    }

    public getLog () : string {
        return this.log;
    }

    public setLog (newLog : string) {
        this.log = newLog;
    }
}