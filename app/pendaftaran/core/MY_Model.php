<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function fetch_joins($table, $columns, $joins,$where,$return_array){
      $this->db->select($columns);
      if (is_array($joins) && count($joins) > 0)
      {
          foreach($joins as $k => $v)
          {
              $this->db->join($v['table'], $v['condition'], $v['jointype']);
          }
      }
      
      if($where!=""){
        $this->db->where($where);
      }

      $query = $this->db->get($table);
      if ($return_array) {
        $result = $query->result_array();
      }else{
        $result = $query->result();
      }

      $query->free_result();
      return $result;
  }

  public function fetch_table($select,$table,$where,$order ="",$by="",$start = 0,$limit = 0 ,$return_array = FALSE){
      $this->db->select($select);
      if($where!=""){
        $this->db->where($where);
      }
      if ($order !="" && (strtolower($by)== "desc" || strtolower($by)== "asc")) {
        if($order == 'rand'){
          $this->db->order_by('rand()');
        }else{
          $this->db->order_by($order,$by);
        }
      }

      if((int)$start >=0 && (int)$limit>0){
        $this->db->limit($limit,$start);
      }

      $query = $this->db->get($table);
      if ($return_array) {
        $result = $query->result_array();
      }else{
        $result = $query->result();
      }

      $query->free_result();
      return $result;
  }

  public function get_row($select,$table,$where,$order,$by,$return_array){
    $this->db->select($select);
      if($where!=""){
        $this->db->where($where);
      }
      if ($order !="" && (strtolower($by)== "desc" || strtolower($by)== "asc")) {
        if($order == 'rand'){
          $this->db->order_by('rand()');
        }else{
          $this->db->order_by($order,$by);
        }
      }

      $query = $this->db->get($table);
      if ($return_array) {
        $result = $query->row_array();
      }else{
        $result = $query->row();
      }

      $query->free_result();
      return $result;
  }

  function insert_table($table,$data){
    $this->db->insert($table, $data);
    if ($this->db->affected_rows() > 0 ) {
      return TRUE;
    }else{
      return FALSE;
    }
  }

  function delete_table($table,$row,$id) {
    $this->db->where($row, $id);
    $this->db->delete($table);
    if ($this->db->affected_rows() > 0 ) {
      return TRUE;
    }else{
      return FALSE;
    }
  }

  function update_table($table,$data,$row,$id){
    $this->db->where($row,$id);
    $this->db->update($table, $data);
    if ($this->db->affected_rows() > 0 ) {
      return TRUE;
    }else{
      return FALSE;
    }

  }



function update_table2($table,$data,$where){
    $this->db->where($where);
    $this->db->update($table, $data);
    if ($this->db->affected_rows() > 0 ) {
      return TRUE;
    }else{
      return FALSE;
    }
  }

  

  /* --------------------------------------------------------------------------------------------------- */
    public function _get_datatables_query($column,$table,$column_order,$column_search,$default_order,$where,$joins)
    {
        $this->db->select($column);
        $this->db->from($table);
 
        $i = 0;
     
        foreach ($column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (is_array($joins) && count($joins) > 0)
        {
            foreach($joins as $k => $v)
            {
                $this->db->join($v['table'], $v['condition'], $v['jointype']);
            }
        }
        
        if($where!=""){
          $this->db->where($where);
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($default_order))
        {
            $order = $default_order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($column,$table,$column_order,$column_search,$default_order,$where,$joins)
    {
        $this->_get_datatables_query($column,$table,$column_order,$column_search,$default_order,$where,$joins);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($column,$table,$column_order,$column_search,$default_order,$where,$joins)
    {
        $this->_get_datatables_query($column,$table,$column_order,$column_search,$default_order,$where,$joins);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($table,$where,$joins)
    {
        $this->db->from($table);
        if (is_array($joins) && count($joins) > 0)
        {
            foreach($joins as $k => $v)
            {
                $this->db->join($v['table'], $v['condition'], $v['jointype']);
            }
        }
        
        if($where!=""){
          $this->db->where($where);
        }
        return $this->db->count_all_results();
    }

    public function get_last_data($variable,$table,$by){
        return $this->db->select('*')->order_by($variable,$by)->limit(1)->get($table)->row();
      }

   public function get_count_data($table){
      $query = $this->db->query('SELECT * FROM '.$table);
      return $query->num_rows();
      }


     

    /*---------------------------------------------------------------------------------------------------*/
  
}