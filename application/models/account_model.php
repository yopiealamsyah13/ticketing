<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      class Account_model extends CI_Model {

            public function __construct() {
                parent::__construct();
                $this->load->database();
                $this->otherdb = $this->load->database('otherdb',TRUE); 
            }

            public function all_user()
            {
                $this->otherdb->select('*');
                $this->otherdb->from('db_users a');
                $this->otherdb->join('db_position b','a.id_position=b.id_position','left');
                $this->otherdb->join('db_company_areas c','a.id_company_areas=c.id_area','left');
                $this->otherdb->join('db_job_grade d','a.id_job_grade=d.id_job_grade','left');
                $this->otherdb->join('db_companies g','a.id_company=g.id_company','left');
                $this->otherdb->join('db_sbu h','a.id_sbu=h.id_sbu','left');
                $this->otherdb->join('db_direktorat i','a.id_direktorat=i.id_direktorat','left');
                $this->otherdb->join('db_division j','a.id_division=j.id_division','left');
                $this->otherdb->join('db_departemen k','a.id_departemen=k.id_departemen','left');
                $this->otherdb->join('db_section l','a.id_section=l.id_section','left');
                $this->otherdb->join('db_function m','a.id_function=m.id_function','left');
                $this->otherdb->join('db_kota n','a.id_kota=n.id_kota','left');
                return $this->otherdb->get();
            }

            public function userbyid($id)
            {
                $this->otherdb->select('*');
                $this->otherdb->from('db_users a');
                $this->otherdb->join('db_position b','a.id_position=b.id_position','left');
                $this->otherdb->join('db_company_areas c','a.id_company_areas=c.id_area','left');
                $this->otherdb->join('db_job_grade d','a.id_job_grade=d.id_job_grade','left');
                $this->otherdb->join('db_roles_users e','a.id=e.user_id','left');
                $this->otherdb->join('db_roles f','a.id=e.role_id','left');
                $this->otherdb->join('db_companies g','a.id_company=g.id_company','left');
                $this->otherdb->join('db_sbu h','a.id_sbu=h.id_sbu','left');
                $this->otherdb->join('db_direktorat i','a.id_direktorat=i.id_direktorat','left');
                $this->otherdb->join('db_division j','a.id_division=j.id_division','left');
                $this->otherdb->join('db_departemen k','a.id_departemen=k.id_departemen','left');
                $this->otherdb->join('db_section l','a.id_section=l.id_section','left');
                $this->otherdb->join('db_function m','a.id_function=m.id_function','left');
                $this->otherdb->join('db_kota n','a.id_kota=n.id_kota','left');
                $this->otherdb->where('a.id',$id);
                return $this->otherdb->get();
            }

            function update_users($data,$id)
            {
                $this->db->where('id',$id);
                $this->db->update('db_users',$data);

                $this->otherdb->where('id',$id);
                $this->otherdb->update('db_users',$data);
            }
        }