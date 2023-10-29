<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      class Request_model extends CI_Model {

            public function __construct() {
                parent::__construct();
                $this->load->database();
                $this->otherdb = $this->load->database('otherdb', TRUE);
            }

            public function all_project()
            {
                
            }
        }
