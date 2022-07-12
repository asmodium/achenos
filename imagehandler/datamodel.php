<?php
require_once 'query.php'; require_once 'uhhelper.php';
Class DataModel{

    public $baseDir;
    public $objName;
    public $objId ;
    public $fieldId;
    public $files;

    public $objType_arr = array(
        '1'=>'categoryItem',
        '2'=>'page',
        '3'=>'content'
    );

    public function setField(){
        if(!isset($_POST['attachmentField_id'])){
            return UHelper::exitError('Parameter missing.');
        }
        $this->fieldId = $_POST['attachmentField_id'];
        return true;
    }

    public function setObj(){
        $objType=$_POST['objType'];
        if(!isset($this->objType_arr[$objType])){
            return UHelper::exitError('Object type incorrect.');
        }    
        $name = $this->objType_arr[$objType];
        $idName = $name.'_id';
        if(!isset($_POST[$idName])){
            return UHelper::exitError('Parameter missing.');
        }

        $this->objName = $name;
        $this->objId = $_POST[$idName];

        return true;
    }

    /*-----------------------------*/

    public function loadData($fileData){
        $this->files = $fileData;
        return true;
    }

    public function insertDB(){
        $files    = $this->files;    
        $fieldId  = $this->fieldId;
        $objId    = $this->objId;
        $user     = User::getCurrentUser();
        $datetime = date("Y-m-d H:i:s");
        $tableName = ucfirst($this->objName).'AttachmentFeild_Value';
        $fieldName = $this->objName.'_id';

        /** Get $attachment_id if already have record **/
        $attachment_id = Query::get_AttachmentId($tableName, $fieldName, $objId, $fieldId);

        if(!$attachment_id){

            $folder = $this->setting['dir'];
            Query::insert_Attachment($folder);

            $attachment_id = Yii::app()->db->getLastInsertID();
            Query::insert_Obj_to_Field($tableName, $objId, $fieldId, $attachment_id);

        }

        foreach ($files as $file) {

            $filename = $file->fileName;
            $org_name = $file->org_name;
            $exd      =  $file->exd;

            // insert into AttachmentItem
            Query::insert_AttachmentItem($attachment_id, $filename, $org_name, $exd);
        }
    }
}
?>