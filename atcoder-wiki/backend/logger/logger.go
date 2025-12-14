package logger

import (
	"log"
	"os"
)

var (
	AccessLogger   *log.Logger
	ErrorLogger    *log.Logger
	SecurityLogger *log.Logger
)

func Init() {
	accessFile, _ := os.OpenFile("logs/access.log", os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	errorFile, _ := os.OpenFile("logs/error.log", os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	securityFile, _ := os.OpenFile("logs/security.log", os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)

	AccessLogger = log.New(accessFile, "[ACCESS] ", log.Ldate|log.Ltime)
	ErrorLogger = log.New(errorFile, "[ERROR] ", log.Ldate|log.Ltime|log.Lshortfile)
	SecurityLogger = log.New(securityFile, "[SECURITY] ", log.Ldate|log.Ltime)
}
