<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_manufacturer($array){

        $name = $array['manufacturer'];
        $query=$this->db->query("SELECT * FROM manufacturers WHERE name ='$name'");
        $data_res = $query->num_rows();
        if($data_res){
            echo "exists";
        }else{
            $result = "INSERT INTO manufacturers (name) VALUES (".$this->db->escape($name).")";
            $this->db->query($result);
            $inserted_id = $this->db->insert_id();

            if($inserted_id){
                echo "inserted";
            }
            else{
                echo "failed";
            }
        }   
    }

    public function manufacturers_data(){

        $query=$this->db->query("SELECT * FROM manufacturers WHERE is_active=1");
        $num = $query->num_rows();
        if ($num > 0) {
            $data_result = $query->result();
            return $data_result;    
        }else{
            echo "error";
        }
    }

    public function add_car_model($array){

        $name = $array['car_model_name'];
        $manufacturer = $array['manufacturer_list'];
        $count = $array['car_model_count'];
        
        $result = "INSERT INTO car_model (name,count,manufacturers_name) VALUES (".$this->db->escape($name).",".$this->db->escape($count).",".$this->db->escape($manufacturer).")";
            
        $this->db->query($result);
        $inserted_id = $this->db->insert_id();

        if($inserted_id){
            echo "inserted";
        }
        else{
            echo "failed";
        }
    }

    public function inventory_data() {

        $query=$this->db->query("SELECT * FROM car_model WHERE is_active=1");
        $num = $query->num_rows();
        if ($num > 0) {
            $data_result = $query->result();
            return $data_result;    
        }else{
            echo "error";
        }
    }

    public function sold_item($array)
    {
        $id = $array['new_id'];
        $query = "UPDATE car_model SET count = count - 1 WHERE id = ".$id;
        
        if($this->db->query($query)){

            $check_count = "SELECT count FROM car_model WHERE id=".$id;
            $count = $this->db->query($check_count)->result();

            if($count[0]->count == 0){

                $delete_record = "UPDATE car_model SET is_active = 0 WHERE id = ".$id;
                $data = $this->db->query($delete_record);
                if($data){
                    echo "record deleted";
                }
            }else{
                echo "deleted";
            }
        }else {
            echo "false";
        }
    }
}