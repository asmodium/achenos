<?php
Class File{

    public $tmp_name;
    public $org_name;
    public $fileName;
    public $fileType;
    public $size;    

    function loadFile($row){
        $this->tmp_name = $row['tmp_name'];
        $this->org_name = $row['name'];
        $this->size  = $row['size'];
        $this->fileType = UHelper::get_extension($row['name']);
    }
}
?>