<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TplController extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['user', 'TplModel']);
    }

    public function index()
    {
        $po = $this->TplModel->get_po();
        $data = array(
            'po' => $po
        );
        $this->template->load('template', 'tpl/po', $data);
    }

    //method yang digunakan untuk request data mahasiswa
    // public function po_ajax_list()
    // {
    //     // header('Content-Type: application/json');
    //     $list = $this->TplModel->get_datatables();
    //     // var_dump($list);
    //     // die;
    //     $data = array();
    //     $no = $this->input->post('start') + 1;
    //     //looping data mahasiswa
    //     foreach ($list as $item) {
    //         // $no++;
    //         $row = array();
    //         $row[] = $no++;
    //         $row[] = $item->whscode;
    //         $row[] = date("d M Y", strtotime($item->tglpo));
    //         $row[] = date("d M Y", strtotime($item->lifetimepo));
    //         $row[] = $item->nopo;
    //         $row[] = $item->namacust;
    //         $row[] =  '<a class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>';
    //         $data[] = $row;
    //     }
    //     $output = array(
    //         "draw" => $this->input->post('draw'),
    //         "recordsTotal" => $this->TplModel->count_all(),
    //         "recordsFiltered" => $this->TplModel->count_filtered(),
    //         "data" => $data,
    //     );
    //     //output to json format
    //     $this->output->set_output(json_encode($output));
    // }

    public function loadTablePo()
    {
        $po = $this->TplModel->get_po();
        $data = array(
            'po' => $po
        );
        $this->load->view('tpl/table_po', $data);
    }

    function loadModalDetailPo()
    {
        $post = $this->input->post();
        $detail = $this->TplModel->get_detail_po($post);
        $data = array(
            'detail' => $detail
        );
        $this->load->view('tpl/modal_detail_po', $data);
        // var_dump($post);
    }

    //untuk validasi
    function validate()
    {
        $post = $this->input->post();
        $cek = $this->TplModel->cekPoConfirm($post);

        if ($cek->num_rows() < 1) {
            $response = array(
                'success' => true
            );
        } else {
            $response = array(
                'success' => false
            );
        }
        echo json_encode($response);
    }

    function confirmPO()
    {
        $input_data = json_decode($this->input->raw_input_stream, true);
        $this->TplModel->confirmPO($input_data);

        if ($this->db->affected_rows() > 0) {
            $po = $this->TplModel->getPoConfirmed($input_data);
            $response = array(
                'success' => true,
                'confirm' => date("d/m/Y", strtotime($po->row()->created_at)),
                'nopo' => $po->row()->nopo,
                'noref' => $po->row()->noref,
                'is_confirm' => $po->row()->is_confirm,
                'remark' => $po->row()->remark,
                'message' => 'Data berhasil disimpan'
            );
        } else {
            $response = array(
                'success' => true,
                'message' => 'Gagal simpn data'
            );
        }

        echo json_encode($response);
    }
}
