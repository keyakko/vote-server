package main

import "fmt"
import "net/url"
import "net/http"
import "sync"

func post_req(total *int, wg *sync.WaitGroup) {
	_, err := http.PostForm("http://127.0.0.1/voting.php", url.Values{"vote": {"3"}})
	if err != nil {
		fmt.Println(err)
		post_req(total, wg)
	} else {
		*total++
		wg.Done()
	}
}

func main() {
	var wg sync.WaitGroup
	total := 0
	end := 50000
	for i := 0; i < end; i++ {
		wg.Add(1)
		go post_req(&total, &wg)
		wg.Wait()
		fmt.Println(total)
	}
}
