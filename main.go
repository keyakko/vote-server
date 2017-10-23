package main

import "fmt"
import "net/url"
import "net/http"

func post_req() {
	//いい感じに投げて？
//	//ちゃんとPOSTで投げるんやで
//	v := url.Values{}
//	v.Set(param_key, param_val)
	http.PostForm("http://localhost/voting.php", url.Values{"vote": {"fenecc"}})
}

func main() {
//	dist_url := "http://172.16.10.1/voting.php"
//	param_key := "vote"
//	param_val := "fenecc"
	end := 1000000
	for i := 0; i < end; i++ {
		go post_req()
		stat_code := "hoge"
		fmt.Println(stat_code)
	}
}