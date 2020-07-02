<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */

class SendEmail extends REST_Controller {

  function __construct()
  {
    // Construct the parent class
    parent::__construct();
    $this->load->model('M_login');
    $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
    $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
    $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
  }

  function index_get()
  {
    $response = $this->M_login->all_login();
    $this->response($response);
  }

  public function checkemail_post()
  {
    $response = $this->M_login->getUser($this->post('id_user'));
    $this->response($response);
  }

  public function matchcode_post()
  {
    $response = $this->M_login->matching($this->post('token'), $this->post('email'));
    $this->response($response);
  }

  public function updatestatus_put()
  {
    $id_user = $this->put('id_user');
    $status = $this->put('status');
    $response = $this->M_login->update_status($id_user, $status);
    $this->response($response);
  }

  public function resendemail_post()
  {
    $email = $this->post('email');
    $response = $this->M_login->resend_email($email);

    $this->response($response);


    if($response){

      $this->load->library('ConfigEmail');
      $config = $this->configemail->config_email();
      // Load library email dan konfigurasinya
      $this->load->library('Email', $config);
      // Email dan nama pengirim
      $this->Email->from('admin@orenzlaundry.com', 'Orenz Laundry');
      // Email penerima
      $this->Email->to($email); // Ganti dengan email tujuan
      // Lampiran email, isi dengan url/path file
      // $this->Email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
      // Subject email
      $subject = 'Lupa Password | Orenz Laundry';
      $this->Email->subject($subject);
      // Isi email
      $this->db->where('email', $email);
      $get_user = $this->db->query("SELECT * FROM user WHERE email = '$email'")->row();
      $nama_user = $get_user->nama_user;
      $kode_token = $get_user->token;
      $pesan = 'Terimakasih telah mendaftar dan bergabung dengan kami! Mohon masukkan password akun anda yang baru untuk bisa login ke dalam aplikasi kami,<br> 
          Silahkan verifikasi email anda dengan kode dibawah ini.';
      $message = '';
      $this->load->library('LupaPassword');
      $message = $this->lupapassword->verifikasiakun($subject, $nama_user, $pesan, $kode_token, $email);
      $this->Email->message($message);
      // Tampilkan pesan sukses atau error
      $this->Email->send();

    }
  }
}