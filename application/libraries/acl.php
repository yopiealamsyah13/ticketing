<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Acl
{
	public $error_message;
	private $u;
	private $r;

	public function __construct()
	{
		$this->ci =& get_instance();

		$this->u = new User();
		$this->r = new Role();
	}

	public function get_login($nik,$password)
	{
		$this->u->nik = $nik;
		$this->u->password = $password;
		if($this->u->login())
		{
			$this->ci->session->set_userdata('id',$this->u->id);
			$this->ci->session->set_userdata('id_role_ticket',$this->u->id_role_ticket);
			$this->ci->session->set_userdata('nik',$this->u->nik);
			$this->ci->session->set_userdata('id_company',$this->u->id_company);
			$this->ci->session->set_userdata('id_division',$this->u->id_division);
			$this->ci->session->set_userdata('id_departemen',$this->u->id_departemen);
			$this->ci->session->set_userdata('id_job_grade',$this->u->id_job_grade);
			$this->ci->session->set_userdata('id_position',$this->u->id_position);
			$this->ci->session->set_userdata('id_direktorat',$this->u->id_direktorat);
			$this->ci->session->set_userdata('logged_in',TRUE);
			return TRUE;
		}
		else
		{
			$this->error_message = $this->u->error->login;
			return FALSE;
		}
	}

	public function get_user()
	{
		if(!$this->ci->session->userdata('logged_in'))
		{
			return FALSE;
		}
		else
		{
			$this->u->get_by_id($this->ci->session->userdata('id'));
			$this->u->login($this->ci->session->userdata('name_user'));
			$this->u->login($this->ci->session->userdata('photo'));
			if($this->u->exists())
			{
				return $this->u;
			}
			else
			{
				return FALSE;
			}
		}
	}

	public function get_user_role()
	{
		if($this->get_user())
		{
			return $this->get_user()->role->get()->name;
		}
		else
		{
			return FALSE;
		}
	}

	public function get_user_permissions()
	{
		if($this->get_user())
		{
			return json_decode($this->get_user()->role->get()->permissions);
		}
		else
		{
			return FALSE;
		}
	}

	public function get_role_permissions($role)
	{
		if($this->get_user())
		{
			$roles = new StdClass();
			$this->r->where('name_role',$role);
			$this->r->get_iterated();
			if(!$this->r->exists())
			{
				return FALSE;
			}
			else
			{
				foreach($this->r as $role)
				{
					return json_decode($role->permissions);
				}
			}
		}
		else
		{
			return FALSE;
		}
	}

	public function get_role_id_permissions($role)
	{
		if($this->get_user())
		{
			$roles = new StdClass();
			$this->r->where('id',$role);
			$this->r->get_iterated();
			if(!$this->r->exists())
			{
				return FALSE;
			}
			else
			{
				foreach($this->r as $role)
				{
					return json_decode($role->permissions);
				}
			}
		}
		else
		{
			return FALSE;
		}
	}
}