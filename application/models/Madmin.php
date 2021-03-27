<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

    // Kriteria
    public function get_kriteria($id=null){
        if($id!=null){
            $this->db->where('id_kriteria', $id);
        }
        return $this->db->get('kriteria');
    }

    public function store_k($data){
        $this->db->insert('kriteria', $data);
    }

    public function update_k($data, $id){
        $this->db->update('kriteria', $data, ['id_kriteria'=>$id]);
    }

    public function del_k($id){
        $this->db->where('id_kriteria', $id);
        $this->db->delete('kriteria');
    }

    // Event
    public function get_event($id=null){
        $this->db->select('e.id_event, e.id_user, e.nama_event, u.nama_user AS juri');
        $this->db->from('event AS e');
        if($id!=null){
            $this->db->where('id_event', $id);
        }
        $this->db->join('user AS u', 'u.id_user=e.id_user');
        return $this->db->get();
    }

    public function get_juri(){
        $this->db->where('level', 'juri');
        return $this->db->get('user');
    }

    public function store_e($data){
        $this->db->insert('event', $data);
    }

    public function update_e($data, $id){
        $this->db->update('event', $data, ['id_event'=>$id]);
    }

    public function del_e($id){
        $this->db->where('id_event', $id);
        $this->db->delete('event');
    }

    // Peserta
    public function get_peserta($id=null){
        $this->db->select('p.id_peserta, p.id_event, e.nama_event AS event, p.nama_peserta, p.no_hp, p.nama_burung');
        $this->db->from('peserta AS p');
        if($id!=null){
            $this->db->where('id_peserta', $id);
        }
        $this->db->join('event AS e', 'e.id_event=p.id_event');
        return $this->db->get();
    }

    public function store_pes($data){
        $this->db->insert('peserta', $data);
    }

    public function update_pes($data, $id){
        $this->db->update('peserta', $data, ['id_peserta'=>$id]);
    }

    public function del_pes($id){
        $this->db->where('id_peserta', $id);
        $this->db->delete('peserta');
    }

}