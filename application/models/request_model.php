<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      class Request_model extends CI_Model {

            public function __construct() {
                parent::__construct();
                $this->load->database();
                $this->otherdb = $this->load->database('otherdb', TRUE);
            }

            public function all($name)
            {
                $this->db->select('*');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                
                return $this->db->get();
            }

            public function limit($name, $limit, $per_page)
            {
                $this->db->select('a.id_request,a.id_ticket,a.request_date,d.name_user,request_subject,name_request_category,handle_by,name_request_status,h.name_user as user_handle');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('db_users h','a.handle_by=d.id','left');

                $this->db->limit($limit,$per_page);
                return $this->db->get();
            }

            
            public function get_request_new($name,$admin,$user,$entity,$location,$date)
            {
                $id_user = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');
                date_default_timezone_set('Asia/Jakarta');
                $dates = date("Y-m-d", strtotime($date));

                $this->db->select('a.id_request,a.id_ticket,a.request_date,a.id_request_category,a.id_request_level,a.id_request_status,d.name_user,request_subject,request_description,name_request_category,handle_by,name_request_status,name_request_level,a.request_by,request_attachment,d.photo,a.id_location,h.code_area as code_location');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('db_company_areas h','a.id_location=h.id_area');
                $this->db->where('a.id_request_status',1);

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

                if($name != '')
                {
                    $this->db->where('(a.id_ticket LIKE "%'.$name.'%" OR a.request_subject LIKE "%'.$name.'%" OR a.request_description LIKE "%'.$name.'%")');
                }
                
                if($admin != '')
                {
                    $this->db->where_in('a.handle_by',$admin);
                }

                if($entity != '')
                {
                    $this->db->where_in('a.id_company',$entity);
                }

                if($location != '')
                {
                    $this->db->where_in('a.id_location',$location);
                }

                if($user != '')
                {
                    $this->db->where_in('a.request_by',$user);
                }

                if($date != '')
                {
                    $this->db->like('a.request_date',$dates);
                }

                $this->db->order_by('a.request_date','DESC');
                return $this->db->get();
            }

            public function get_request_ticket_ajax()
            {
                $id_user = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');

                $this->db->select('a.id_request,a.id_ticket,a.request_date,a.id_request_category,a.id_request_level,a.id_request_status,d.name_user,request_subject,request_description,name_request_category,handle_by,name_request_status,name_request_level,a.request_by,request_attachment,d.photo,a.id_location,h.code_area as code_location');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('db_company_areas h','a.id_location=h.id_area');
                $this->db->where('a.id_request_status',1);

                if($id_role == 1)
                {
                    //$this->db->where('a.request_to',$id_departemen);
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

                $this->db->order_by('a.request_date','DESC');
                return $this->db->get();
            }
            
            public function get_request_process($name,$admin,$user,$entity,$location,$date)
            {
                $id_user = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');
                date_default_timezone_set('Asia/Jakarta');
                $dates = date("Y-m-d", strtotime($date));

                $this->db->select('a.id_request,a.id_ticket,a.request_date,d.name_user,request_subject,name_request_category,handle_by,name_request_status,name_request_level,h.name_user as user_handle,a.id_request_category,a.id_request_level,a.id_request_status,a.request_description,a.request_submit_notes,request_attachment,d.photo,i.code_area as code_location,h.color as color_handle');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('db_users h','a.handle_by=h.id');
                $this->db->join('db_company_areas i','a.id_location=i.id_area','left');
                $this->db->where('a.id_request_status',2);
                
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

                if($name != '')
                {
                    $this->db->where('(a.id_ticket LIKE "%'.$name.'%" OR a.request_subject LIKE "%'.$name.'%" OR a.request_description LIKE "%'.$name.'%")');
                }

                if($admin != '')
                {
                    $this->db->where_in('a.handle_by',$admin);
                }

                if($entity != '')
                {
                    $this->db->where_in('a.id_company',$entity);
                }

                if($location != '')
                {
                    $this->db->where_in('a.id_location',$location);
                }

                if($user != '')
                {
                    $this->db->where_in('a.request_by',$user);
                }

                if($date != '')
                {
                    $this->db->like('a.request_date',$dates);
                }

                $this->db->order_by('a.request_date','DESC');
                return $this->db->get();
            }

            
            public function get_request_completed($name,$admin,$user,$entity,$location,$date)
            {
                $id_user = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');
                date_default_timezone_set('Asia/Jakarta');
                $dates = date("Y-m-d", strtotime($date));

                $this->db->select('a.id_request,a.id_ticket,a.request_date,a.id_request_category,a.id_request_level,a.id_request_status,d.name_user,request_subject,request_description,name_request_category,handle_by,name_request_status,name_request_level,h.name_user as user_handle,a.request_submit_notes,request_by,request_attachment,d.photo,i.code_area as code_location,h.color as color_handle');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('db_users h','a.handle_by=h.id');
                $this->db->join('db_company_areas i','a.id_location=i.id_area','left');
                $this->db->where('a.id_request_status',3);
                
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

                if($name != '')
                {
                    $this->db->where('(a.id_ticket LIKE "%'.$name.'%" OR a.request_subject LIKE "%'.$name.'%" OR a.request_description LIKE "%'.$name.'%")');
                }

                if($admin != '')
                {
                    $this->db->where_in('a.handle_by',$admin);
                }

                if($entity != '')
                {
                    $this->db->where_in('a.id_company',$entity);
                }

                if($location != '')
                {
                    $this->db->where_in('a.id_location',$location);
                }

                if($user != '')
                {
                    $this->db->where_in('a.request_by',$user);
                }

                if($date != '')
                {
                    $this->db->like('a.request_date',$dates);
                }

                $this->db->order_by('a.completed_date','DESC');
                return $this->db->get();
            }


            public function get_request_closed($name,$admin,$user,$entity,$location,$date)
            {
                $id_user = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');
                date_default_timezone_set('Asia/Jakarta');
                $dates = date("Y-m-d", strtotime($date));

                $this->db->select('a.id_request,a.id_ticket,a.request_date,a.id_request_category,a.id_request_level,a.id_request_status,d.name_user,request_subject,request_description,name_request_category,handle_by,name_request_status,name_request_level,h.name_user as user_handle,a.request_submit_notes,request_by,d.photo,i.code_area as code_location,h.color as color_handle');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('db_users h','a.handle_by=h.id');
                $this->db->join('db_company_areas i','a.id_location=i.id_area','left');
                $this->db->where('a.id_request_status',4);
                
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

                if($name != '')
                {
                    $this->db->where('(a.id_ticket LIKE "%'.$name.'%" OR a.request_subject LIKE "%'.$name.'%" OR a.request_description LIKE "%'.$name.'%")');
                }

                if($admin != '')
                {
                    $this->db->where_in('a.handle_by',$admin);
                }

                if($entity != '')
                {
                    $this->db->where_in('a.id_company',$entity);
                }

                if($location != '')
                {
                    $this->db->where_in('a.id_location',$location);
                }

                if($user != '')
                {
                    $this->db->where_in('a.request_by',$user);
                }

                if($date != '')
                {
                    $this->db->like('a.request_date',$dates);
                }

                $this->db->order_by('a.closed_date','DESC');
                return $this->db->get();
            }

            public function get_request_category()
            {
                $this->db->select('*');
                $this->db->from('db_request_category');
                return $this->db->get();
            }

            
            public function get_request_category_ajax($id_departemen)
            {
                $this->db->select('*');
                $this->db->from('db_request_category');
                $this->db->where('id_departemen',$id_departemen);
                return $this->db->get();
            }


            public function get_request_level()
            {
                $this->db->select('*');
                $this->db->from('db_request_level');
                return $this->db->get();
            }

            public function get_departemen()
            {
                $this->otherdb->select('*');
                $this->otherdb->from('db_departemen a');
                $this->otherdb->join('db_division b','a.id_division=b.id_division');
                $this->otherdb->join('db_direktorat c','b.id_direktorat=c.id_direktorat');
                $this->otherdb->where('a.id_departemen',5);
                $this->otherdb->or_where('a.id_departemen',7);
                return $this->otherdb->get();
            }

            public function get_request_status()
            {
                $this->db->select('*');
                $this->db->from('db_request_status');
                return $this->db->get();
            }
            
            public function get_location()
            {
                $this->db->select('*');
                $this->db->from('db_company_areas');
                return $this->db->get();
            }


            public function get_user_id($id)
            {
                $this->db->select('*');
                $this->db->from('db_users');
                $this->db->where('id',$id);
                return $this->db->get();
            }

            public function add_request($data)
            {
                $this->db->insert('db_request',$data);
                $insert_id = $this->db->insert_id();
                return $insert_id;
            }

            
            public function add_request_pending($data)
            {
                $this->db->insert('db_request_pending',$data);
                $insert_id = $this->db->insert_id();
                return $insert_id;
            }
            
            
            public function add_request_comment($data)
            {
                $this->db->insert('db_request_comment',$data);
            }
            
            public function add_request_timeline($data)
            {
                $this->db->insert('db_request_timeline',$data);
            }

            public function requestbyid($id)
            {
                $this->db->select('a.id_request,a.id_ticket,a.request_date,a.request_to,a.id_company_area,a.id_location,d.name_user,request_subject,name_request_category,handle_by,name_request_status,h.name_user as user_handle,request_description,a.id_request_status,a.request_attachment,a.id_request_category,a.id_request_level,a.request_submit_notes,name_request_level,d.email as email_user,h.email as email_handle_user,request_by,d.photo,h.phone as phone_handle_user,d.phone as phone_requester,request_submit_attachment,a.estimation_time,a.claim_date,e.code_area,e.name_area,i.name_departemen');
                $this->db->from('db_request a');
                $this->db->join('db_request_level b','a.id_request_level=b.id_request_level');
                $this->db->join('db_request_status c','a.id_request_status=c.id_request_status');
                $this->db->join('db_users d','a.request_by=d.id');
                $this->db->join('db_company_areas e','a.id_company_area=e.id_area');
                $this->db->join('db_companies f','a.id_company=f.id_company');
                $this->db->join('db_request_category g','a.id_request_category=g.id_request_category');
                $this->db->join('db_users h','a.handle_by=h.id','left');
                $this->db->join('db_departemen i','a.request_to=i.id_departemen');
                $this->db->where('a.id_request',$id);
                return $this->db->get();
            }

            public function get_request_comment($id)
            {
                $this->db->select('*');
                $this->db->from('db_request_comment a');
                $this->db->join('db_request b','a.id_request=b.id_request');
                $this->db->join('db_users c','c.id=a.id_user');
                $this->db->where('a.id_request',$id);
                $this->db->order_by('a.date_comment','ASC');
                return $this->db->get();
            }

            public function get_request_timeline($id)
            {
                $this->db->select('*');
                $this->db->from('db_request_timeline a');
                $this->db->join('db_request b','a.id_request=b.id_request');
                $this->db->join('db_users c','c.id=a.update_by');
                $this->db->where('a.id_request',$id);
                $this->db->order_by('a.date_timeline','DESC');
                return $this->db->get();
            }

            public function update_request_ticket($id,$data)
            {
                $this->db->where('id_request',$id);
                $this->db->update('db_request',$data);
            }

            public function get_users()
            {
                $id_user = $this->session->userdata('id');
                $id_departemen = $this->session->userdata('id_departemen');

                $this->db->select('*');
                $this->db->from('db_users');
                $this->db->where('id_role_ticket !=',2);
                $this->db->where('id_departemen',$id_departemen);
                $this->db->where('id !=',$id_user);
                return $this->db->get();
            }
            
            function delete_request($id)
            {
                $this->db->where('id_request',$id);
                $this->db->delete('db_request');
                
                $this->db->where('id_request',$id);
                $this->db->delete('db_request_comment');

                $this->db->where('id_request',$id);
                $this->db->delete('db_request_timeline');
            }

            function delete_comment($idc)
            {
                $this->db->where('id_request_comment',$idc);
                $this->db->delete('db_request_comment');
            }

            
            function get_total_pending_notif()
            {
                $id_user = $this->session->userdata('id');
                $id_role = $this->session->userdata('id_role_ticket');
                $id_departemen = $this->session->userdata('id_departemen');

                $this->db->select('count(id_request) as total,month(request_date) as bulan,year(request_date) as tahun');
                $this->db->from('db_request');
                //$this->db->join('db_users b','a.request_by=b.id');
                
                if($id_role == 1)
                {
                    $this->db->where('(request_to ="'.$id_departemen.'" OR request_by ="'.$id_user.'")');
                    $this->db->where('id_request_status',1);
                }

                if($id_role == 2)
                {
                    $this->db->where('request_by',$id_user);
                    $this->db->where('id_request_status',1);
                }

                if($id_role == 3)
                {
                    $this->db->where('(request_to ="'.$id_departemen.'" OR request_by ="'.$id_user.'")');
                    $this->db->where('id_request_status',1);
                }

                return $this->db->get();
            }
            
            function insert_file($data)
            {
                  $this->db->insert_batch('db_request_attachment',$data);
            }

            function get_attachment($id)
            {
                $this->db->select('*');
                $this->db->from('db_request_attachment');
                $this->db->where('id_request',$id);
                return $this->db->get();
            }

            function get_attachment_by_id($id)
            {
                $this->db->select('*');
                $this->db->from('db_request_attachment');
                $this->db->where('id_request_attachment',$id);
                return $this->db->get();
            }

            function delete_request_attachment($id)
            {
                $this->db->where('id_request_attachment',$id);
                $this->db->delete('db_request_attachment');
            }

            public function get_admin()
            {
                $this->db->select('*');
                $this->db->from('db_users');
                $this->db->where('id_role_ticket !=',2);
                return $this->db->get();
            }

            public function get_entity()
            {
                $this->db->select('*');
                $this->db->from('db_companies');
                return $this->db->get();
            }

            public function get_user()
            {
                $this->db->select('*');
                $this->db->from('db_users');
                return $this->db->get();
            }

        }