package main

import "fmt"
import "net/url"
import "net/http"
import "sync"
import "flag"
import "os"
import "os/exec"
import "strings"

func post_req(host string, total *int, wg *sync.WaitGroup, vote_in string) {
	var target_host string
	if host == "" {
		target_host = "http://192.168.11.4/voting.php"
	} else {
		let := []string{"http://", host, "/voting.php"}
		target_host = strings.Join(let, "")
	}
	_, err := http.PostForm(target_host, url.Values{"vote": {vote_in}})
	if err != nil {
		fmt.Println(err)
		post_req(host, total, wg, vote_in)
	} else {
		*total++
		wg.Done()
	}
}

func sv_initialize(host string) {
	if host != "" {
		let := []string{"keyakko@", host}
		host = strings.Join(let, "")
		fmt.Println(host)
	} else {
		host = "user@192.168.11.4"
	}
	out, err := exec.Command("ssh", host, "'./erase.sh'").Output()
	if err != nil {
		fmt.Println(err)
		fmt.Println(out)
		fmt.Println("Error occured. Please check your server.")
		os.Exit(1)
	}
}

func main() {
	var wg sync.WaitGroup
	var vote_in string
//	var hostflag bool
	var host string
	var owner bool
	flag.BoolVar(&owner, "owner", false, "bool flag")
	flag.BoolVar(&owner, "o", false, "bool flag")
	flag.StringVar(&host, "h", "", "hostname")
//	flag.BoolVar(&hostflag, "h", false, "hostname")
	flag.Parse()
//	if hostflag {
//		host = flag.Arg(1)
//	} else {
//		host = ""
//	}
	
	if len(os.Args) < 2 {
		fmt.Println("使い方：./exec_command VOTE_NUMBER [-o] [--owner] [-h HOSTNAME]")
		os.Exit(1)
	} else if owner {
		sv_initialize(host)
		os.Exit(0)
	}
	
	fmt.Println(host)
	vote_in = os.Args[1]
	total := 0
	end := 50000
	for i := 0; i < end; i++ {
		wg.Add(1)
		go post_req(host, &total, &wg, vote_in)
		wg.Wait()
		fmt.Println(total)
	}
}
