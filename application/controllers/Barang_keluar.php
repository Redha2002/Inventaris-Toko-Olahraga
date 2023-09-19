<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MBarang_keluar','MStok_barang'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'barang_keluar/index.html/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'barang_keluar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'barang_keluar/index.html';
            $config['first_url'] = base_url() . 'barang_keluar/index.html';
        }

        $config['per_page'] = 100;
        $config['page_query_string'] = TRUE;
       

        if(isset($_POST['dateawal'])){
            $tanggal_awal=$this->input->post("dateawal");
            $tanggal_akhir=$this->input->post("dateakhir");
            $config['total_rows'] = $this->MBarang_keluar->total_rows_filter($q,$tanggal_awal,$tanggal_akhir);
            $barang_keluar = $this->MBarang_keluar->get_limit_data_filter($config['per_page'], $start, $q,$tanggal_awal,$tanggal_akhir);
            
        }else{
            $config['total_rows'] = $this->MBarang_keluar->total_rows($q);
            $barang_keluar = $this->MBarang_keluar->get_limit_data($config['per_page'], $start, $q);
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'barang_keluar_data' => $barang_keluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'barang_keluar/barang_keluar_list';
		$this->load->view('tamplate', $data);
        //$this->load->view('barang_keluar/barang_keluar_list', $data);
    }

    function Pengeluaran()
    {
        $submit = $this->input->post('submit',TRUE);
        if($submit){
        $data = array(
                'kode_barang' => $this->input->post('kode_barang',TRUE),
                'sisa_barang' => $this->input->post('stok_barang',TRUE),
                //'sisa_barang' => $this->input->post('sisa_barang',TRUE),
                //'tanggal_keluar' => $this->input->post('tanggal_keluar',TRUE),
                );
        
                    $this->MBarang_keluar->insert($data);
                    $this->session->set_flashdata('message', 'Pengeluaran Selesai');
                    redirect(site_url('barang_keluar/pengeluaran'));
        }
        $data['list_brg'] = $this->MBarang_keluar->get_all();
        $data['list_stok_barang'] = $this->MStok_barang->get_all();
        $data['page'] = 'barang_keluar/pengeluaran';
        $this->load->view('tamplate', $data);
    }

//    function belum_terjual($id_brg)
//     {
//         if (id_brg){
//             $data = array(
//                 //'tanggal_keluar' => date('Y-m-d H:i:s'),
//                'status' => 'terjual',
//                 );
        
//                   $this->MPengeluaran->update($id_brg, $data);
//                   $this->session->set_flashdata('message', 'Update Record Success');
//                   redirect(site_url('pengeluaran/belum_terjual'));
//                 }
    
//     }

    public function read($id) 
    {
        $row = $this->MBarang_keluar->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang_keluar' => $row->id_barang_keluar,
		'kode_barang' => $row->kode_barang,
		'sisa_barang' => $row->sisa_barang,
		'tanggal_keluar' => $row->tanggal_keluar,
		'status' => $row->status,
	    );
            $data['page'] = 'barang_keluar/barang_keluar_read';
            $this->load->view('tamplate', $data);
            //$this->load->view('barang_keluar/barang_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang_keluar/create_action'),
	    'id_barang_keluar' => set_value('id_barang_keluar'),
	    'kode_barang' => set_value('kode_barang'),
	    'sisa_barang' => set_value('sisa_barang'),
	    'tanggal_keluar' => set_value('tanggal_keluar'),
	    'status' => set_value('status'),
	);
        $data['page'] = 'barang_keluar/barang_keluar_form';
        $this->load->view('tamplate', $data);
        //$this->load->view('barang_keluar/barang_keluar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'sisa_barang' => $this->input->post('sisa_barang',TRUE),
		'tanggal_keluar' => $this->input->post('tanggal_keluar',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->MBarang_keluar->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MBarang_keluar->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang_keluar/update_action'),
		'id_barang_keluar' => set_value('id_barang_keluar', $row->id_barang_keluar),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'sisa_barang' => set_value('sisa_barang', $row->sisa_barang),
		'tanggal_keluar' => set_value('tanggal_keluar', $row->tanggal_keluar),
		'status' => set_value('status', $row->status),
	    );
            $data['page'] = 'barang_keluar/barang_keluar_form';
            $this->load->view('tamplate', $data);
            //$this->load->view('barang_keluar/barang_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang_keluar', TRUE));
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'sisa_barang' => $this->input->post('sisa_barang',TRUE),
		'tanggal_keluar' => $this->input->post('tanggal_keluar',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->MBarang_keluar->update($this->input->post('id_barang_keluar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MBarang_keluar->get_by_id($id);

        if ($row) {
            $this->MBarang_keluar->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang_keluar/pengeluaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar/pengeluaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
	$this->form_validation->set_rules('sisa_barang', 'sisa barang', 'trim|required');
	$this->form_validation->set_rules('tanggal_keluar', 'tanggal keluar', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_barang_keluar', 'id_barang_keluar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "barang_keluar.xls";
        $judul = "barang_keluar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Sisa Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Keluar");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->MBarang_keluar->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sisa_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_keluar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Barang_keluar.php */
/* Location: ./application/controllers/Barang_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-07 15:13:49 */
/* http://harviacode.com */