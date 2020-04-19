<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Doctor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $doctor = $this->Doctor_model->get_all();

        $data = array(
            'doctor_data' => $doctor
        );

          $data['content'] = 'doctor/doctor_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Doctor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
        'number' => $row->number,
		'main_educaton' => $row->main_educaton,
		'medical_reg_no' => $row->medical_reg_no,
		'speciality' => $row->speciality,
		'year_of_experience' => $row->year_of_experience,
		'patients_per_hour' => $row->patients_per_hour,
		'fees' => $row->fees,
		'gender' => $row->gender,
		'image' => $row->image,
		'status' => $row->status,
		'createdat' => $row->createdat,
	    );
             $data['content'] = 'doctor/doctor_read';
        $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('doctor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('doctor/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
        'number' => set_value('number'),
	    'main_educaton' => set_value('main_educaton'),
	    'medical_reg_no' => set_value('medical_reg_no'),
	    'speciality' => set_value('speciality'),
	    'year_of_experience' => set_value('year_of_experience'),
	    'patients_per_hour' => set_value('patients_per_hour'),
	    'fees' => set_value('fees'),
	    'gender' => set_value('gender'),
	    'image' => set_value('image'),
	    'status' => set_value('status'),
	    // 'createdat' => set_value('createdat'),
	); 
         $data['spe']=$this->Speciality_model->get_all();
        $data['content'] = 'doctor/doctor_form';
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
        'number' => $this->input->post('number',TRUE),
		'main_educaton' => $this->input->post('main_educaton',TRUE),
		'medical_reg_no' => $this->input->post('medical_reg_no',TRUE),
		'speciality' => $this->input->post('speciality',TRUE),
		'year_of_experience' => $this->input->post('year_of_experience',TRUE),
		'patients_per_hour' => $this->input->post('patients_per_hour',TRUE),
		'fees' => $this->input->post('fees',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		// 'image' => $this->input->post('image',TRUE),
		'status' => $this->input->post('status',TRUE),
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

           $id=$this->Doctor_model->insert($data);
             if($id){
                $this->insert_login($id,$data);
             }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('doctor'));
        }
    }  

     public function insert_login($id,$data){
            $data = array(
          'log_id'=>$id,      
        'name' => $data['name'],
        'number' =>$data['number'],
        // 'email' => $data['email'],
        'password' => md5($data['number']),
        // 'designation' => $this->input->post('designation',TRUE),
        'type' =>4,
        'status' =>1,
        );

            $this->Login_create_model->insert($data);
        }
    
    public function update($id) 
    {
        $row = $this->Doctor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('doctor/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
        'number' => set_value('number', $row->number),
		'main_educaton' => set_value('main_educaton', $row->main_educaton),
		'medical_reg_no' => set_value('medical_reg_no', $row->medical_reg_no),
		'speciality' => set_value('speciality', $row->speciality),
		'year_of_experience' => set_value('year_of_experience', $row->year_of_experience),
		'patients_per_hour' => set_value('patients_per_hour', $row->patients_per_hour),
		'fees' => set_value('fees', $row->fees),
		'gender' => set_value('gender', $row->gender),
		'image' => set_value('image', $row->image),
		'status' => set_value('status', $row->status),
		'createdat' => set_value('createdat', $row->createdat),
	    );
            $data['content'] = 'doctor/doctor_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('doctor'));
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
        'number' => $this->input->post('number',TRUE),
		'main_educaton' => $this->input->post('main_educaton',TRUE),
		'medical_reg_no' => $this->input->post('medical_reg_no',TRUE),
		'speciality' => $this->input->post('speciality',TRUE),
		'year_of_experience' => $this->input->post('year_of_experience',TRUE),
		'patients_per_hour' => $this->input->post('patients_per_hour',TRUE),
		'fees' => $this->input->post('fees',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'image' => $this->input->post('image',TRUE),
		// 'status' => $this->input->post('status',TRUE),
		// 'createdat' => $this->input->post('createdat',TRUE),
	    );
             $this->load->view('customer/slim', $data);
            $images = Slim::getImages();
            if ($images != false) {
                foreach ($images as $image) {
                    $file = Slim::saveFile_admin($image['output']['data'], $image['input']['name'], FCPATH . "uploads");
                    $data['image'] = 'uploads/' . $file['name'];
                }
            } else {
                $data['image'] = $this->input->post('image', TRUE);
            }

            $this->Doctor_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('doctor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Doctor_model->get_by_id($id);

        if ($row) {
            $this->Doctor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('doctor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('doctor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('main_educaton', 'main educaton', 'trim|required');
	// $this->form_validation->set_rules('medical_reg_no', 'medical reg no', 'trim|required');
	// $this->form_validation->set_rules('speciality', 'speciality', 'trim|required');
	// $this->form_validation->set_rules('year_of_experience', 'year of experience', 'trim|required');
	// $this->form_validation->set_rules('patients_per_hour', 'patients per hour', 'trim|required');
	// $this->form_validation->set_rules('fees', 'fees', 'trim|required');
	// $this->form_validation->set_rules('gender', 'gender', 'trim|required');
	// $this->form_validation->set_rules('image', 'image', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');
	// $this->form_validation->set_rules('createdat', 'createdat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "doctor.xls";
        $judul = "doctor";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Main Educaton");
	xlsWriteLabel($tablehead, $kolomhead++, "Medical Reg No");
	xlsWriteLabel($tablehead, $kolomhead++, "Speciality");
	xlsWriteLabel($tablehead, $kolomhead++, "Year Of Experience");
	xlsWriteLabel($tablehead, $kolomhead++, "Patients Per Hour");
	xlsWriteLabel($tablehead, $kolomhead++, "Fees");
	xlsWriteLabel($tablehead, $kolomhead++, "Gender");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Createdat");

	foreach ($this->Doctor_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->main_educaton);
	    xlsWriteLabel($tablebody, $kolombody++, $data->medical_reg_no);
	    xlsWriteNumber($tablebody, $kolombody++, $data->speciality);
	    xlsWriteLabel($tablebody, $kolombody++, $data->year_of_experience);
	    xlsWriteNumber($tablebody, $kolombody++, $data->patients_per_hour);
	    xlsWriteLabel($tablebody, $kolombody++, $data->fees);
	    xlsWriteNumber($tablebody, $kolombody++, $data->gender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->createdat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Doctor.php */
/* Location: ./application/controllers/Doctor.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-04-13 13:16:23 */
