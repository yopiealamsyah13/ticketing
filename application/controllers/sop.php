<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        class Sop extends CI_Controller {

            public $data = array(
                'modul' => 'sop',
                'breadcrumb' => 'SOP',
                'pesan' => '',
                'pagination' => '',
                'tabel_data' => '',
                'main_view' => 'preview',
                'form_action' => '',
                'form_value' => ''
            );

            public function __construct()
            {
                parent::__construct();
                $this->load->model('sop_model');
            }

            public function index()
            {

                if($this->session->userdata('logged_in'))
                {
                    $data['isi'] = 'sop/list';
                    $this->load->view('preview', $data, true);
                    $this->load->view('template/template', $this->data);
                }
                else
                {
                    redirect('login','refresh');
                }
            }
        }