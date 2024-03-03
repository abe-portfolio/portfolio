package main

import (
	"fmt"
	"io"
	"log"
	"os"
)

func loggingSetting(logFile string) {
	// 0666 -> permission
	logfile, _ := os.OpenFile(logFile, os.O_RDWR|os.O_CREATE|os.O_APPEND, 0666)
	multiLogFile := io.MultiWriter(os.Stdout, logfile)
	log.SetFlags(log.Ldate | log.Ltime | log.Lshortfile)
	log.SetOutput(multiLogFile)
}

func main() {
	/*
		logging.setLevel(INFO) # この場合、INFO以上のログが出力。つまり、DEBUG以外は出力される
		logging.debug('') # 今回の場合、これは表示されない
		logging.info('')
		logging.warning('')
		logging.error('')
		logging.critical('')
	*/

	// goではloggingは最小限しかなく、サードパーティ製のライブラリを使うことが多い

	// test.logが作成される
	loggingSetting("test.lgo")

	_, err := os.Open("fdafdsafa")
	if err != nil {
		log.Fatalln("Exit", err)
	}

	log.Panicln("logging")
	log.Printf("%T %v", "test", "test")

	log.Fatalf("%T %v", "test", "test")
	log.Fatalln("error!")

	fmt.Println("ok!")
}
