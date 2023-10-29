<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        class Account extends CI_Controller {

            public $data = array(
                'modul' => 'account',
                'breadcrumb' => 'ACCOUNT',
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
                $this->load->model('account_model');
            }

            public function index()
            {
                $id = $this->session->userdata('id');
                $data['data'] = $this->account_model->userbyid($id);
                $data['all_user'] = $this->account_model->all_user();

                if($this->session->userdata('logged_in'))
                {
                    $data['isi'] = 'account/view';
                    $this->load->view('preview', $data, true);
                    $this->load->view('template/template', $this->data);
                }
                else
                {
                    redirect('login','refresh');
                }
            }

            public function change_password()
            {
                
                $id = $this->session->userdata('id');
                $this->form_validation->set_rules('current_pass', 'Current Password', 'trim|required|xss_clean|callback_password_matches');
                $this->form_validation->set_rules('new_pass', 'New Password', 'required');
                $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'trim|min_length[6]|max_length[20]|required|matches[new_pass]|xss_clean');
                
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
                if ($this->form_validation->run() == FALSE)
                {
                      if($this->session->userdata('logged_in'))
                      {
                            $data['user'] = $this->account_model->userbyid($id);

                            $data['isi'] = 'change_password';
                            $this->load->view('preview', $data, true);
                            $this->load->view('template/template', $this->data); 
                      }
                      else
                      {
                            redirect('login','refresh');
                      } 
                }else{
                    $data = array(
                    'password' =>md5($this->input->post('confirm_pass')));
                    $this->account_model->update_users($data,$id);
                    redirect('account');
                }     
            }

            public function color()
            {
                $id = $this->session->userdata('id');

                if($this->session->userdata('logged_in'))
                {
                    $data['user'] = $this->account_model->userbyid($id);

                    $data['isi'] = 'change_color';
                    $this->load->view('preview', $data, true);
                    $this->load->view('template/template', $this->data); 
                }
                else
                {
                    redirect('login','refresh');
                } 
            }

            public function change_color()
            {
                $id = $this->session->userdata('id');

                $data = array(
                    'color' => $this->input->post('color')
                );

                $this->account_model->update_users($data,$id);
                redirect('account');
            }
        }
                