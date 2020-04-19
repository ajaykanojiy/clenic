<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $patient = $this->Patient_model->get_all();

        $data = array(
            'patient_data' => $patient
        );

          $data['content'] = 'patient/patient_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Patient_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'date' => $row->date,
		'type' => $row->type,
		'name' => $row->name,
		'number' => $row->number,
		'sex' => $row->sex,
		'dob' => $row->dob,
		'age' => $row->age,
		'address' => $row->address,
		'city' => $row->city,
		'pincode' => $row->pincode,
		'service' => $row->service,
		'doctor' => $row->doctor,
		'fees' => $row->fees,
		'amount' => $row->amount,
		'time' => $row->time,
		'createdat' => $row->createdat,
	    );   
            

             $data['content'] = 'patient/patient_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patient'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('patient/create_action'),
	    'id' => set_value('id'),
	    'date' => set_value('date'),
	    'type' => set_value('type'),
	    'name' => set_value('name'),
	    'number' => set_value('number'),
	    'sex' => set_value('sex'),
	    'dob' => set_value('dob'),
	    'age' => set_value('age'),
	    'address' => set_value('address'),
	    'city' => set_value('city'),
	    'pincode' => set_value('pincode'),
	    'id_number' => set_value('id_number'),
	    'image' => set_value('image'),
	    'service' => set_value('service'),
	    'doctor' => set_value('doctor'),
	    'fees' => set_value('fees'),
	    'amount' => set_value('amount'),
	    // 'time' => set_value('time'),
	    // 'createdat' => set_value('createdat'),
	);
        $data['serv']=$this->Service_model->get_all();
         $data['doc']=$this->Doctor_model->get_all();
        $data['content'] = 'patient/patient_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
            echo 'ajay';
        } else {
            $data = array(
		'date' => date('Y-m-d',strtotime($this->input->post('date',TRUE))),
		'type' => $this->input->post('type',TRUE),
		'name' => $this->input->post('name',TRUE),
		'number' => $this->input->post('number',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'dob' => date('Y-m-d',strtotime($this->input->post('dob',TRUE))),
		'age' => $this->input->post('age',TRUE),
		'address' => $this->input->post('address',TRUE),
		'city' => $this->input->post('city',TRUE),
		'pincode' => $this->input->post('pincode',TRUE),
		'id_number' => $this->input->post('id_number',TRUE),
		'service' => $this->input->post('service',TRUE),
		'doctor' => $this->input->post('doctor',TRUE),
		'fees' => $this->input->post('fees',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		// 'time' => $this->input->post('time',TRUE),
		// 'createdat' => $this->input->post('createdat',TRUE),
	    );
            $this->load->view('doctor/slim', $data);
            $images = Slim::getImages();
            if ($images != false) {
                foreach ($images as $image) {
                    $file = Slim::saveFile_admin($image['output']['data'], $image['input']['name'], FCPATH . "uploads");
                    $data['image'] = 'uploads/' . $file['name'];
                }
            } else {
                $data['image'] = $this->input->post('image', TRUE);
            }

            $this->Patient_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('patient'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Patient_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('patient/update_action'),
		'id' => set_value('id', $row->id),
		'date' => set_value('date', date('d-m-Y',strtotime($row->date))),
		'type' => set_value('type', $row->type),
		'name' => set_value('name', $row->name),
		'number' => set_value('number', $row->number),
		'sex' => set_value('sex', $row->sex),
		'dob' => set_value('dob', date('d-m-Y',strtotime($row->dob))),
		'age' => set_value('age', $row->age),
		'address' => set_value('address', $row->address),
		'city' => set_value('city', $row->city),
		'pincode' => set_value('pincode', $row->pincode),
		'image' => set_value('pincode', $row->image),
		'id_number' => set_value('pincode', $row->id_number),
		'service' => set_value('service', $row->service),
		'doctor' => set_value('doctor', $row->doctor),
		'fees' => set_value('fees', $row->fees),
		'amount' => set_value('amount', $row->amount),
		// 'time' => set_value('time', $row->time),
		// 'createdat' => set_value('createdat', $row->createdat),
	    );
            $data['serv']=$this->Service_model->get_all();
            $data['doc']=$this->Doctor_model->get_all();
            $data['content'] = 'patient/patient_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patient'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'date' => date('Y-m-d',strtotime($this->input->post('date',TRUE))),
		'type' => $this->input->post('type',TRUE),
		'name' => $this->input->post('name',TRUE),
		'number' => $this->input->post('number',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'dob' => date('Y-m-d',strtotime($this->input->post('dob',TRUE))),
		'age' => $this->input->post('age',TRUE),
		'address' => $this->input->post('address',TRUE),
		'city' => $this->input->post('city',TRUE),
		'pincode' => $this->input->post('pincode',TRUE),
		'service' => $this->input->post('service',TRUE),
		'doctor' => $this->input->post('doctor',TRUE),
		'fees' => $this->input->post('fees',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		// 'time' => $this->input->post('time',TRUE),
		// 'createdat' => $this->input->post('createdat',TRUE),
	    );

            $this->load->view('doctor/slim', $data);
            $images = Slim::getImages();
            if ($images != false) {
                foreach ($images as $image) {
                    $file = Slim::saveFile_admin($image['output']['data'], $image['input']['name'], FCPATH . "uploads");
                    $data['image'] = 'uploads/' . $file['name'];
                }
            } else {
                $data['image'] = $this->input->post('image', TRUE);
            }

            $this->Patient_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('patient'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Patient_model->get_by_id($id);

        if ($row) {
            $this->Patient_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('patient'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patient'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('date', 'date', 'trim|required');
	// $this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	// $this->form_validation->set_rules('number', 'number', 'trim|required');
	// $this->form_validation->set_rules('sex', 'sex', 'trim|required');
	// $this->form_validation->set_rules('dob', 'dob', 'trim|required');
	// $this->form_validation->set_rules('age', 'age', 'trim|required');	
	// $this->form_validation->set_rules('city', 'city', 'trim|required');
	// $this->form_validation->set_rules('doctor', 'doctor', 'trim|required');
	// $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		// $this->form_validation->set_rules('pincode', 'pincode', 'trim|required');
	// $this->form_validation->set_rules('service', 'service', 'trim|required');
	// $this->form_validation->set_rules('address', 'address', 'trim|required');
	// $this->form_validation->set_rules('fees', 'fees', 'trim|required');
	// $this->form_validation->set_rules('amount', 'amount', 'trim|required');
	// $this->form_validation->set_rules('time', 'time', 'trim|required');
	// $this->form_validation->set_rules('createdat', 'createdat', 'trim|required');

	// $this->form_validation->set_rules('id', 'id', 'trim');
	
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "patient.xls";
        $judul = "patient";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Number");
	xlsWriteLabel($tablehead, $kolomhead++, "Sex");
	xlsWriteLabel($tablehead, $kolomhead++, "Dob");
	xlsWriteLabel($tablehead, $kolomhead++, "Age");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "City");
	xlsWriteLabel($tablehead, $kolomhead++, "Pincode");
	xlsWriteLabel($tablehead, $kolomhead++, "Service");
	xlsWriteLabel($tablehead, $kolomhead++, "Doctor");
	xlsWriteLabel($tablehead, $kolomhead++, "Fees");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Createdat");

	foreach ($this->Patient_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);
	    xlsWriteNumber($tablebody, $kolombody++, $data->type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->number);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sex);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dob);
	    xlsWriteLabel($tablebody, $kolombody++, $data->age);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->city);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pincode);
	    xlsWriteNumber($tablebody, $kolombody++, $data->service);
	    xlsWriteNumber($tablebody, $kolombody++, $data->doctor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->fees);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);
	    xlsWriteLabel($tablebody, $kolombody++, $data->time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->createdat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

     public function patient_fess($value='')
    {
       $id= $this->input->post('id'); 

      $this->db->where('id',$id);
  
     $res= $this->db->get('service')->row();

    //    $str="";
    //     $str="<option value=''>--Select--</option>";
    // foreach ($res as $key => $value) {
    //    $str =$str.'<option value="'.$value->id.'">'.$value->name.'-'.$value->customer_id.'</option>'; 
      
   // } 
   echo $res->fees_amount; 
           
    }

    public function number_check(){
      $mobile= $this->input->post('mobile');
     $res= $this->Staff_model->mobile_check($mobile);

     echo $res;

    }

}

/* End of file Patient.php */
/* Location: ./application/controllers/Patient.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-04-15 08:17:53 */
