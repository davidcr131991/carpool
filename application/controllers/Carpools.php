<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carpools extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Carpools_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'carpools/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'carpools/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'carpools/index.html';
            $config['first_url'] = base_url() . 'carpools/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Carpools_model->total_rows($q);
        $carpools = $this->Carpools_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'carpools_data' => $carpools,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
       
        $this->load->view('header');
        $this->load->view('carpools/carpools_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Carpools_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'uid' => $row->uid,
		'from' => $row->from,
		'to' => $row->to,
		'uptime' => $row->uptime,
		'downtime' => $row->downtime,
		'people' => $row->people,
		'price' => $row->price,
		'vehicle' => $row->vehicle,
		'description' => $row->description,
	    );
            $this->load->view('carpools/carpools_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('carpools'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('carpools/create_action'),
	    'id' => set_value('id'),
	    'uid' => set_value('uid'),
	    'from' => set_value('from'),
	    'to' => set_value('to'),
	    'uptime' => set_value('uptime'),
	    'downtime' => set_value('downtime'),
	    'people' => set_value('people'),
	    'price' => set_value('price'),
	    'vehicle' => set_value('vehicle'),
	    'description' => set_value('description'),
	);
        $this->load->view('carpools/carpools_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'uid' => $this->input->post('uid',TRUE),
		'from' => $this->input->post('from',TRUE),
		'to' => $this->input->post('to',TRUE),
		'uptime' => $this->input->post('uptime',TRUE),
		'downtime' => $this->input->post('downtime',TRUE),
		'people' => $this->input->post('people',TRUE),
		'price' => $this->input->post('price',TRUE),
		'vehicle' => $this->input->post('vehicle',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Carpools_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('carpools'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Carpools_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('carpools/update_action'),
		'id' => set_value('id', $row->id),
		'uid' => set_value('uid', $row->uid),
		'from' => set_value('from', $row->from),
		'to' => set_value('to', $row->to),
		'uptime' => set_value('uptime', $row->uptime),
		'downtime' => set_value('downtime', $row->downtime),
		'people' => set_value('people', $row->people),
		'price' => set_value('price', $row->price),
		'vehicle' => set_value('vehicle', $row->vehicle),
		'description' => set_value('description', $row->description),
	    );
            $this->load->view('carpools/carpools_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('carpools'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'uid' => $this->input->post('uid',TRUE),
		'from' => $this->input->post('from',TRUE),
		'to' => $this->input->post('to',TRUE),
		'uptime' => $this->input->post('uptime',TRUE),
		'downtime' => $this->input->post('downtime',TRUE),
		'people' => $this->input->post('people',TRUE),
		'price' => $this->input->post('price',TRUE),
		'vehicle' => $this->input->post('vehicle',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Carpools_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('carpools'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Carpools_model->get_by_id($id);

        if ($row) {
            $this->Carpools_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('carpools'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('carpools'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('uid', 'uid', 'trim|required');
	$this->form_validation->set_rules('from', 'from', 'trim|required');
	$this->form_validation->set_rules('to', 'to', 'trim|required');
	$this->form_validation->set_rules('uptime', 'uptime', 'trim|required');
	$this->form_validation->set_rules('downtime', 'downtime', 'trim|required');
	$this->form_validation->set_rules('people', 'people', 'trim|required');
	$this->form_validation->set_rules('price', 'price', 'trim|required');
	$this->form_validation->set_rules('vehicle', 'vehicle', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "carpools.xls";
        $judul = "carpools";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Uid");
	xlsWriteLabel($tablehead, $kolomhead++, "From");
	xlsWriteLabel($tablehead, $kolomhead++, "To");
	xlsWriteLabel($tablehead, $kolomhead++, "Uptime");
	xlsWriteLabel($tablehead, $kolomhead++, "Downtime");
	xlsWriteLabel($tablehead, $kolomhead++, "People");
	xlsWriteLabel($tablehead, $kolomhead++, "Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Vehicle");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");

	foreach ($this->Carpools_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->uid);
	    xlsWriteLabel($tablebody, $kolombody++, $data->from);
	    xlsWriteLabel($tablebody, $kolombody++, $data->to);
	    xlsWriteLabel($tablebody, $kolombody++, $data->uptime);
	    xlsWriteLabel($tablebody, $kolombody++, $data->downtime);
	    xlsWriteNumber($tablebody, $kolombody++, $data->people);
	    xlsWriteNumber($tablebody, $kolombody++, $data->price);
	    xlsWriteLabel($tablebody, $kolombody++, $data->vehicle);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Carpools.php */
/* Location: ./application/controllers/Carpools.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-11 22:29:47 */
/* http://harviacode.com */