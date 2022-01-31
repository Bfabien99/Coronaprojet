<?php

    class news{

        public function getNews()
        {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://newsapi.org/v2/everything?q=omicron&sortBy=publishedAt&language=en&apiKey=4d7bcb3eba9846b28fff75ceed87e35e&from=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 0,
            ));

            $datas = curl_exec($curl);
            if ($datas === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) 
            {
                return null;
            } 
            $results = [];
            $datas = json_decode($datas, true);
            foreach($datas["articles"] as $data){
                $results [] = [
                    "author" => $data["author"],
                    "title" => $data["title"],
                    "description" => $data["description"],
                    "link" => $data["url"],
                    "image" => $data["urlToImage"],
                ];
            }
            return $results;
        }

    }