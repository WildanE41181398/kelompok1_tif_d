<?php

class M_Home extends CI_Model 
{
  public function getId()
  {
    return $this->db->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1");
  }

  public function getAllpromosi()
  {
    $this->db->where("status", "Aktif");
		$data = $this->db->get("promo")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }
  
  public function getUsermobile($id)
  {
    $this->db->where("id_user", $id);
		$data = $this->db->get("user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  public function auth_login($email, $password){
    $login = $this->db->get_where('user',array('email' => $email));
    if ($login->num_rows() > 0) {
        if(password_verify($password, $login->row()->password)){
            $response['status']=200;
            $response['error']=false;
            $response['data']=$login->result();
            $response['message']='success';   
        } else {
            $response['status']=502;
            $response['error']=true;
            $response['data']=null;
            $response['message']='Mungkin Email atau password salah';
        }
    } else {
      $response['status']=502;
      $response['error']=true;
      $response['data']=null;
      $response['message']='Email atau password salah';
    }
    return $response;
  }

  public function add_login($id, $nama,$email,$password){

    if(empty($nama) || empty($email) || empty($password)){
      return $this->empty_response();
    }else{
      $data = array(
        "id_user" => $id,
        "nama_user"=>$nama,
        "email"=>$email,
        "password"=>$password
      );

      $this->db->where('email',$email);
      $check = $this->db->get('user');
      if ($check->num_rows() < 1){
          $insert = $this->db->insert("user", $data);
          if($insert){
            $response['status']=200;
            $response['error']=false;
            $response['message']='Data login berhasil ditambahkan.';
          }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data login gagal ditambahkan.';
          }
      } else {
          $response['status']=502;
          $response['error']=true;
          $response['message']='Email sudah didaftarkan!.';
      }
      return $response;
    }
  }
}