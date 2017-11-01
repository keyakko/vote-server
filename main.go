package main

import "fmt"
import "net/url"
import "net/http"

func post_req(total *int) {
	_, err := http.PostForm("http://127.0.0.1/voting.php", url.Values{"vote": {"1"}})
	if err != nil {
		fmt.Println(err)
	} else {
		*total++
	}
}

func main() {
	total := 0
	end := 1000000
	for i := 0; i < end; i++ {
		go post_req(&total)
		fmt.Println(total)
	}
	for ;total != end; {
		fmt.Println(total)
		continue;
	}
}
