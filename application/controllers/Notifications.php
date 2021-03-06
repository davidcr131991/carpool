<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifications extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Notifications_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'notifications/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'notifications/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'notifications/index.html';
            $config['first_url'] = base_url() . 'notifications/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Notifications_model->total_rows($q);
        $notifications = $this->Notifications_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'notifications_data' => $notifications,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('notifications/notifications_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Notifications_model->get_by_id($id);
        if ($row) {
            $data = array(
		'slno' => $row->slno,
		'sender' => $row->sender,
		'receiver' => $row->receiver,
		'type' => $row->type,
		'cid' => $row->cid,
	    );
            $this->load->view('notifications/notifications_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notifications'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('notifications/create_action'),
	    'slno' => set_value('slno'),
	    'sender' => set_value('sender'),
	    'receiver' => set_value('receiver'),
	    'type' => set_value('type'),
	    'cid' => set_value('cid'),
	);
        $this->load->view('notifications/notifications_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sender' => $this->input->post('sender',TRUE),
		'receiver' => $this->input->post('receiver',TRUE),
		'type' => $this->input->post('type',TRUE),
		'cid' => $this->input->post('cid',TRUE),
	    );

            $this->Notifications_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('notifications'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Notifications_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('notifications/update_action'),
		'slno' => set_value('slno', $row->slno),
		'sender' => set_value('sender', $row->sender),
		'receiver' => set_value('receiver', $row->receiver),
		'type' => set_value('type', $row->type),
		'cid' => set_value('cid', $row->cid),
	    );
            $this->load->view('notifications/notifications_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notifications'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('slno', TRUE));
        } else {
            $data = array(
		'sender' => $this->input->post('sender',TRUE),
		'receiver' => $this->input->post('receiver',TRUE),
		'type' => $this->input->post('type',TRUE),
		'cid' => $this->input->post('cid',TRUE),
	    );

            $this->Notifications_model->update($this->input->post('slno', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('notifications'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Notifications_model->get_by_id($id);

        if ($row) {
            $this->Notifications_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('notifications'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notifications'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sender', 'sender', 'trim|required');
	$this->form_validation->set_rules('receiver', 'receiver', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('cid', 'cid', 'trim|required');

	$this->form_validation->set_rules('slno', 'slno', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "notifications.xls";
        $judul = "notifications";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Sender");
	xlsWriteLabel($tablehead, $kolomhead++, "Receiver");
	xlsWriteLabel($tablehead, $kolomhead++, "Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Cid");

	foreach ($this->Notifications_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sender);
	    xlsWriteNumber($tablebody, $kolombody++, $data->receiver);
	    xlsWriteNumber($tablebody, $kolombody++, $data->type);
	    xlsWriteNumber($tablebody, $kolombody++, $data->cid);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Notifications.php */
/* Location: ./application/controllers/Notifications.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-11 22:29:48 */
/* http://harviacode.com */