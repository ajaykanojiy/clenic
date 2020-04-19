<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Service_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $service = $this->Service_model->get_all();

        $data = array(
            'service_data' => $service
        );

          $data['content'] = 'service/service_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Service_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'fees_amount' => $row->fees_amount,
		'status' => $row->status,
	    );
             $data['content'] = 'service/service_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('service'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('service/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'fees_amount' => set_value('fees_amount'),
	    'status' => set_value('status'),
	);
        $data['content'] = 'service/service_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'fees_amount' => $this->input->post('fees_amount',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Service_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('service'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Service_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('service/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'fees_amount' => set_value('fees_amount', $row->fees_amount),
		'status' => set_value('status', $row->status),
	    );
            $data['content'] = 'service/service_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('service'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'fees_amount' => $this->input->post('fees_amount',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Service_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('service'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Service_model->get_by_id($id);

        if ($row) {
            $this->Service_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('service'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('service'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('fees_amount', 'fees amount', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "service.xls";
        $judul = "service";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Fees Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Service_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->fees_amount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Service.php */
/* Location: ./application/controllers/Service.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-04-14 19:32:40 */
