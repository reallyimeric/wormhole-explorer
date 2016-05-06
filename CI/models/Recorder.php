<?php

class Recorder extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    static private function issolarsystem($str)
    {
        //return (strlen($str) === 6)&&strstr($str, '-');
        return (strlen($str) === 6)||(strlen($str) === 7)||($str === 'ROOT');
    }
    public function getrecord($p1,$p2)
    {
        $p1 = mb_convert_case($p1, MB_CASE_LOWER);
        $p2 = mb_convert_case($p2, MB_CASE_UPPER);
        switch ($p1) {
            case 'parent':
                if (self::issolarsystem($p2)) $method_allowed = true;
                else $method_allowed = false;
                break;
            case 'child':
                if (self::issolarsystem($p2)) $method_allowed = true;
                else $method_allowed = false;
                break;
            case 'id':
                if (is_numeric($p2)&&($p2 > 0)) $method_allowed = true;
                else $method_allowed = false;
                break;
            case 'time':
                if (is_numeric($p2)) $method_allowed = true;
                else $method_allowed = false;
                break;
            default:
                return -1;
                break;
        }
        if (!$method_allowed) {
            return -2;
        }
        if ($p1 === 'time') {
            $query = $this->db->select('*')->from('routing')->where($p1.' >', $p2)
            ->get();
        }
        $query = $this->db->select('*')->from('routing')->where($p1, $p2)
        ->get();
        return json_encode($query->result());
    }
    public function postrecord($p1,$p2)
    {
        $p1 = mb_convert_case($p1, MB_CASE_UPPER);
        $p2 = mb_convert_case($p2, MB_CASE_UPPER);
        $allowed = self::issolarsystem($p1)&&self::issolarsystem($p2);
        if (!$allowed) {
            return -2;
        }
        $query = $this->db->from("routing")->set('parent', $p1)->set('child', $p2)
        //->get_compiled_insert();
        ->insert();
        return $query;
    }
    public function deleterecord($p1,$p2)       //i'm like getrecord()
    {
        $p1 = mb_convert_case($p1, MB_CASE_LOWER);
        $p2 = mb_convert_case($p2, MB_CASE_UPPER);
        switch ($p1) {
            case 'parent':
                if (self::issolarsystem($p2)) $method_allowed = true;
                else $method_allowed = false;
                break;
            case 'child':
                if (self::issolarsystem($p2)) $method_allowed = true;
                else $method_allowed = false;
                break;
            case 'id':
                if (is_numeric($p2)&&($p2 > 0)) $method_allowed = true;
                else $method_allowed = false;
                break;
            case 'time':
                if (is_numeric($p2)) $method_allowed = true;
                else $method_allowed = false;
                break;
            default:
                return -1;
                break;
        }
        if (!$method_allowed) {
            return -2;
        }
        $query = $this->db->from("routing")->where($p1, $p2)
        //->get_compiled_delete();
        ->delete();
        return $query;
    }
}