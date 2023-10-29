<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      class Dashboard_model extends CI_Model {

            public function __construct() {
                parent::__construct();
                $this->load->database();
            }

            public function get_new_ticket($id,$id_departemen,$id_role)
            {
                $this->db->select('count(*) as total');
                $this->db->from('db_request a');
                $this->db->join('db_users b','a.request_by=b.id');
                $this->db->where('a.id_request_status',1);

                if($id_role == 1)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id.'")');
                }

                if($id_role == 2)
                {
                    $this->db->where('a.request_by',$id);
                }

                if($id_role == 3)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id.'")');

                }
                
                return $this->db->get();

            }

            
            public function get_progress_ticket($id,$id_departemen,$id_role)
            {
                $this->db->select('count(*) as total');
                $this->db->from('db_request a');
                $this->db->join('db_users b','a.request_by=b.id');
                $this->db->where('a.id_request_status',2);

                if($id_role == 1)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id.'")');
                }

                if($id_role == 2)
                {
                    $this->db->where('a.request_by',$id);
                }

                if($id_role == 3)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id.'")');
                }
                
                return $this->db->get();

            }
            
            public function get_completed_ticket($id,$id_departemen,$id_role)
            {
                $this->db->select('count(*) as total');
                $this->db->from('db_request a');
                $this->db->join('db_users b','a.request_by=b.id');
                $this->db->where('a.id_request_status',3);

                if($id_role == 1)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id.'")');
                }

                if($id_role == 2)
                {
                    $this->db->where('a.request_by',$id);
                }

                if($id_role == 3)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id.'")');

                }
                
                return $this->db->get();

            }

            public function get_closed_ticket($id,$id_departemen,$id_role)
            {
                $this->db->select('count(*) as total');
                $this->db->from('db_request a');
                $this->db->join('db_users b','a.request_by=b.id');
                $this->db->where('a.id_request_status',4);

                if($id_role == 1)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id.'")');
                }

                if($id_role == 2)
                {
                    $this->db->where('a.request_by',$id);
                }

                if($id_role == 3)
                {
                    $this->db->where('(a.request_to ="'.$id_departemen.'" OR a.request_by ="'.$id.'")');
                }
                
                return $this->db->get();
            }
            public function get_category_ticket($year,$id_departemen,$id_role)
            {
                //$this->db->select('b.name_request_category,count(a.id_request_category) as total');
                $this->db->select('b.name_request_category,count(*)/(select count(*) from db_request a join db_request_category b on a.id_request_category=b.id_request_category) * 100 as percent');
                $this->db->from('db_request a');
                $this->db->join('db_request_category b','a.id_request_category=b.id_request_category');

                if($id_role == 1)
                {
                    $this->db->where('b.id_departemen',$id_departemen);
                }

                $this->db->group_by('a.id_request_category');
                $this->db->order_by('count(a.id_request_category)','DESC');
                return $this->db->get();
            }

            public function get_history_ticket($year,$id_departemen,$id_role)
            {
                $this->db->select('month(request_date) as bulan,count(id_request) as total');
                $this->db->from('db_request');
                $this->db->where('year(request_date)',$year);

                if($id_role == 1)
                {
                    $this->db->where('request_to',$id_departemen);
                }

                $this->db->group_by('month(request_date)');
                return $this->db->get();
            }

            public function get_creator_ticket($year,$id_departemen,$id_role)
            {
                $this->db->select('b.name_user,count(a.id_request) as total');
                $this->db->from('db_request a');
                $this->db->join('db_users b','a.request_by=b.id');
                $this->db->group_by('a.request_by');
                $this->db->order_by('count(a.id_request)','DESC');

                if($id_role == 1)
                {
                    $this->db->where('a.request_to',$id_departemen);
                }

                $this->db->limit(5);
                return $this->db->get();
            }

            
            public function get_recent_ticket($id,$id_departemen,$id_role,$year)
            {
                $this->db->select('a.id_request,a.id_ticket,a.request_date,a.last_update_date,a.id_request_category,a.id_request_level,a.id_request_status,d.name_user,request_subject,request_description,name_request_category,handle_by,name_request_status,name_request_level,h.name_user as user_handle,a.request_submit_notes,request_by');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('db_users h','a.handle_by=h.id');
                $this->db->where('year(a.request_date)',$year);
                $this->db->order_by('a.id_request','DESC');
                $this->db->limit(10);
                
                if($id_role == 1)
                {
                    $this->db->where('a.request_to',$id_departemen);
                }

                if($id_role == 2)
                {
                    $this->db->where('a.request_by',$id);
                }

                if($id_role == 3)
                {
                    $this->db->where('a.request_to',$id_departemen);
                }

                return $this->db->get();
            }
        }