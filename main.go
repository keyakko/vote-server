package main

import "fmt"
import "net/url"
import "net/http"

func post_req(total *int) {
	http.PostForm("http://150.89.247.103/voting.php", url.Values{"vote": {"fenecc"}})
	*total++
	//fmt.Println(*total)
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
