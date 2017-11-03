package main

import "fmt"
import "net/url"
import "net/http"
import "sync"
import "flag"
import "os"
import "os/exec"

func post_req(total *int, wg *sync.WaitGroup, vote_in string) {
	_, err := http.PostForm("http://127.0.0.1/voting.php", url.Values{"vote": {vote_in}})
	if err != nil {
		fmt.Println(err)
		post_req(total, wg, vote_in)
	} else {
		*total++
		wg.Done()
	}
}

func sv_initialize() {
	err := exec.Command("ssh", "user@127.0.0.1", "'mysql -uroot -proot < /var/www/html/vote-server/reset.sql'").Run()
	if err != nil {
		fmt.Println("Error occured. Please check your server.")
		os.Exit(1)
	}
}

func main() {
	var wg sync.WaitGroup
	var vote_in string
	var owner bool
	flag.BoolVar(&owner, "owner", false, "bool flag")
	flag.BoolVar(&owner, "o", false, "bool flag")

	if len(os.Args) != 2 {
		fmt.Println("使い方：./exec_command VOTE_NUMBER [-o] [--owner] [-h HOSTNAME]")
		os.Exit(1)
	} else if owner {
		sv_initialize()
		os.Exit(0)
	}
	
	vote_in = os.Args[1]
	total := 0
	end := 50000
	for i := 0; i < end; i++ {
		wg.Add(1)
		go post_req(&total, &wg, vote_in)
		wg.Wait()
		fmt.Println(total)
	}
}
