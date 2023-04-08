<?php
    
    use Illuminate\Http\Request;

    function active_link(string $name) {
        return $name;
    }

    function getImageUrl($image) {
        if ($image != ""){
            $imageURL = "http://konsol-stol.ru/{$image}";
            //$imageURL = "https://fakeimg.pl/300x300/7F7FFF/FFFFFF/?text={$image}&font=kelson";
        }
        else {
            $imageURL = "https://fakeimg.pl/300x300/EEEEEE/7F7F7F/?text=NO IMAGE&font=kelson";
        }
        return $imageURL;
    }

    function makeGestId() {
        $sessionId = session()->get('_token');

        $gest = DB::table('gests')
                ->where([['session_id', '=', "{$sessionId}"], ])
                ->select('order_hash')
                ->get();
        
        if (count($gest) == 0){
            $order_hash = str_random(30);
            DB::table('gests')->insert(['session_id' => $sessionId, 'order_hash' => $order_hash]);
        }
        else {
            $order_hash = $gest[0]->order_hash;
            if ($order_hash == "") {
                $order_hash = str_random(30);
            }
            
            DB::table('gests')
            ->where([['session_id', '=', "{$sessionId}"], ])
            ->update(['order_hash' => $order_hash]);
        }

        Config::set('session_id', $sessionId);
        Config::set('order_hash', $order_hash);

        echo "<script type='text/javascript'>window.session_id = '{$sessionId}';</script>";
    }

    function isLocalServer() {
        $server = strtolower($_SERVER['DOCUMENT_ROOT']);
        return (strpos($server, "ospanel") == false && $server != "") ? false : true;
    }

    function TranslitURL($text, $translit = 'ru_en') { 
        $RU['ru'] = array( 
            'Ё', 'Ж', 'Ц', 'Ч', 'Щ', 'Ш', 'Ы',  
            'Э', 'Ю', 'Я', 'ё', 'ж', 'ц', 'ч',  
            'ш', 'щ', 'ы', 'э', 'ю', 'я', 'А',  
            'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И',  
            'Й', 'К', 'Л', 'М', 'Н', 'О', 'П',  
            'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ъ',  
            'Ь', 'а', 'б', 'в', 'г', 'д', 'е',  
            'з', 'и', 'й', 'к', 'л', 'м', 'н',  
            'о', 'п', 'р', 'с', 'т', 'у', 'ф',  
            'х', 'ъ', 'ь', '/'
            ); 
    
        $EN['en'] = array( 
            "Yo", "Zh",  "Cz", "Ch", "Shh","Sh", "Y'",  
            "E'", "Yu",  "Ya", "yo", "zh", "cz", "ch",  
            "sh", "shh", "y'", "e'", "yu", "ya", "A",  
            "B" , "V" ,  "G",  "D",  "E",  "Z",  "I",  
            "J",  "K",   "L",  "M",  "N",  "O",  "P",  
            "R",  "S",   "T",  "U",  "F",  "Kh",  "''", 
            "'",  "a",   "b",  "v",  "g",  "d",  "e",  
            "z",  "i",   "j",  "k",  "l",  "m",  "n",   
            "o",  "p",   "r",  "s",  "t",  "u",  "f",   
            "h",  "''",  "'",  "-"
            ); 
        if($translit == 'en_ru') { 
            $t = str_replace($EN['en'], $RU['ru'], $text);
            $t = preg_replace('/(?<=[а-яё])Ь/u', 'ь', $t);
            $t = preg_replace('/(?<=[а-яё])Ъ/u', 'ъ', $t);
            } 
        else {
            $t = str_replace($RU['ru'], $EN['en'], $text);
            $t = preg_replace("/[\s]+/u", "-", $t); 
            $t = preg_replace("/[^a-z0-9_\-]/iu", "", $t);
            $t = strtolower($t);
            }
        return $t; 
    }

?>