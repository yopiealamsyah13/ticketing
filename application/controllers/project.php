<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        class Request extends CI_Controller {

            public $data = array(
                'modul' => 'project',
                'breadcrumb' => 'PROJECT',
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
                $this->load->model('project_model');
            }

            public function index()
            {
                $data['all']   = $this->project_model->all_project();

                if($this->session->userdata('logged_in'))
                {
                    $data['isi'] = 'project/list';
                    $this->load->view('preview', $data, true);
                    $this->load->view('template/template', $this->data);
                }
                else
                {
                    redirect('login','refresh');
                }
            }
        }