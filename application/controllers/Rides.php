<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rides extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rides_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'rides/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rides/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rides/index.html';
            $config['first_url'] = base_url() . 'rides/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rides_model->total_rows($q);
        $rides = $this->Rides_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rides_data' => $rides,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->load->view('header');
        $this->load->view('rides/rides_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Rides_model->get_by_id($id);
        if ($row) {
            $data = array(
		'routeid' => $row->routeid,
		'cid' => $row->cid,
		'place' => $row->place,
		'serialno' => $row->serialno,
	    );
            $this->load->view('header');

            $this->load->view('rides/rides_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
             $this->load->view('header');
            redirect(site_url('rides'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rides/create_action'),
	    'routeid' => set_value('routeid'),
	    'cid' => set_value('cid'),
	    'place' => set_value('place'),
	    'serialno' => set_value('serialno'),
	);
         $this->load->view('header');
        $this->load->view('rides/rides_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'cid' => $this->input->post('cid',TRUE),
		'place' => $this->input->post('place',TRUE),
		'serialno' => $this->input->post('serialno',TRUE),
	    );

            $this->Rides_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rides'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rides_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rides/update_action'),
		'routeid' => set_value('routeid', $row->routeid),
		'cid' => set_value('cid', $row->cid),
		'place' => set_value('place', $row->place),
		'serialno' => set_value('serialno', $row->serialno),
	    );
            $this->load->view('rides/rides_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rides'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('routeid', TRUE));
        } else {
            $data = array(
		'cid' => $this->input->post('cid',TRUE),
		'place' => $this->input->post('place',TRUE),
		'serialno' => $this->input->post('serialno',TRUE),
	    );

            $this->Rides_model->update($this->input->post('routeid', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rides'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rides_model->get_by_id($id);

        if ($row) {
            $this->Rides_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rides'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rides'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('cid', 'cid', 'trim|required');
	$this->form_validation->set_rules('place', 'place', 'trim|required');
	$this->form_validation->set_rules('serialno', 'serialno', 'trim|required');

	$this->form_validation->set_rules('routeid', 'routeid', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rides.xls";
        $judul = "rides";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Cid");
	xlsWriteLabel($tablehead, $kolomhead++, "Place");
	xlsWriteLabel($tablehead, $kolomhead++, "Serialno");

	foreach ($this->Rides_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->cid);
	    xlsWriteLabel($tablebody, $kolombody++, $data->place);
	    xlsWriteNumber($tablebody, $kolombody++, $data->serialno);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Rides.php */
/* Location: ./application/controllers/Rides.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-11 22:29:48 */
/* http://harviacode.com */