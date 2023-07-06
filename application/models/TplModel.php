<?php defined('BASEPATH') or exit('No direct script access allowed');

class TplModel extends CI_Model
{

    //set nama tabel yang akan kita tampilkan datanya
    // var $table = 'poView';
    //set kolom order, kolom pertama saya null untuk kolom edit dan hapus
    // var $column_order = array(null, 'whscode','tglpo', 'lifetimepo', 'nopo', 'namacust');
    // var $column_search = array('whscode','tglpo', 'lifetimepo', 'nopo', 'namacust');
    // default order 
    // var $order = array('tglpo' => 'asc');

    // function get_datatables()
    // {
    //     $this->_get_datatables_query();
    //     if ($this->input->post('length') != -1)
    //         $this->db->limit($this->input->post('length'), $this->input->post('start'));
    //     $query = $this->db->get();
    //     // print_r($this->db->last_query());
    //     return $query->result();
    // }

    // private function _get_datatables_query()
    // {
    //     $this->db->distinct();
    //     $this->db->select(['whscode','tglpo', 'lifetimepo', 'nopo', 'namacust']);
    //     $this->db->from($this->table);
    //     $i = 0;
    //     foreach ($this->column_search as $item) // loop kolom 
    //     {
    //         if ($this->input->post('search')['value']) // jika datatable mengirim POST untuk search
    //         {
    //             if ($i === 0) // looping pertama
    //             {
    //                 $this->db->group_start();
    //                 $this->db->like($item, $this->input->post('search')['value']);
    //             } else {
    //                 $this->db->or_like($item, $this->input->post('search')['value']);
    //             }
    //             if (count($this->column_search) - 1 == $i) //looping terakhir
    //                 $this->db->group_end();
    //         }
    //         $i++;
    //     }

    //     $this->db->where('whscode', 'JT-02');

    //     // jika datatable mengirim POST untuk order
    //     if ($this->input->post('order')) {
    //         $this->db->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
    //     } else if (isset($this->order)) {
    //         $order = $this->order;
    //         $this->db->order_by(key($order), $order[key($order)]);
    //     }
    // }

    // function count_filtered()
    // {
    //     $this->_get_datatables_query();
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

    // public function count_all()
    // {
    //     $this->db->distinct();
    //     $this->db->select(['whscode','tglpo', 'lifetimepo', 'nopo', 'namacust']);
    //     $this->db->from($this->table);
    //     $this->db->where('whscode', 'JT-02');
    //     return $this->db->count_all_results();
    // }

    public function getDate()
    {
        $timezone = new DateTimeZone('Asia/Jakarta');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        return $date->format('Y-m-d H:i:s');
    }


    public function get_po($post = null)
    {
        $whs_code = $this->session->userdata('tpl_username');
        $sql = "select t1.*,t2.is_confirm, t2.noref, t2.remark, FORMAT(t2.created_at,'dd/MM/yyyy') as confirm_date from
        (select distinct whscode, tglpo, lifetimepo, nopo, namacust from poView where whscode = '$whs_code') t1
        left join  tpl_po t2 ON t1.nopo COLLATE SQL_Latin1_General_CP1_CI_AS = t2.nopo COLLATE SQL_Latin1_General_CP1_CI_AS";

        if (!is_null($post)) {
            $nopo = $post['nopo'];
            $sql .= " WHERE t1.nopo = '$nopo'";
        }

        $query = $this->db->query($sql);
        return $query;
    }

    public function get_detail_po($post)
    {
        $whs_code = $this->session->userdata('tpl_username');
        $nopo = $post['nopo'];
        $sql = "select distinct whscode,nopo,kodeproduk, namaproduk, Quantity from poView where whscode = '$whs_code' and nopo = '$nopo'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function cekPoConfirm($post)
    {
        $condition = array(
            'nopo' => $post['nopo'],
            'is_confirm' => 'y'
        );
        $this->db->from('tpl_po');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query;
    }

    public function confirmPO($post)
    {
        $nopo = $post['nopo'];
        $noref = $post['noref'];
        $remark = $post['remark'];
        $created_by = $this->session->userdata('tpl_username');

        $data = array(
            'nopo' => $nopo,
            'is_confirm' => 'y',
            'noref' => $noref,
            'remark' => $remark,
            'created_by' => $created_by
        );
        $this->db->insert('tpl_po', $data);
    }

    public function editConfirmPO($post)
    {
        $set = array(
            'noref' => $post['noref'],
            'remark' => $post['remark'],
            'updated_by' => $this->session->userdata('tpl_username'),
            'updated_at' => $this->getDate()
        );

        $this->db->where('id', $post['id']);
        $this->db->update('tpl_po', $set);
    }

    public function getPoConfirmed($post)
    {
        $nopo = $post['nopo'];
        $sql = "select * from tpl_po where nopo = '$nopo'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getStock()
    {
        $whs_code = $this->session->userdata('tpl_username');
        $sql = "select * from stockView where whscode = '$whs_code'";
        $query = $this->db->query($sql);
        return $query;
    }
}
