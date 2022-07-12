<?php
Class Query{

    public function get_Setting($fieldId){
        $sql = 
            "SELECT * 
            FROM {{AttachmentFeild}} 
            WHERE id = :fieldId 
            AND status = '6'";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":fieldId", $fieldId, PDO::PARAM_STR);
        $result = $command->queryAll();
        return $result;
    }

    public function get_AttachmentId($tableName, $fieldName, $objId, $fieldId){
        $sql = 
            "SELECT * 
            FROM {$tableName} 
            WHERE $fieldName = :objId
            AND attachmentFeild_id =:fieldId";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":objId", $objId, PDO::PARAM_STR);
        $command->bindParam(":fieldId", $fieldId, PDO::PARAM_STR);
        $result = $command->queryAll();
        if(!$result){
            return false;
        }
        $attachment_id = $result[0]['attachment_id'];
        return $attachment_id;
    }

    public function insert_Attachment($folder){

            $user     = User::getCurrentUser();
            $datetime = date("Y-m-d H:i:s");

            $sql = 
                "INSERT INTO {{Attachment}}
                 VALUES(null, 1, null, null, :folder ,null, 6,  :user, :user, :datetime, :datetime, null)";
            $command = Yii::app()->db->createCommand($sql);
            $command->bindParam(":folder",   $folder, PDO::PARAM_STR);
            $command->bindParam(":user",     $user,   PDO::PARAM_STR);
            $command->bindParam(":datetime", $datetime, PDO::PARAM_STR);
            $command->execute();
            return true;
    }

    public function insert_Obj_to_Field($tableName, $objId, $fieldId, $attachment_id){

        $user     = User::getCurrentUser();
        $datetime = date("Y-m-d H:i:s");

        $sql = 
            "INSERT INTO {$tableName} 
            VALUES(null, :objId, :fieldId, :attm_id, :user, :user, :datetime, :datetime, null)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":objId",    $objId,   PDO::PARAM_STR);
        $command->bindParam(":fieldId",  $fieldId, PDO::PARAM_STR);
        $command->bindParam(":attm_id",  $attachment_id, PDO::PARAM_STR);
        $command->bindParam(":user",     $user,     PDO::PARAM_STR);
        $command->bindParam(":datetime", $datetime, PDO::PARAM_STR);
        $command->execute();
        return true;
    }

    public function insert_AttachmentItem($attachment_id, $filename, $org_name, $exd){

        $user     = User::getCurrentUser();
        $datetime = date("Y-m-d H:i:s");

        $sql = 
            "INSERT INTO AttachmentItem
             VALUES (null, :attchId, null, null, 1, :filename, :org_name, :exd, '6', 1000, :user, :user, :datetime, :datetime, null)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":attchId",  $attachment_id, PDO::PARAM_STR);
        $command->bindParam(":filename", $filename, PDO::PARAM_STR);
        $command->bindParam(":org_name", $org_name, PDO::PARAM_STR);
        $command->bindParam(":exd",      $exd, PDO::PARAM_STR);
        $command->bindParam(":user",     $user, PDO::PARAM_STR);
        $command->bindParam(":datetime", $datetime, PDO::PARAM_STR);
        $result = $command->execute();

        return true;        
    }
}
?>