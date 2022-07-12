<?php
require_once 'uhhelper.php'; require_once 'datamodel.php'; require_once 'filescontrol.php';
Class UploadHandeler{

    private $helper;
    private $files;
    private $dataModel;
    

    function __construct(){
        $this->helper    = new UHelper;
        $this->dataModel = new DataModel;
        $this->files     = new FilesControl;
    }

    public function init(){
        $this->helper->checkInput();
        $this->dataModel->setField();
        $this->dataModel->setObj();
        $this->files->setBaseDir('test_upload/');
        $this->files->setSetting($this->dataModel->fieldId);
        $this->files->checkDir();
        $this->files->loadfiles();
    }

    public function saveFiles(){
        $this->files->renameFiles();
        $this->files->saveFiles();
        $this->files->makeThumbImage(150,255);
    }

    public function insertDB(){
        $this->dataModel->loadData($this->files->files);
        $this->dataModel->insertDB();
        echo'<br>-----end-------<br>';
    }
}
?>