<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        class Dashboard extends CI_Controller {

            public $data = array(
                'modul' => 'dashboard',
                'breadcrumb' => 'DASHBOARD',
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
                $this->load->model('dashboard_model');
            }

            public function index()
            {
                $id = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');
                $year = date('Y');

                $data['new'] = $this->dashboard_model->get_new_ticket($id,$id_departemen,$id_role,$year);
                $data['progress'] = $this->dashboard_model->get_progress_ticket($id,$id_departemen,$id_role,$year);
                $data['completed'] = $this->dashboard_model->get_completed_ticket($id,$id_departemen,$id_role,$year);
                $data['closed'] = $this->dashboard_model->get_closed_ticket($id,$id_departemen,$id_role,$year);
                $data['category'] = $this->dashboard_model->get_category_ticket($year,$id_departemen,$id_role);
                $data['history'] = $this->dashboard_model->get_history_ticket($year,$id_departemen,$id_role);
                $data['creator'] = $this->dashboard_model->get_creator_ticket($year,$id_departemen,$id_role);
                $data['recent'] = $this->dashboard_model->get_recent_ticket($id,$id_departemen,$id_role,$year);

                if($this->session->userdata('logged_in'))
                {
                    $data['isi'] = 'welcome_message';
                    $this->load->view('preview', $data, true);
                    $this->load->view('template/template', $this->data);
                }else{
                    redirect('login','refresh');
                } 
            }
        } 