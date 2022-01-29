<?php

    define("LINK", "https://covid-api.mmediagroup.fr/v1/");

    class covid19{

        public function countryList(){
            $curl = curl_init(LINK."cases");
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 0
            ]);
            $datas = curl_exec($curl);
            if ($datas === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) 
            {
                return null;
            } 
            $datas = json_decode($datas, true);
            $results = [];
            foreach ($datas as $key => $data){
                $results [] = $key;
            }

            return $results;
        }

        public function civCase(){
            $curl = curl_init(LINK."cases?country=".urlencode("Cote d'Ivoire"));
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 3
            ]);
            $datas = curl_exec($curl);
            $results = [];
            $datas = json_decode($datas, true);
            foreach ($datas as $data){
                $results [] = [
                    "country" =>$data['country'],
                    "population" =>$data['population'],
                    "confirmed" =>$data['confirmed'],
                    "deaths" =>$data['deaths'],
                    "updated" =>$data['updated']
                ];
            }

            return $results;
        }
        
        public function globalCase(){
            $curl = curl_init(LINK."cases");
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 0
            ]);
            $datas = curl_exec($curl);
            if ($datas === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) 
            {
                return null;
            } 
            $datas = json_decode($datas, true);
            $results = [];
            foreach ($datas['Global'] as $data){
                $results [] = [
                    "population" =>$data['population'],
                    "confirmed" =>$data['confirmed'],
                    "deaths" =>$data['deaths']
                ];
            }

            return $results;
        }

        public function countryCase(string $country){
            $curl = curl_init(LINK."cases?country=".urlencode($country));
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 3
            ]);
            $datas = curl_exec($curl);
            $results = [];
            $datas = json_decode($datas, true);
            foreach ($datas as $data){
                $results [] = [
                    "country" =>$data['country'],
                    "population" =>$data['population'],
                    "confirmed" =>$data['confirmed'],
                    "deaths" =>$data['deaths'],
                    "updated" =>$data['updated']
                ];
            }

            return $results;
        }

        public function continentCase(string $continent){

        }

        public function history(string $country){

        }

        public function civVaccine(){
            $curl = curl_init(LINK."vaccines?country=".urlencode("Cote d'Ivoire"));
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 3
            ]);
            $datas = curl_exec($curl);
            $results = [];
            $datas = json_decode($datas, true);
            foreach ($datas as $data){
                $results [] = [
                    "country" =>$data['country'],
                    "administered" =>$data['administered'],
                    "vaccined" =>$data['people_vaccinated'],
                    "updated" =>$data['updated']
                ];
            }

            return $results;
        }

        public function globalVaccine(){
            $curl = curl_init(LINK."vaccines");
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 0
            ]);
            $datas = curl_exec($curl);
            if ($datas === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) 
            {
                return null;
            } 
            $datas = json_decode($datas, true);
            $results = [];
            foreach ($datas['Global'] as$key => $data){
                $results [] = [
                    "population" =>$data['population'],
                    "vaccined" =>$data['people_vaccinated'],
                    "administered" =>$data['administered'],
                ];
            }

            return $results;
        }

        public function countryVaccine(string $country){
            $curl = curl_init(LINK."vaccines?country=".$country);
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 3
            ]);
            $datas = curl_exec($curl);
            $results = [];
            $datas = json_decode($datas, true);
            foreach ($datas as $data){
                $results [] = [
                    "country" =>$data['country'],
                    "administered" =>$data['administered'],
                    "vaccined" =>$data['people_vaccinated'],
                    "updated" =>$data['updated']
                ];
            }

            return $results;
        }

    }