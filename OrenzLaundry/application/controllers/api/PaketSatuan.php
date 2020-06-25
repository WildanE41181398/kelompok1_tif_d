<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class PaketSatuan extends REST_Controller {
    
  function __construct()
  {
      // Construct the parent class
      parent::__construct();
      $this->load->model('m_data_paket');
      $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
      $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
      $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
  }

  function index_get()
  {
    $response = $this->m_data_paket->getAllPaketSatuanMobile();
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data Paket Satuan tidak ditemukan!';
        $this->response($response);
    }
  }

}