<?php

class Recorder extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function findById($id)
    {
        $query = $this->db->select('*')->from($table_name)->where('id', $id)
        ->get();
        return $query->result_array();
    }
    public function findByParent($parent)
    {
        $query = $this->db->select('*')->from($table_name)->where('parent', $parent)
        ->get();
        return $query->result_array();
    }
    public function findByChild($child)
    {
        $query = $this->db->select('*')->from($table_name)->where('child', $child)
        ->get();
        return $query->result_array();
    }
#    public function findByTime($time)
#    {
#        $query = $this->db->blablabla($table_name, [ 'time' > $time ]);
#    }
    public function add($parent, $child)
    {
        $data = [
        'parent'=>  $parent,
        'child' =>  $child ];
        $query = $this->db->from($table_name)->set($data)
        ->insert();
    }
    public function deleteById($id)
    {
        $query = $this->db->from($table_name)->where('id', $id)
        ->delete();
    }
}
