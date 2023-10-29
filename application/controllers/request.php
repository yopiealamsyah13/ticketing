<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        class Request extends CI_Controller {

            public $data = array(
                'modul' => 'request',
                'breadcrumb' => 'REQUEST',
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
                $this->load->model('request_model');
            }

            public function index()
            {
                
                $name = $this->input->get('term');
                $per_page = abs($this->input->get('per_page'));
                $admin = $this->input->get('admin');
                $entity = $this->input->get('entity');
                $location = $this->input->get('location');
                $user = $this->input->get('user');
                $date = $this->input->get('date');
                $limit = 10;

                $tot = $this->request_model->all($name);
                $data['all']   = $this->request_model->limit($name, $limit, $per_page);
                $data['new']   = $this->request_model->get_request_new($name,$admin,$user,$entity,$location,$date);
                $data['process']   = $this->request_model->get_request_process($name,$admin,$user,$entity,$location,$date);
                $data['completed']   = $this->request_model->get_request_completed($name,$admin,$user,$entity,$location,$date);
                $data['closed']   = $this->request_model->get_request_closed($name,$admin,$user,$entity,$location,$date);
                $data['category'] = $this->request_model->get_request_category();
                $data['level'] = $this->request_model->get_request_level();
                $data['status'] = $this->request_model->get_request_status();
                $data['users'] = $this->request_model->get_users();
                $data['departemen'] = $this->request_model->get_departemen();
                $data['admin'] = $this->request_model->get_admin();
                $data['entity'] = $this->request_model->get_entity();
                $data['location'] = $this->request_model->get_location();
                $data['user'] = $this->request_model->get_user();

                if($this->session->userdata('logged_in'))
                {
                    $data['isi'] = 'request/list';
                    $this->load->view('preview', $data, true);
                    $this->load->view('template/template', $this->data);
                }
                else
                {
                    redirect('login','refresh');
                }

            }

            public function new_request_ticket()
            {
                $data = $this->request_model->get_request_ticket_ajax()->result();
                echo json_encode($data); 
            }

            public function add_ticket()
            {
                $id = $this->session->userdata('id');
                $id_company = $this->session->userdata('id_company');
                $user = $this->request_model->get_user_id($id);
                date_default_timezone_set('Asia/Jakarta');
                $today = date('Y-m-d H:i:s');
                $id_ticket = $this->ticket_id($id_company);

                //end upload image
                $data = array(
                    'id_ticket' =>$id_ticket,
                    'request_date' =>$today,
                    'id_request_level' => $this->input->post('id_request_level'),
                    'request_by' =>$id,
                    'id_company_area' => $user->row()->id_company_areas,
                    'id_company' => $user->row()->id_company,
                    'request_to' => $this->input->post('request_to'),
                    'id_location' =>$this->input->post('id_location'),
                    'id_request_category' =>$this->input->post('id_request_category'),
                    'request_subject' =>$this->input->post('request_subject'),
                    'request_description' =>$this->input->post('request_description'),
                    //'request_attachment' =>$new_name,
                    'id_request_status' => 1
                );
    
                $idr = $this->request_model->add_request($data);

                $data2 = array(
                    'id_request' => $idr,
                    'update_by' => $id,
                    'date_timeline' => $today,
                    'id_request_status' => 1,
                    'request_timeline_notes' => 'has created a new ticket.'
                );

                $this->send_email_new($idr);

                $this->request_model->add_request_timeline($data2);

                
                //upload image
                if(!empty($_FILES['request_attachment']['name']))
                {
                    $files = $_FILES;
                    $count = count($_FILES['request_attachment']['name']);
 
                    for ($i=0; $i < $count ; $i++) {
 
                        $_FILES['request_attachment']['name']     = $files['request_attachment']['name'][$i];
                        $_FILES['request_attachment']['type']     = $files['request_attachment']['type'][$i];
                        $_FILES['request_attachment']['tmp_name'] = $files['request_attachment']['tmp_name'][$i];
                        $_FILES['request_attachment']['error']    = $files['request_attachment']['error'][$i];
                        $_FILES['request_attachment']['size']     = $files['request_attachment']['size'][$i];

                        //upload file ke db_file
                        $config['upload_path']      = './myfile/';
                        $config['allowed_types']    = 'pdf|xlsx|xls|csv|doc|docx|jpg|jpeg|png';
                        $config['overwrite']        = false;
                        $config['max_size']         = 0;
                        $config['file_name']        = preg_replace('/[^a-zA-Z0-9.]/','',$files['request_attachment']['name'][$i]);
                

                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
 
                        if($this->upload->do_upload('request_attachment'))
                        {
                            $filedata = $this->upload->data();
                            $data3[$i]['id_request'] = $idr;
                            $data3[$i]['name_request_attachment'] = $filedata['file_name'];
                            $data3[$i]['id_request_status'] = 1;
                            $data3[$i]['date_request_attachment'] = $today;
                        }
                    }
                }
                
                if(!empty($data3))
                {
                    $this->request_model->insert_file($data3);
                }
    
                redirect('request');

            }

            //generate uniq code untuk item GA
            public function ticket_id($id_company)
            {
                $alias = $this->db->query("SELECT alias_company FROM db_companies WHERE id_company = $id_company ");
                $q = $this->db->query("SELECT MAX(RIGHT(id_ticket,5)) as kd_max FROM db_request WHERE id_company = $id_company");
                $kd = "";
                $code = str_replace(" ","",$alias->row()->alias_company);

                if($q->num_rows()>0)
                {
                    foreach($q->result() as $k){
                        $tmp = ((int)$k->kd_max)+1;
                        $kd = sprintf("%05s", $tmp);
                    }
                }else{
                    $kd = "00001";
                }

                $id = "T".'-'.$code.'-'.$kd;

                return $id;
            }

            public function view()
            {
                $id = $this->uri->segment(3);
                $id_user = $this->session->userdata('id');
                $id_departemen = $this->session->userdata('id_departemen');
                
                $request = $this->request_model->requestbyid($id)->row();
                if($id != '' && $id == $request->id_request){
                    if($id_departemen == $request->request_to || $id_user == $request->request_by ){

                    $data['view'] = $this->request_model->requestbyid($id);
                    $data['comment'] = $this->request_model->get_request_comment($id);
                    $data['timeline'] = $this->request_model->get_request_timeline($id);
                    $data['category'] = $this->request_model->get_request_category();
                    $data['level'] = $this->request_model->get_request_level();
                    $data['status'] = $this->request_model->get_request_status();
                    $data['users'] = $this->request_model->get_users();
                    $data['attachment'] = $this->request_model->get_attachment($id);
                    $data['departemen'] = $this->request_model->get_departemen();
                    $data['location'] = $this->request_model->get_location();

                        if($this->session->userdata('logged_in'))
                        {
                            $data['isi'] = 'request/view';
                            $this->load->view('preview', $data, true);
                            $this->load->view('template/template', $this->data);
                        }
                        else
                        {
                            redirect('login','refresh');
                        }
                    }else{
                        redirect('request');
                    }
                }else{
                    redirect('request');
                }

            }

            public function claim_ticket()
            {
                $id = $this->uri->segment(3);
                $id_user = $this->session->userdata('id');
                date_default_timezone_set('Asia/Jakarta');
                $today = date('Y-m-d H:i:s');
                $time = time();
                $cek = $this->request_model->requestbyid($id)->row();

                if($cek->handle_by == 0 && $id == $cek->id_request){

                    $period = $this->input->post('period');
                    $period_type = $this->input->post('period_type');

                    if($period_type == 1){
                        $estimation = date("Y-m-d H:i:s", strtotime("+".$period." hours",$time));
                    }else{
                        $estimation = date("Y-m-d H:i:s", strtotime("+".$period." days",$time));
                    }

                    $data = array(
                        'claim_date' => $today,
                        'estimation_time' => $estimation,
                        'handle_by' => $id_user,
                        'id_request_status' => 2,
                        'last_update_date' => $today
                    );

                    $this->request_model->update_request_ticket($id,$data);

                    $data2 = array(
                        'id_request' => $id,
                        'update_by' => $id_user,
                        'date_timeline' => $today,
                        'id_request_status' => 2,
                        'request_timeline_notes' => 'has claimed this ticket.'
                    );

                    $this->request_model->add_request_timeline($data2);
                }
                
                redirect('request/view/'.$id);
            }

            public function submit_ticket()
            {
                $id = $this->uri->segment(3);
                $id_user = $this->session->userdata('id');
                date_default_timezone_set('Asia/Jakarta');
                $today = date('Y-m-d H:i:s');
                $cek = $this->request_model->requestbyid($id)->row();

                if($cek->id_request_status == 2 && $id == $cek->id_request){
                    
                    $data = array(
                        'id_request_status' => 3,
                        'request_submit_notes' => $this->input->post('request_submit_notes'),
                        //'request_submit_attachment' => $new_name,
                        'last_update_date' => $today,
                        'completed_date' => $today
                    );

                    $this->request_model->update_request_ticket($id,$data);

                    
                    $data2 = array(
                        'id_request' => $id,
                        'id_request_status' => 3,
                        'id_user' => $id_user,
                        'note_comment' => $this->input->post('request_submit_notes'),
                        'date_comment' => $today
                    );
                    
                    $this->request_model->add_request_comment($data2);
                    
                    $data3 = array(
                        'id_request' => $id,
                        'update_by' => $id_user,
                        'date_timeline' => $today,
                        'id_request_status' => 3,
                        'request_timeline_notes' => "has completed this ticket."
                    );
                
                    $this->request_model->add_request_timeline($data3);

                    $this->send_email_submit($id);

                    if(!empty($_FILES['submit_attachment']['name']))
                    {
                        $files = $_FILES;
                        $count = count($_FILES['submit_attachment']['name']);
    
                        for ($i=0; $i < $count ; $i++) {
    
                            $_FILES['submit_attachment']['name']     = $files['submit_attachment']['name'][$i];
                            $_FILES['submit_attachment']['type']     = $files['submit_attachment']['type'][$i];
                            $_FILES['submit_attachment']['tmp_name'] = $files['submit_attachment']['tmp_name'][$i];
                            $_FILES['submit_attachment']['error']    = $files['submit_attachment']['error'][$i];
                            $_FILES['submit_attachment']['size']     = $files['submit_attachment']['size'][$i];

                            //upload file ke db_file
                            $config['upload_path']      = './myfile/';
                            $config['allowed_types']    = 'pdf|xlsx|xls|csv|doc|docx|jpg|jpeg|png';
                            $config['overwrite']        = false;
                            $config['max_size']         = 0;
                            $config['file_name']        = preg_replace('/[^a-zA-Z0-9.]/','',$files['submit_attachment']['name'][$i]);
                    

                            $this->load->library('upload',$config);
                            $this->upload->initialize($config);
    
                            if($this->upload->do_upload('submit_attachment'))
                            {
                                $filedata = $this->upload->data();
                                $data4[$i]['id_request'] = $id;
                                $data4[$i]['name_request_attachment'] = $filedata['file_name'];
                                $data4[$i]['id_request_status'] = 3;
                                $data4[$i]['date_request_attachment'] = $today;
                            }
                        }
                    }
                    
                    if(!empty($data4))
                    {
                        $this->request_model->insert_file($data4);
                    }
                }
                
                redirect('request/view/'.$id);
            }

            public function closed_ticket()
            {
                $id = $this->uri->segment(3);
                $id_user = $this->session->userdata('id');
                date_default_timezone_set('Asia/Jakarta');
                $today = date('Y-m-d H:i:s');
                $cek = $this->request_model->requestbyid($id)->row();

                if($id == $cek->id_request){

                    if($cek->id_request_status == 3){
                        $data = array(
                            'id_request_status' => 4,
                            'last_update_date' => $today,
                            'closed_date' => $today
                        );
                    }else if($cek->id_request_status == 2){
                        $data = array(
                            'id_request_status' => 4,
                            'last_update_date' => $today,
                            'completed_date' => $today,
                            'closed_date' => $today
                        );
                    }

                    $this->request_model->update_request_ticket($id,$data);

                    
                    $data2 = array(
                        'id_request' => $id,
                        'id_request_status' => 4,
                        'id_user' => $id_user,
                        'note_comment' => "Closed",
                        'date_comment' => $today
                    );
                    
                    $this->request_model->add_request_comment($data2);

                    
                    $data3 = array(
                        'id_request' => $id,
                        'update_by' => $id_user,
                        'date_timeline' => $today,
                        'id_request_status' => 4,
                        'request_timeline_notes' => "has closed this ticket."
                    );
                
                    $this->request_model->add_request_timeline($data3);
                }
                
                redirect('request/view/'.$id);
            }

            public function assignment_ticket()
            {
                $id = $this->uri->segment(3);
                $id_user = $this->session->userdata('id');
                $ids = $this->input->post('handle_by');
                $handle_by = $this->request_model->get_user_id($ids);
                
                date_default_timezone_set('Asia/Jakarta');
                $today = date('Y-m-d H:i:s');

                $data = array(
                    'handle_by' => $ids,
                    'id_request_status' => 2,
                    'last_update_date' => $today
                );

                $this->request_model->update_request_ticket($id,$data);

                $data2 = array(
                    'id_request' => $id,
                    'id_request_status' => 2,
                    'id_user' => $id_user,
                    'note_comment' => $this->input->post('notes'),
                    'date_comment' => $today
                );
                
                $this->request_model->add_request_comment($data2);

                
                $data3 = array(
                    'id_request' => $id,
                    'update_by' => $id_user,
                    'date_timeline' => $today,
                    'id_request_status' => 2,
                    'request_timeline_notes' => "Assigned this ticket to ".$handle_by->row()->name_user
                );
                
                $this->request_model->add_request_timeline($data3);

                $this->send_email_assign($id);
                
                redirect('request/view/'.$id);

            }
            
            public function edit_ticket()
            {
                $id = $this->uri->segment(3);
                $id_user = $this->session->userdata('id');
                date_default_timezone_set('Asia/Jakarta');
                $today = date('Y-m-d H:i:s');
                $cek = $this->request_model->requestbyid($id)->row();
                $handle_by = $this->request_model->get_user_id($id_user);

                
                $period = $this->input->post('period');
                $period_type = $this->input->post('period_type');
                $date = $cek->claim_date;
                $date1 = str_replace('-', '/', $date);

                if($period_type == 1){
                    $estimation = date("Y-m-d H:i:s", strtotime($date1."+".$period." hours"));
                }else{
                    $estimation = date("Y-m-d H:i:s", strtotime($date1."+".$period." days"));
                }

                $data = array(
                    'estimation_time' => $estimation,
                    'request_to' => $this->input->post('request_to'),
                    'id_request_level' => $this->input->post('id_request_level'),
                    'id_request_category' =>$this->input->post('id_request_category'),
                    'id_location' =>$this->input->post('id_location'),
                    'request_subject' =>$this->input->post('request_subject'),
                    'request_description' =>$this->input->post('request_description'),
                    'request_attachment' =>$attach_picture
                );

                $this->request_model->update_request_ticket($id,$data);
                
                $data2 = array(
                    'id_request' => $id,
                    'update_by' => $id_user,
                    'date_timeline' => $today,
                    'id_request_status' => 2,
                    'request_timeline_notes' => $handle_by->row()->name_user." edited this ticket",
                );
                
                $this->request_model->add_request_timeline($data2);

                
                //upload image
                if(!empty($_FILES['request_attachment']['name']))
                {
                    $files = $_FILES;
                    $count = count($_FILES['request_attachment']['name']);
 
                    for ($i=0; $i < $count ; $i++) {
 
                        $_FILES['request_attachment']['name']     = $files['request_attachment']['name'][$i];
                        $_FILES['request_attachment']['type']     = $files['request_attachment']['type'][$i];
                        $_FILES['request_attachment']['tmp_name'] = $files['request_attachment']['tmp_name'][$i];
                        $_FILES['request_attachment']['error']    = $files['request_attachment']['error'][$i];
                        $_FILES['request_attachment']['size']     = $files['request_attachment']['size'][$i];

                        //upload file ke db_file
                        $config['upload_path']      = './myfile/';
                        $config['allowed_types']    = 'pdf|xlsx|xls|csv|doc|docx|jpg|jpeg|png';
                        $config['overwrite']        = false;
                        $config['max_size']         = 0;
                        $config['file_name']        = preg_replace('/[^a-zA-Z0-9.]/','',$files['request_attachment']['name'][$i]);
                

                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
 
                        if($this->upload->do_upload('request_attachment'))
                        {
                            $filedata = $this->upload->data();
                            $data3[$i]['id_request'] = $id;
                            $data3[$i]['name_request_attachment'] = $filedata['file_name'];
                            $data3[$i]['id_request_status'] = 1;
                            $data3[$i]['date_request_attachment'] = $today;
                        }
                    }
                }
                
                if(!empty($data3))
                {
                    $this->request_model->insert_file($data3);
                }

                $this->send_email_edit($id);
                
                redirect('request/view/'.$id);
            }

            public function edit_ticket_submit()
            {
                $id = $this->uri->segment(3);
                $id_user = $this->session->userdata('id');
                date_default_timezone_set('Asia/Jakarta');
                $today = date('Y-m-d H:i:s');
                $cek = $this->request_model->requestbyid($id)->row();
                $id_ticket = $cek->id_ticket;

                $period = $this->input->post('period');
                $period_type = $this->input->post('period_type');
                $date = $cek->claim_date;
                $date1 = str_replace('-', '/', $date);

                if($period_type == 1){
                    $estimation = date("Y-m-d H:i:s", strtotime($date1."+".$period." hours"));
                }else{
                    $estimation = date("Y-m-d H:i:s", strtotime($date1."+".$period." days"));
                }
                
                $data = array(
                    'estimation_time' => $estimation,
                    'id_request_level' => $this->input->post('id_request_level'),
                    'request_subject' =>$this->input->post('request_subject'),
                    'id_location' =>$this->input->post('id_location'),
                    'id_request_status' =>$this->input->post('id_request_status'),
                    'request_submit_notes' =>$this->input->post('request_submit_notes'),
                    'request_description' =>$this->input->post('request_description'),
                    'last_update_date' =>$today
                );

                $this->request_model->update_request_ticket($id,$data);

                //upload image
                if(!empty($_FILES['request_attachment']['name']))
                {
                    $files = $_FILES;
                    $count = count($_FILES['request_attachment']['name']);
 
                    for ($i=0; $i < $count ; $i++) {
 
                        $_FILES['request_attachment']['name']     = $files['request_attachment']['name'][$i];
                        $_FILES['request_attachment']['type']     = $files['request_attachment']['type'][$i];
                        $_FILES['request_attachment']['tmp_name'] = $files['request_attachment']['tmp_name'][$i];
                        $_FILES['request_attachment']['error']    = $files['request_attachment']['error'][$i];
                        $_FILES['request_attachment']['size']     = $files['request_attachment']['size'][$i];

                        //upload file ke db_file
                        $config['upload_path']      = './myfile/';
                        $config['allowed_types']    = 'pdf|xlsx|xls|csv|doc|docx|jpg|jpeg|png';
                        $config['overwrite']        = false;
                        $config['max_size']         = 0;
                        $config['file_name']        = preg_replace('/[^a-zA-Z0-9.]/','',$files['request_attachment']['name'][$i]);
                

                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
 
                        if($this->upload->do_upload('request_attachment'))
                        {
                            $filedata = $this->upload->data();
                            $data3[$i]['id_request'] = $id;
                            $data3[$i]['name_request_attachment'] = $filedata['file_name'];
                            $data3[$i]['id_request_status'] = 1;
                            $data3[$i]['date_request_attachment'] = $today;
                        }
                    }
                }
                
                if(!empty($data3))
                {
                    $this->request_model->insert_file($data3);
                }

                $this->send_email_edit($id);
                
                redirect('request/view/'.$id);
            }

            public function add_comment()
            {
                $id = $this->uri->segment(3);
                $id_status = $this->uri->segment(4);
                $id_user = $this->session->userdata('id');
                date_default_timezone_set('Asia/Jakarta');
                $today = date('Y-m-d H:i:s');
                $cek = $this->request_model->requestbyid($id)->row();

                $data = array(
                    'id_request' => $id,
                    'id_request_status' => 2,
                    'id_user' => $id_user,
                    'note_comment' => $this->input->post('note_comment'),
                    'date_comment' => $today
                );

                $this->request_model->add_request_comment($data);

                $data2 = array(
                    'last_update_date' => $today
                );

                $this->request_model->update_request_ticket($id,$data2);

                if($cek->id_request_status != 1){
                    $this->send_email_comment($id,$id_user);
                }

                redirect('request/view/'.$id);
            }

            public function delete_request()
            {
                $id = $this->uri->segment(3);
                $cek = $this->request_model->get_attachment_by_id($id)->row();
                
                $link = $cek->name_request_attachment;
                $file = "./myfile/$link";
                unlink(FCPATH .$file);

                $this->request_model->delete_request($id);

                redirect('request');
            }

            public function delete_comment()
            {
                $id = $this->uri->segment(3);
                $idc = $this->uri->segment(4);

                $this->request_model->delete_comment($idc);

                redirect('request/view/'.$id);
            }
            
            public function delete_attachment()
            {
                $id = $this->uri->segment(3);
                $idr = $this->uri->segment(4);
                $cek = $this->request_model->get_attachment_by_id($id)->row();
                
                $link = $cek->name_request_attachment;
                $file = "./myfile/$link";
                unlink(FCPATH .$file);

                $this->request_model->delete_request_attachment($id);

                redirect('request/view/'.$idr);
            }
            
            //notif sidebar
            function total_pending_notif()
            {
                $data['data'] = $this->request_model->get_total_pending_notif();
                $this->load->view('template/total_request',$data);
            }

            function send_email_new($idr)
            {

                $cek = $this->request_model->requestbyid($idr);

                $this->data['data'] = $cek;

                if($cek->row()->request_to == 7){
                    $to_email = 'it@sefasgroup.com';
                }else if($cek->row()->request_to == 5){
                    $to_email = 'ga@sefasgroup.com';
                }

                $from_email = 'gideon.sirapanji@sefasgroup.com';
                $password = 'dkcbggcehkptpica';
                
                $subject = $cek->row()->name_user.' Create New Ticket - ['.$cek->row()->id_ticket.']';
                
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.googlemail.com',
                    'smtp_port' => 587,
                    'smtp_user' => $from_email,
                    'smtp_pass' => $password,
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8'
                );
                
                $this->load->library('email');

                $message = $this->load->view('template/email_new', $this->data, true);
        
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->email->from($from_email,$from_email);
                $this->email->to($to_email);
                $this->email->subject($subject);
                $this->email->message($message);

                if($this->email->send())
                {
                    return true;
                }else{
                    return false;
                }
            }

            
            function send_email_submit($id)
            {

                $cek = $this->request_model->requestbyid($id);

                $this->data['data'] = $cek;

                $to_email = $cek->row()->email_user;
                $subject = 'Ticket Number ['.$cek->row()->id_ticket.'] Completed';
                
                if($cek->row()->handle_by == 126){
                    $from_email = 'yopie.alamsyah@sefasgroup.com';
                    $password = 'nraxmxytqmhyzcpl';
                }else if($cek->row()->handle_by == 99){
                    $from_email = 'budi.setiawan@sefasgroup.com';
                    $password = 'vqfumuhflmyptwbg';
                }else if($cek->row()->handle_by == 1){
                    $from_email = 'gideon.sirapanji@sefasgroup.com';
                    $password = 'dkcbggcehkptpica';
                }else if($cek->row()->handle_by == 2){
                    $from_email = 'purwani.handayani@sefasgroup.com';
                    $password = 'xifdvogupmqyndes';
                }else if($cek->row()->handle_by == 419){
                    $from_email = 'margareth.paramita@sefasgroup.com';
                    $password = 'nfwquylzmkpolqqr';
                }else if($cek->row()->handle_by == 102){
                    $from_email = 'anindyatami@sefasgroup.com';
                    $password = 'dkcbggcehkptpica';
                }else if($cek->row()->handle_by == 131){
                    $from_email = 'muhammad.fajry@sefasgroup.com';
                    $password = 'dkcbggcehkptpica';
                }
                
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.googlemail.com',
                    'smtp_port' => 587,
                    'smtp_user' => $from_email,
                    'smtp_pass' => $password,
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8'
                );
                
                $this->load->library('email');

                $message = $this->load->view('template/email_completed', $this->data, true);
        
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->email->from($from_email,$from_email);
                $this->email->to($to_email);
                $this->email->subject($subject);
                $this->email->message($message);

                if($this->email->send())
                {
                    return true;
                }else{
                    return false;
                }
            }

            
            function send_email_comment($id,$id_user)
            {
                $cek = $this->request_model->requestbyid($id);

                $this->data['data'] = $cek;

                if($id_user == $cek->row()->handle_by){
                    $to_email = $cek->row()->email_user;
                    $subject = $cek->row()->user_handle.' Comment on Ticket - ['.$cek->row()->id_ticket.']';
                    $message = $this->load->view('template/email_comment_admin', $this->data, true);
                
                    if($cek->row()->handle_by == 126){
                        $from_email = 'yopie.alamsyah@sefasgroup.com';
                        $password = 'nraxmxytqmhyzcpl';
                    }else if($cek->row()->handle_by == 99){
                        $from_email = 'budi.setiawan@sefasgroup.com';
                        $password = 'vqfumuhflmyptwbg';
                    }else if($cek->row()->handle_by == 1){
                        $from_email = 'gideon.sirapanji@sefasgroup.com';
                        $password = 'dkcbggcehkptpica';
                    }else if($cek->row()->handle_by == 2){
                        $from_email = 'purwani.handayani@sefasgroup.com';
                        $password = 'xifdvogupmqyndes';
                    }else if($cek->row()->handle_by == 419){
                        $from_email = 'margareth.paramita@sefasgroup.com';
                        $password = 'nfwquylzmkpolqqr';
                    }else if($cek->row()->handle_by == 102){
                        $from_email = 'anindyatami@sefasgroup.com';
                        $password = 'dkcbggcehkptpica';
                    }else if($cek->row()->handle_by == 131){
                        $from_email = 'muhammad.fajry@sefasgroup.com';
                        $password = 'dkcbggcehkptpica';
                    }   

                }else{
                    $to_email = $cek->row()->email_handle_user;
                    $subject = $cek->row()->name_user.' Comment on Ticket - ['.$cek->row()->id_ticket.']';
                    $message = $this->load->view('template/email_comment_user', $this->data, true);
                    $from_email = 'gideon.sirapanji@sefasgroup.com';
                    $password = 'dkcbggcehkptpica';
                }

                
                
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.googlemail.com',
                    'smtp_port' => 587,
                    'smtp_user' => $from_email,
                    'smtp_pass' => $password,
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8'
                );
                
                $this->load->library('email');

                
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->email->from($from_email,$from_email);
                $this->email->to($to_email);
                $this->email->subject($subject);
                $this->email->message($message);

                if($this->email->send())
                {
                    return true;
                }else{
                    return false;
                }
            }

            public function get_category()
            {
                $id_departemen = $this->input->post('id_departemen');
                $data = $this->request_model->get_request_category_ajax($id_departemen)->result();
                echo json_encode($data); 
            }

            public function get_level()
            {
                $data = $this->request_model->get_request_level()->result();
                echo json_encode($data); 
            }

            public function get_departemen()
            {
                $data = $this->request_model->get_departemen()->result();
                echo json_encode($data); 
            }

            public function get_location()
            {
                $data = $this->request_model->get_location()->result();
                echo json_encode($data); 
            }

            function send_email_edit($id)
            {
                $id_user = $this->session->userdata('id');
                $cek = $this->request_model->requestbyid($id);
                $user = $this->request_model->get_user_id($id_user);

                $this->data['data'] = $cek;
                $this->data['user'] = $user;
                $this->data['id'] = $id_user;

                $from_email = 'gideon.sirapanji@sefasgroup.com';
                $password = 'dkcbggcehkptpica';
                
                if($id_user == $cek->row()->request_by){
                    $to_email = $cek->row()->email_handle_user;
                    $subject = $user->row()->user_handle.' Edit Ticket - ['.$cek->row()->id_ticket.']';
                }else{
                    $to_email = $cek->row()->email_user;
                    $subject = $user->row()->name_user.' Edit Ticket - ['.$cek->row()->id_ticket.']';
                }
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.googlemail.com',
                    'smtp_port' => 587,
                    'smtp_user' => $from_email,
                    'smtp_pass' => $password,
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8'
                );
                
                $this->load->library('email');

                $message = $this->load->view('template/email_edit', $this->data, true);
        
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->email->from($from_email,$from_email);
                $this->email->to($to_email);
                $this->email->subject($subject);
                $this->email->message($message);

                if($this->email->send())
                {
                    return true;
                }else{
                    return false;
                }
            }

            function send_email_assign($id)
            {
                $id_user = $this->session->userdata('id');
                $cek = $this->request_model->requestbyid($id);
                $user = $this->request_model->get_user_id($id_user);

                $this->data['data'] = $cek;
                $this->data['user'] = $user;
                $this->data['id'] = $id_user;

                $from_email = 'gideon.sirapanji@sefasgroup.com';
                $password = 'dkcbggcehkptpica';
                
                $to_email = $cek->row()->email_handle_user;
                $subject = $user->row()->name_user.' Assign Ticket - ['.$cek->row()->id_ticket.']';

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.googlemail.com',
                    'smtp_port' => 587,
                    'smtp_user' => $from_email,
                    'smtp_pass' => $password,
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8'
                );
                
                $this->load->library('email');

                $message = $this->load->view('template/email_assign', $this->data, true);
        
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->email->from($from_email,$from_email);
                $this->email->to($to_email);
                $this->email->subject($subject);
                $this->email->message($message);

                if($this->email->send())
                {
                    return true;
                }else{
                    return false;
                }
            }

            public function print_ticket()
            {
                $this->load->library('pdf');
                $id = $this->uri->segment(3);

                $data['view'] = $this->request_model->requestbyid($id);
                $data['comment'] = $this->request_model->get_request_comment($id);
                $data['timeline'] = $this->request_model->get_request_timeline($id);
                $data['category'] = $this->request_model->get_request_category();
                $data['level'] = $this->request_model->get_request_level();
                $data['status'] = $this->request_model->get_request_status();
                $data['users'] = $this->request_model->get_users();
                $data['attachment'] = $this->request_model->get_attachment($id);
                $data['departemen'] = $this->request_model->get_departemen();
                $data['location'] = $this->request_model->get_location();
                
                $html = $this->load->view('request/view_pdf', $data, true);
                $this->pdf->pdf_create($html,'PRINT_TICKET_'.$data['view']->row()->id_ticket.'.pdf');
            }
        }