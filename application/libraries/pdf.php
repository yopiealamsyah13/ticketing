<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf {
	function pdf_create($html, $filename='', $stream=TRUE){
	    require_once(APPPATH."third_party/dompdf/dompdf_config.inc.php");//Require Loader Class n Config
	    spl_autoload_register('DOMPDF_autoload');//Autoload Resource

	    ini_set("memory_limit", "999M");
		ini_set("max_execution_time", "999");

	    $dompdf = new DOMPDF();//Instansiasi
	    $dompdf->load_html($html);//Load HTML File untuk dirender
	    $dompdf->render();//Proses Rendering File

	    	if ($stream==TRUE) {
				$dompdf->stream($filename, array('Attachment'=>0));
	    	} else {
				$CI =& get_instance();
				$CI->load->helper('file');
			write_file($filename, $dompdf->output());//file name adalah ABSOLUTE PATH dari tempat menyimpan file PDF
	    	}
		}
	}