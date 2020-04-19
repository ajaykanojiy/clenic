<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $staff = $this->Staff_model->get_all();

        $data = array(
            'staff_data' => $staff
        );

          $data['content'] = 'staff/staff_list';
        $this->load->view('common/master', $data);    
            
    }

    public function read($id) 
    {
        $row = $this->Staff_model->get_by_id($id);
        // echo '<pre>';
        // print_r($row);die;
        if ($row) {
            $data = array(
		'id' => $row->id,
		'type' => $row->type,
		'name' => $row->name,
		'father_name' => $row->father_name,
		'age' => $row->age,
		'sex' => $row->sex,
		'address' => $row->address,
		'mobile' => $row->mobile,
		'salary' => $row->salary,
		'work_time' => $row->work_time,
		'image' => $row->image,
		'id_image' => $row->id_image,
		'id_number' => $row->id_number,
		'createdat' => $row->createdat,
		'date' => $row->date,
		'status' => $row->status,
	    );
          $data['content'] ='staff/staff_read';
        $this->load->view('common/master', $data);       
        } 
        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('staff/create_action'),
	    'id' => set_value('id'),
	    'type' => set_value('type'),
	    'name' => set_value('name'),
	    'father_name' => set_value('father_name'),
	    'age' => set_value('age'),
	    'sex' => set_value('sex'),
	    'address' => set_value('address'),
	    'mobile' => set_value('mobile'),
	    'salary' => set_value('salary'),
	    'work_time' => set_value('work_time'),
	    'image' => set_value('image'),
	    'id_image' => set_value('id_image'),
	    'id_number' => set_value('id_number'),
	    // 'createdat' => set_value('createdat'),
	    'date' => set_value('date'),
	    'status' => set_value('status'),
	);
        $data['content'] = 'staff/staff_form';
        $this->load->view('common/master', $data);       
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'type' => $this->input->post('type',TRUE),
		'name' => $this->input->post('name',TRUE),
		'father_name' => $this->input->post('father_name',TRUE),
		'age' => $this->input->post('age',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'address' => $this->input->post('address',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'salary' => $this->input->post('salary',TRUE),
		'work_time' => $this->input->post('work_time',TRUE),
		'image' => $this->input->post('image',TRUE),
		// 'id_image' => $this->input->post('id_image',TRUE),
		// 'id_number' => $this->input->post('id_number',TRUE),
		// 'createdat' => $this->input->post('createdat',TRUE),
		'date' => $this->input->post('date',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );
             $this->load->view('staff/slim', $data);
            $images = Slim::getImages();
             $imagearray=array();
            // echo '<pre>';
            // print_r($images);die;
            if ($images != false) {
                foreach ($images as $image) {
                    $file = Slim::saveFile_admin($image['output']['data'], $image['input']['name'], FCPATH . "uploads");
                    // $data['image'] = 'uploads/' . $file['name'];
                     $imgpath  = 'uploads/' . $file['name'];
                    array_push($imagearray,$imgpath);
                }
            } else {
                $data['image'] = $this->input->post('image', TRUE);
                $data['id_image'] = $this->input->post('id_image', TRUE);
            }

            $data['image'] = $imagearray[0];
            $data['id_image'] = $imagearray[1];
             // $data1['image3'] = $imagearray[2];
            // echo '<pre>';
           // print_r($data);die;
                        

          $id=$this->Staff_model->insert($data);
              if($id){
                $this->insert_login($id,$data);
             }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('staff'));
        }
    }

    public function insert_login($id,$data){
            $data = array(
          'log_id'=>$id,      
        'name' => $data['name'],
        'number' =>$data['mobile'],
        // 'email' => $data['email'],
        'password' => md5($data['mobile']),
        'type' =>$data['type'],
        'status' =>1,
        );

            $this->Login_create_model->insert($data);
        }
    
    public function update($id) 
    {
        $row = $this->Staff_model->get_by_id($id);
        // echo "<pre>";
        // print_r($row);die;
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('staff/update_action'),
		'id' => set_value('id', $row->id),
		'type' => set_value('type', $row->type),
		'name' => set_value('name', $row->name),
		'father_name' => set_value('father_name', $row->father_name),
		'age' => set_value('age', $row->age),
		'sex' => set_value('sex', $row->sex),
		'address' => set_value('address', $row->address),
		'mobile' => set_value('mobile', $row->mobile),
		'salary' => set_value('salary', $row->salary),
		'work_time' => set_value('work_time', $row->work_time),
		'image' => set_value('image', $row->image),
		'id_image' => set_value('id_image', $row->id_image),
		'id_number' => set_value('id_number', $row->id_number),
		// 'createdat' => set_value('createdat', $row->createdat ),
		'date' => set_value('date', $row->date),
		'status' => set_value('status', $row->status),
	    );
            $data['content'] = 'staff/staff_form';
            $this->load->view('common/master', $data);       
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'type' => $this->input->post('type',TRUE),
		'name' => $this->input->post('name',TRUE),
		'father_name' => $this->input->post('father_name',TRUE),
		'age' => $this->input->post('age',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'address' => $this->input->post('address',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'salary' => $this->input->post('salary',TRUE),
		'work_time' => $this->input->post('work_time',TRUE),
		'image' => $this->input->post('image',TRUE),
		'id_image' => $this->input->post('id_image',TRUE),
		'id_number' => $this->input->post('id_number',TRUE),
		// 'createdat' => $this->input->post('createdat',TRUE),
		'date' => $this->input->post('date',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );
              $this->load->view('staff/slim', $data);
            $images = Slim::getImages();
        
            
             $imagearray=array();

            if ($images != false) {
                foreach ($images as $image) {
                    $file = Slim::saveFile_admin($image['output']['data'], $image['input']['name'], FCPATH . "uploads");
                    // $data['image'] = 'uploads/' . $file['name'];
                     $imgpath  = 'uploads/' . $file['name'];
                    array_push($imagearray,$imgpath);

                    if($this->input->post('image', TRUE)!="" && $this->input->post('id_image', TRUE)==""){
                        // echo  'idiamge emptty';die;
                         $data['id_image'] = $imagearray[0];
                         $data['image'] = $this->input->post('image', TRUE);
                    }

                     elseif($this->input->post('image', TRUE)=="" && $this->input->post('id_image', TRUE)!=""){
                        // echo  'iamge emptty';die;
                         $data['image'] = $imagearray[0];
                         // $data['id_image'] = $this->input->post('id_image', TRUE);
                    }
                    
                     elseif($this->input->post('image', TRUE)!="" && $this->input->post('id_image', TRUE)!=""){
                            // echo $this->input->post('first');
                           //  print_r($imagearray);
                           // echo $this->input->post('id_image', TRUE);die;

                         if($imagearray[0]!="" && $this->input->post('id_image', TRUE)!=""){
                            // echo 'image';die;
                         $data['image'] = $imagearray[0];
                         $data['id_image'] = $this->input->post('id_image', TRUE);
                        }
                         elseif($imagearray[0]!="" && $this->input->post('image', TRUE)!=""){
                        // echo 'id_image';die;
                         $data['id_image'] = $imagearray[0];
                         $data['image'] = $this->input->post('image', TRUE);
                     }
                        
                 

                    }

                    else{
                    
                      $data['image'] = $imagearray[0];
                    $data['id_image'] = $imagearray[1];

                    }              
                   
                }
            } 
            else {
                $data['image'] = $this->input->post('image', TRUE);
                $data['id_image'] = $this->input->post('id_image', TRUE);
            }
            // echo '<pre>';
             // print_r($data);die;

           
             

            $this->Staff_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('staff'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Staff_model->get_by_id($id);

        if ($row) {
            $this->Staff_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('staff'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	// $this->form_validation->set_rules('father_name', 'father name', 'trim|required');
	// $this->form_validation->set_rules('age', 'age', 'trim|required');
	// $this->form_validation->set_rules('sex', 'sex', 'trim|required');
	// $this->form_validation->set_rules('address', 'address', 'trim|required');
	// $this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
	// $this->form_validation->set_rules('salary', 'salary', 'trim|required');
	// $this->form_validation->set_rules('work_time', 'work time', 'trim|required');
	// $this->form_validation->set_rules('image', 'image', 'trim|required');
	// $this->form_validation->set_rules('id_image', 'id image', 'trim|required');
	// $this->form_validation->set_rules('id_number', 'id number', 'trim|required');
	// $this->form_validation->set_rules('createdat', 'createdat', 'trim|required');
	// $this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	// $this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "staff.xls";
        $judul = "staff";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Father Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Age");
	xlsWriteLabel($tablehead, $kolomhead++, "Sex");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Mobile");
	xlsWriteLabel($tablehead, $kolomhead++, "Salary");
	xlsWriteLabel($tablehead, $kolomhead++, "Work Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Number");
	xlsWriteLabel($tablehead, $kolomhead++, "createdat At");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Staff_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->father_name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->age);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sex);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mobile);
	    xlsWriteLabel($tablebody, $kolombody++, $data->salary);
	    xlsWriteLabel($tablebody, $kolombody++, $data->work_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_number);
	    xlsWriteLabel($tablebody, $kolombody++, $data->createdat );
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function number_check(){
      $mobile= $this->input->post('mobile');
     $res= $this->Staff_model->mobile_check($mobile);

     echo $res;

    }

}

/* End of file Staff.php */
/* Location: ./application/controllers/Staff.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-04-13 13:16:58 */
