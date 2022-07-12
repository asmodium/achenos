<?php
 class ImgHandler{

    private function getUpdatePicture($username,$profilepic){
		$sql = "UPDATE usuarios SET profilepic=? WHERE username=?";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue($profilepic,$username);
		$result = $query->execute();
		return $result;
	}
    
    public function updatePicture($data){
		$username = $data['username'];
		$username = filter_var($username,FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_FLAG_STRIP_HIGH);
		$image_name = $_FILES['profilepic']['name'];
		$image_temp = $_FILES['profilepic']['tmp_name'];
		$exp = explode(".",$image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path = "img/profile/".$name;
		$allowed_ext = array("gif","jpg","jpeg","png");
		$profilepic = $image_name;
			if(in_array($end, $allowed_ext)){
				if(unlink("profile/".$username)){
					if(move_uploaded_file($image_temp, $path)){
						$result = $this->getUpdatePicture($username,$profilepic);
						}if ($result){
							$sql = "SELECT * FROM usuarios WHERE username=?";
							$query = $this->db->pdo->prepare($sql);
							$query->bindValue(1,$username);
							$query->execute();
							$sname1= $query->fetch(PDO::FETCH_OBJ);
							Session::set('profilepic',$sname1->profilepic);
							$msg = "<div class='alert alert-sucess'><strong>Imagem alterada com sucesso!</strong></div>";
							return $msg;
						} else {
							$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";
							return $msg;
						}
		}
	}

	}
 }