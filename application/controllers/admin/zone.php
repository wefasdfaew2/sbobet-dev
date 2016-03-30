<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zone extends CI_Controller {

  private $page_data = array();

  function __construct()
  {
    parent::__construct();
    $this->load->library('Layouts');
    $this->load->library('ion_auth');
    $this->page_comoponent();
  }

  public function index()
  {
    if ($this->ion_auth->logged_in())
    {
      $this->layouts->set_title('Zone setting');

       
      $this->layouts->view('admin/zone/index', array(), 'admin');
    }else{
      redirect($this->config->item('base_url'), 'refresh');
    }

  }

  private function page_comoponent()
  {
    $this->layouts->add_layout_component('admin/_sidebar');
  }

}
