<?php
Class FilesControl{

    public $baseDir;
    public $files;
    public $filename_arr = array();
    public $setting = array();


    function __construct(){
        $this->files = UHelper::getfileArray();
    }

    public function setBaseDir($dir){
        if(!file_exists($dir)){
            return UHelper::exitError('Base-directory is not exists.');
        }
        $this->baseDir = $dir;
        return true;
    }

    function setSetting($fieldId){

        $result = Query::get_Setting($fieldId);

        if(!$result){
            return UHelper::exitError('AttachmentFeild not found.');
        }

        $this->setting['allowed_ext'] = explode(',' ,$result[0]['allowed_ext']);
        $this->setting['maxFileSize'] = $result[0]['maxFileSize'];
        $this->setting['maxFileNum'] = $result[0]['maxFileNum'];
        $this->setting['path'] = $this->baseDir.'/'.$result[0]['folder'].'/';
        return;
    }

    function checkDir(){
        $dir = $this->setting['path'];
        //create directory if not exists
        if(!file_exists($dir)){
            if(!mkdir($dir)){
                UHelper::exitError('Fail when create directory.');
            }
        }
        return true;
    }

    function loadFiles(){
        $new_obj_arr = array();
        foreach ($this->files as $itemData) {
            $this->checkFile($itemData);
            $file = new File;
            $file->loadFile($itemData);
            array_push($new_obj_arr, $file);
        }
        $this->files = $new_obj_arr;
        return true;
    }

    function checkFile($file){
        $allowed_ext = $this->setting['allowed_ext'];
        $exd = UHelper::get_extension($file['name']);
        if( $file['error'] !== 0){
            return UHelper::exitError('Something went wrong with your upload.');
        }
        if(!in_array($exd, $allowed_ext)){
            return UHelper::exitError('File format "'.$exd.'" is not allowed.');
        }
        return true;
    }

    /*-----------------------------------------------*/

    function renameFiles(){

        foreach ($this->files as $key => $file) {
            $exd = $file->fileType;
            do{
                $fileName = UHelper::randomString().'.'.$exd;
            }while( $this->fileNameIsRepeat($fileName) );
            $this->files[$key]->fileName= $fileName;
            array_push($this->filename_arr, $fileName);
        }
        return true;
    }

    function fileNameIsRepeat($fileName){
        if( file_exists($this->setting['path'].$fileName) ||
            in_array($fileName, $this->filename_arr)){
            return true;
        }else{
            return false;
        }
    }

    function saveFiles(){
        $dir = $this->setting['path'];
        foreach ($this->files as $file) {
            $tmp_name = $file->tmp_name;
            $path = $dir.$file->fileName;
            if(!move_uploaded_file($tmp_name, $path)){
                UHelper::exitError('Fail when saving file!');
            }
        }
        return true;
    }


    function makeThumbImage($max_w, $max_h){
        $dir = $this->setting['path'];
        foreach ($this->files as $file) {
            $fileName = $file->fileName;
            $path = $dir.$fileName;
            $exd  = $file->fileType;
            $image = $this->imageResize($path, $exd, $max_w, $max_h);
            $this->saveImage($image, $fileName, $exd);
        }
        return true;
    }

    /*-----------------------------------------------*/

    function imageResize($path, $exd, $max_w, $max_h){

        //load image as resource 
        $src_image= $this->loadImage($path, $exd);

        //Get the image size
        $src_w=ImageSX($src_image);
        $src_h=ImageSY($src_image);
        $s = UHelper::getNewSize($src_w, $src_h, $max_w, $max_h);
        $dst_w=$s['w'];
        $dst_h=$s['h'];

        //do the resize
        $dst_image=ImageCreateTrueColor($dst_w,$dst_h);
        imagecopyresampled($dst_image,$src_image,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);
        imagedestroy($src_image);

        return $dst_image;
    }

    function loadImage($path, $exd){
        switch ($exd) {
            case 'jpg':
            case 'jpeg':
                $image=imagecreatefromjpeg($path);
                break;
            case 'png':
                $image=imagecreatefrompng($path);
                break;
            case 'gif':
                $image=imagecreatefromgif($path);
                break;                
            default:
                UHelper::exitError('Image type not support.');
                break;
        }
        return $image;
    }

    function saveImage($image, $fileName, $exd){
        $folder = $this->setting['path'];
        $dst_path = UHelper::makeNewPath($folder, $fileName);
        switch ($exd) {
            case 'jpg':
            case 'jpeg':
                ImageJpeg($image,$dst_path,95);
                break;
            case 'png':
                Imagepng($image,$dst_path,0);
                break;                
            case 'gif':
                Imagegif($image,$dst_path);
                break;            
            default:
                UHelper::exitError('Image type not support.');
                break;
        }
        imagedestroy($image);
        return true;
    }
}
?>