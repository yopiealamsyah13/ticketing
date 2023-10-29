<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

        class Report extends CI_Controller {

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
                $this->load->model('report_model');
            }

            public function index()
            {
                $per_page = abs($this->input->get('per_page'));
                $limit = 10;
                $startdate = $this->input->get('startdate');
                $enddate = $this->input->get('enddate');

                $tot = $this->report_model->all($startdate,$enddate);
                $data['limit']   = $this->report_model->limit($limit,$per_page,$startdate,$enddate);
                $data['total']   = $this->report_model->all($startdate,$enddate);

                $pagination['page_query_string']  = TRUE;    
                $pagination['base_url']           = site_url().'report?startdate='.$startdate.'&enddate='.$enddate;
                $pagination['total_rows'] 	      = $tot->num_rows();
                $pagination['per_page']           = $limit;
                $pagination['uri_segment']        = $per_page;
                $pagination['num_links']          = 2;
                
                $pagination['full_tag_open'] = '<ul class="pagination">';
                $pagination['full_tag_close'] = '</ul>';
                
                $pagination['first_link'] = '<<';
                $pagination['first_tag_open'] = '<li class="prev page">';
                $pagination['first_tag_close'] = '</li>';
                
                $pagination['last_link'] = '>>';
                $pagination['last_tag_open'] = '<li class="next page">';
                $pagination['last_tag_close'] = '</li>';
                
                $pagination['next_link'] = '>';
                $pagination['next_tag_open'] = '<li class="next page">';
                $pagination['next_tag_close'] = '</li>';
                
                $pagination['prev_link'] = '<';
                $pagination['prev_tag_open'] = '<li class="prev page">';
                $pagination['prev_tag_close'] = '</li>';
                
                $pagination['cur_tag_open'] = '<li class="active"><a href="">';
                $pagination['cur_tag_close'] = '</a></li>';
                
                $pagination['num_tag_open'] = '<li class="page">';
                $pagination['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($pagination);

                if($this->session->userdata('logged_in'))
                {
                    $data['isi'] = 'report/list';
                    $this->load->view('preview', $data, true);
                    $this->load->view('template/template', $this->data);
                }
                else
                {
                    redirect('login','refresh');
                }

            }

            public function export_excel()
            {
                
                $this->load->library("excel");

                $object = new PHPExcel();

                $object->setActiveSheetIndex(0); 
                $report = $this->report_model->report();
                $table_columns = array("ID Ticket","Request Date","Subject","Category","Description","PIC","SBU","Location","Handle By","Status","Lead Time");

                $column = 0;

                foreach ($table_columns as $field) {
                            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                            $column++;
                        }
                
                $excel_row = 2;

                $no = 1;
                
                foreach ($report->result() as $baris) {
                
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $baris->id_ticket);   
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $baris->request_date);   
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $baris->request_subject);   
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $baris->name_request_category);   
                    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, strip_tags($baris->request_description));   
                    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $baris->name_user);   
                    $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $baris->alias_company);   
                    $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $baris->name_area);   
                    $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $baris->user_handle);   
                    $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $baris->name_request_status);
                    
                    $request_date = new DateTime($baris->request_date);
                    $completed_date = new DateTime($baris->completed_date);

                    if($completed_date->diff($request_date)->format('%a')>0)
                    {
                        $leadtime = $completed_date->diff($request_date)->format('%a days');
                    }
                    elseif($completed_date->diff($request_date)->format('%h')>0)
                    {
                        $leadtime = $completed_date->diff($request_date)->format('%h hours');
                    }
                    elseif($completed_date->diff($request_date)->format('%i')>0)
                    {
                        $leadtime = $completed_date->diff($request_date)->format('%i minutes');
                    }
                    elseif($completed_date->diff($request_date)->format('%s')>0)
                    {
                        $leadtime = $completed_date->diff($request_date)->format('%s second');
                    }

                    $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $leadtime);

                    $excel_row++;
                }
                    
                $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="daily_report.xls"');
                $object_writer->save('php://output');
            }
        }