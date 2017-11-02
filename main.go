package main

import "fmt"
import "net/url"
import "net/http"
import "time"

func post_req(total *int) {
	_, err := http.PostForm("http://127.0.0.1/voting.php", url.Values{"vote": {"1"}})
	if err != nil {
		fmt.Println(err)
		post_req(total)
	} else {
		*total++
	}
}

func main() {
	total := 0
	end := 50000
	for i := 0; i < end; i++ {
		go post_req(&total)
		fmt.Println(total)
		time.Sleep(100)
	}
	for ;total != end; {
		fmt.Println(total)
		continue;
	}
}
