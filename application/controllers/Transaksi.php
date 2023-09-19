<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MTransaksi','MSupplier','MStok_barang'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/index.html/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/index.html/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/index.html';
            $config['first_url'] = base_url() . 'transaksi/index.html';
        }

        $config['per_page'] = 100;
        $config['page_query_string'] = TRUE;
        
        if(isset($_POST['dateawal'])){
            $tanggal_awal=$this->input->post("dateawal");
            $tanggal_akhir=$this->input->post("dateakhir");
            $config['total_rows'] = $this->MTransaksi->total_rows_filter($q,$tanggal_awal,$tanggal_akhir);
            $transaksi = $this->MTransaksi->get_limit_data_filter($config['per_page'], $start, $q,$tanggal_awal,$tanggal_akhir);
        }else{
            $config['total_rows'] = $this->MTransaksi->total_rows($q);
            $transaksi = $this->MTransaksi->get_limit_data($config['per_page'], $start, $q);
        }



        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'transaksi/transaksi_list';
        $this->load->view('tamplate', $data);
        //$this->load->view('transaksi/transaksi_list', $data);
    }

    function Pemesanan()
    {
        $submit = $this->input->post('submit',TRUE);
        if($submit){
        //tambah tanggal
        $lama_pemesanan = 7;
        $sekarang = date('Y-m-d H:i:s');
        $tanggal_masuk = Date('Y-m-d H:i:s', strtotime('+7 days'));
        //echo $this->input->post('kode_barang',TRUE);
        //exit;
        $data = array(
                'kode_barang' => $this->input->post('kode_barang',TRUE),
                'nama_supplier' => $this->input->post('nama_supplier',TRUE),
                'jumlah' => $this->input->post('stok_barang',TRUE),
                //'jumlah' => $this->input->post('jumlah',TRUE),
                'tanggal_masuk' => $tanggal_masuk,
                );
        
                    $this->MTransaksi->insert($data);
                    $this->session->set_flashdata('message', 'Pemesanan Selesai');
                    redirect(site_url('transaksi/pemesanan'));
        }
        $data['list_trx'] = $this->MTransaksi->get_all();
        $data['list_supplier'] = $this->MSupplier->get_all();
        $data['list_stok_barang'] = $this->MStok_barang->get_all();
        $data['page'] = 'transaksi/pemesanan';
        $this->load->view('tamplate', $data);
    }

    // function belum_dipesan($id_trx)
    // {
    //     if (id_trx){
    //         $data = array(
    //             'tanggal_masuk' => date('Y-m-d H:i:s'),
    //             'status' => 'Sudah_dipesan',
    //             );
        
    //                 $this->MTransaksi->update($id_trx, $data);
    //                 $this->session->set_flashdata('message', 'Update Record Success');
    //                 redirect(site_url('transaksi/belum_dipesan'));
    //             }
    
    // }
    public function read($id) 
    {
        $row = $this->MTransaksi->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi' => $row->id_transaksi,
		'kode_barang' => $row->kode_barang,
		'nama_supplier' => $row->nama_supplier,
		'jumlah' => $row->jumlah,
		'tanggal_pemesanan' => $row->tanggal_pemesanan,
		'tanggal_masuk' => $row->tanggal_masuk,
		'status' => $row->status,
	    );
            $data['page'] = 'transaksi/transaksi_read';
            $this->load->view('tamplate', $data);
            //$this->load->view('transaksi/transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'kode_barang' => set_value('kode_barang'),
	    'nama_supplier' => set_value('nama_supplier'),
	    'jumlah' => set_value('jumlah'),
	    'tanggal_pemesanan' => set_value('tanggal_pemesanan'),
	    'tanggal_masuk' => set_value('tanggal_masuk'),
	    'status' => set_value('status'),
	);
        $data['page'] = 'transaksi/transaksi_form';
        $this->load->view('tamplate', $data);
        //$this->load->view('transaksi/transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_supplier' => $this->input->post('nama_supplier',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan',TRUE),
		'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->MTransaksi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MTransaksi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'tanggal_pemesanan' => set_value('tanggal_pemesanan', $row->tanggal_pemesanan),
		'tanggal_masuk' => set_value('tanggal_masuk', $row->tanggal_masuk),
		'status' => set_value('status', $row->status),
	    );
            $data['page'] = 'transaksi/transaksi_list';
            $this->load->view('tamplate', $data);
            //$this->load->view('transaksi/transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_supplier' => $this->input->post('nama_supplier',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan',TRUE),
		'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->MTransaksi->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MTransaksi->get_by_id($id);

        if ($row) {
            $this->MTransaksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi/pemesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
	$this->form_validation->set_rules('nama_supplier', 'nama supplier', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('tanggal_pemesanan', 'tanggal pemesanan', 'trim|required');
	$this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "transaksi.xls";
        $judul = "transaksi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Supplier");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pemesanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->MTransaksi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_supplier);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pemesanan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-27 10:04:17 */
/* http://harviacode.com */