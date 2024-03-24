package main

import (
	"fmt"
	"sync"
	"time"
)

type Counter struct {
	v   map[string]int
	mux sync.Mutex
}

func (c *Counter) Inc(key string) {
	// sync.Mutexに対応するフィールドmuxをLock()～Unlock()するまで、一方のgoroutineが更新する間は他のgoroutineが更新できないようになる
	c.mux.Lock()
	c.v[key]++
	c.mux.Unlock()
}

func (c *Counter) Value(key string) int {
	c.mux.Lock()
	// return より後に「c.mux.Unlock()」を記述すると構文エラーとなる
	defer c.mux.Unlock()
	return c.v[key]
}

func main() {
	// c := make(map[string]int)
	c := Counter{v: make(map[string]int)}
	go func() {
		for i := 0; i < 10; i++ {
			// c["Key"] += 1
			c.Inc("Key")
		}
	}()

	go func() {
		for i := 0; i < 10; i++ {
			// c["Key"] += 1
			c.Inc("Key")
		}
	}()

	time.Sleep(1 * time.Millisecond)
	fmt.Println(c, c.Value("Key"))
}
