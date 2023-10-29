<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        class Report_model extends CI_Model {

            public function __construct() {
                parent::__construct();
                $this->load->database();
            }

            public function all($startdate,$enddate)
            {
                date_default_timezone_set('Asia/Jakarta');
                $id_user = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');

                $this->db->select('a.id_request,a.id_ticket,a.request_date,a.request_description,d.name_user,request_subject,name_request_category,handle_by,name_request_status,h.user_handle,alias_company,name_area,a.completed_date');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('(SELECT id as id_user,name_user as user_handle FROM db_users) h','a.handle_by=h.id_user');

                if($id_role == 1)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id_user.'")');
                }
                
                if($startdate!='' and $enddate!='')
                {
                    $date1 = date('Y-m-d', strtotime($startdate));
                    $date2 = date('Y-m-d', strtotime($enddate));
                    $this->db->where('a.request_date >=',$date1);
                    $this->db->where('a.request_date <=',$date2);
                }
                $this->db->order_by('a.id_request','DESC');
                return $this->db->get();
            }

            public function limit($limit,$per_page,$startdate,$enddate)
            {
                date_default_timezone_set('Asia/Jakarta');
                $id_user = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');

                $this->db->select('a.id_request,a.id_ticket,a.request_date,a.request_description,d.name_user,request_subject,name_request_category,handle_by,name_request_status,h.user_handle,alias_company,name_area,a.completed_date');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('(SELECT id as id_user,name_user as user_handle FROM db_users) h','a.handle_by=h.id_user');

                if($id_role == 1)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id_user.'")');
                }
                  
                if($id_role == 2)
                {
                    $this->db->where('a.request_by',$id_user);
                }

                if($id_role == 3)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id_user.'")');
                }

                if($startdate!='' and $enddate!='')
                {
                    $date1 = date('Y-m-d', strtotime($startdate));
                    $date2 = date('Y-m-d', strtotime($enddate));
                    $this->db->where('a.request_date >=',$date1);
                    $this->db->where('a.request_date <=',$date2);
                }
                
                $this->db->limit($limit,$per_page);
                $this->db->order_by('a.id_request','DESC');
                return $this->db->get();
            }
        
            public function report()
            {
                date_default_timezone_set('Asia/Jakarta');
                $id_user = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');

                $this->db->select('a.id_request,a.id_ticket,a.request_date,a.request_description,d.name_user,request_subject,name_request_category,handle_by,name_request_status,h.user_handle,alias_company,name_area,a.completed_date');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('(SELECT id as id_user,name_user as user_handle FROM db_users) h','a.handle_by=h.id_user');

                if($id_role == 1)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id_user.'")');
                }

                if($id_role == 2)
                {
                    $this->db->where('a.request_by',$id_user);
                }

                if($id_role == 3)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id_user.'")');
                }
                
                return $this->db->get();
            }
        }
