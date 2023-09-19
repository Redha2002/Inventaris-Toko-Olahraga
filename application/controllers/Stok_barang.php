<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stok_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MStok_barang');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'index.php/stok_barang/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/stok_barang/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/stok_barang';
            $config['first_url'] = base_url() . 'index.php/stok_barang';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MStok_barang->total_rows($q);
        $stok_barang = $this->MStok_barang->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stok_barang_data' => $stok_barang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'stok_barang/stok_barang_list';
		$this->load->view('tamplate', $data);
        //$this->load->view('stok_barang/stok_barang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MStok_barang->get_by_id($id);
        if ($row) {
            $data = array(
		'id_stok_barang' => $row->id_stok_barang,
		'kode_barang' => $row->kode_barang,
		'nama_barang' => $row->nama_barang,
	    );
            $data['page'] = 'stok_barang/stok_barang_read';
            $this->load->view('tamplate', $data);
            //$this->load->view('stok_barang/stok_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stok_barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stok_barang/create_action'),
	    'id_stok_barang' => set_value('id_stok_barang'),
	    'kode_barang' => set_value('kode_barang'),
	    'nama_barang' => set_value('nama_barang'),
	);
        $data['page'] = 'stok_barang/stok_barang_form';
        $this->load->view('tamplate', $data);
        //$this->load->view('stok_barang/stok_barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
	    );

            $this->MStok_barang->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('stok_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MStok_barang->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stok_barang/update_action'),
		'id_stok_barang' => set_value('id_stok_barang', $row->id_stok_barang),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
	    );
            $data['page'] = 'stok_barang/stok_barang_form';
            $this->load->view('tamplate', $data);
            //$this->load->view('stok_barang/stok_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stok_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_stok_barang', TRUE));
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
	    );

            $this->MStok_barang->update($this->input->post('id_stok_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('stok_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MStok_barang->get_by_id($id);

        if ($row) {
            $this->MStok_barang->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stok_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stok_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');

	$this->form_validation->set_rules('id_stok_barang', 'id_stok_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "stok_barang.xls";
        $judul = "stok_barang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");

	foreach ($this->MStok_barang->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Stok_barang.php */
/* Location: ./application/controllers/Stok_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-09 16:47:57 */
/* http://harviacode.com */