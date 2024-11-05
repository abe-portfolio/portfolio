//

package main

import (
	"fmt"

	"gopkg.in/ini.v1"
)

type ConfigList struct {
	Port      int
	DbName    string
	SQLDriver string
}

var Config ConfigList

// init()はmain()より先に実行される
func init() {
	cfg, _ := ini.Load("config.ini")
	// .MustInt()、.MustString()、.String()は、gopkg.in/ini.v1パッケージのKey型のメソッド
	//    ->.MustInt()   ：キーが存在する場合、その値を整数として返し、キーが存在しない場合や値が整数でない場合は、デフォルト値（0）を返す。
	//    ->.MustString()：キーが存在する場合、その値を文字列として返し、キーが存在しない場合は、デフォルト値（指定された文字列）を返す。
	//    ->.String()    ：キーの値を文字列として返し、キーが存在しない場合は空文字列を返す。
	Config = ConfigList{
		Port:      cfg.Section("web").Key("port").MustInt(),
		DbName:    cfg.Section("db").Key("name").MustString("does not exist."),
		SQLDriver: cfg.Section("db").Key("driver").String(),
	}
}

func main() {
	fmt.Printf("%T %v\n", Config.Port, Config.Port)
	fmt.Printf("%T %v\n", Config.DbName, Config.DbName)
	fmt.Printf("%T %v\n", Config.SQLDriver, Config.SQLDriver)
}
