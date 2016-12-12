<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comments extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Comments_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'comments/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'comments/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'comments/index.html';
            $config['first_url'] = base_url() . 'comments/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Comments_model->total_rows($q);
        $comments = $this->Comments_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'comments_data' => $comments,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('comments/comments_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Comments_model->get_by_id($id);
        if ($row) {
            $data = array(
		'slno' => $row->slno,
		'sender' => $row->sender,
		'comment' => $row->comment,
		'cid' => $row->cid,
	    );
            $this->load->view('comments/comments_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('comments'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('comments/create_action'),
	    'slno' => set_value('slno'),
	    'sender' => set_value('sender'),
	    'comment' => set_value('comment'),
	    'cid' => set_value('cid'),
	);
        $this->load->view('comments/comments_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sender' => $this->input->post('sender',TRUE),
		'comment' => $this->input->post('comment',TRUE),
		'cid' => $this->input->post('cid',TRUE),
	    );

            $this->Comments_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('comments'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Comments_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('comments/update_action'),
		'slno' => set_value('slno', $row->slno),
		'sender' => set_value('sender', $row->sender),
		'comment' => set_value('comment', $row->comment),
		'cid' => set_value('cid', $row->cid),
	    );
            $this->load->view('comments/comments_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('comments'));
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
		'comment' => $this->input->post('comment',TRUE),
		'cid' => $this->input->post('cid',TRUE),
	    );

            $this->Comments_model->update($this->input->post('slno', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('comments'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Comments_model->get_by_id($id);

        if ($row) {
            $this->Comments_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('comments'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('comments'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sender', 'sender', 'trim|required');
	$this->form_validation->set_rules('comment', 'comment', 'trim|required');
	$this->form_validation->set_rules('cid', 'cid', 'trim|required');

	$this->form_validation->set_rules('slno', 'slno', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "comments.xls";
        $judul = "comments";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Comment");
	xlsWriteLabel($tablehead, $kolomhead++, "Cid");

	foreach ($this->Comments_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->comment);
	    xlsWriteNumber($tablebody, $kolombody++, $data->cid);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Comments.php */
/* Location: ./application/controllers/Comments.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-11 22:29:48 */
/* http://harviacode.com */