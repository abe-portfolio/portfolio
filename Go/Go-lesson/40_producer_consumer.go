/*
Producer（生産者）とConsumer（消費者）の概念

	goroutineによって非同期で実行されている処理のうち、
	データを取ってきたり生成したりする処理を行う側がProducerで、
	Producerからチャネルを介して受け取ったデータを加工する処理を行う側がconsumer

consumerを呼び出す側で必ずチャネルをCloseする
*/
package main

import (
	"fmt"
	"sync"
)

func producer(ch chan int, i int) {
	ch <- i * 2
}

func consumer(ch chan int, wg *sync.WaitGroup) {
	for i := range ch {
		fmt.Println("process", i*1000)
		wg.Done()
	}
}

func main() {
	var wg sync.WaitGroup
	ch := make(chan int)

	// Producer
	for i := 0; i < 10; i++ {
		wg.Add(1)
		go producer(ch, i)
	}

	// Consumer
	go consumer(ch, &wg)
	wg.Wait()
	close(ch)
}
