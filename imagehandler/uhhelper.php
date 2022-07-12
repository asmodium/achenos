<?php
Class UHelper{


    public function exitError($errorMsg){
        exit($errorMsg);
        return false;
    }

    public function checkInput(){
        if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
            UHelper::exitError('Wrong HTTP method.');
        }
        if(!array_key_exists('Upload',$_FILES)){
            UHelper::exitError('Something went wrong with your upload.');
        }
        return true;
    }

    public function getfileArray(){
        $new_arr = array();
        $files = $_FILES["Upload"];
        $num = count($files["name"]);
        for ($i=0; $i<$num ; $i++){
            $new_arr[$i] = array();
        }

        foreach ($files as $key => $row) {
            for ($i=0; $i<$num ; $i++){
                $new_arr[$i][$key] = $files[$key][$i];
            }        
        }
        return $new_arr;
    }

    public function get_extension($file_name){
        $ext = explode('.', $file_name);
        $ext = array_pop($ext);
        return strtolower($ext);
    }

    public function randomString() {
        $length = 5;
        $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWZYZ";

        $charactersNum = strlen($characters) ;     
        $string='';
        for ($p = 0; $p < $length; $p++){
            $string .= $characters[mt_rand(0, $charactersNum-1)];
        }
        return dechex(time()).strtolower($string);
    }

    public function getNewSize($w, $h, $max_w, $max_h){

        if($w <= $max_w && $h <= $max_h){
            $new_w = $w;
            $new_h = $h;
        }
        if($w > $max_w || $h > $max_h){
            $new_w = $max_w;
            $w_radio = $w / $new_w;
            $new_h = $h/$w_radio;
        }
        if($new_h > $max_h){
            $new_h = $max_h;
            $h_radio = $h / $new_h;
            $new_w = $w/$h_radio;
        }
        return array("w"=> $new_w, "h"=> $new_h);
    }

    public function makeNewPath($folder, $fileName){
        $pop = explode('.', $fileName);
        $fileName = $pop[0];
        $exd = $pop[1];

        $newPath = $folder.$fileName.'_s'.'.'.$exd;

        return $newPath;
    }
}
?>