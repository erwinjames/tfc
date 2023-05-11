<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	class Quires extends CI_Model {
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function show($table_name){
			$query = $this->db->get($table_name);
			return $query->result(); 
		}
		public function show_where($table_name){
			$this->db->where('tcf_flag_stat',0);
			$query = $this->db->get($table_name);
			return $query->result(); 
		}
		public function show_where_tcf($table_name,$condition,$value){
			$this->db->where($condition,$value);
			$query = $this->db->get($table_name);
			return $query->result(); 
		}
		function insert_batch($table_name, $data)
		{
			$this->db->insert_batch($table_name, $data);
		}
	function insert_mlecs_record($records,$reviewer)
	{
		$table_id = 1;
		$this->db->select('tcf_record_table_id');
		$this->db->from('tcf_record');
		$query = $this->db->get();
		$existing_records = $query->result();

		foreach ($records['tcf_list_id'] as $index => $processing_id) {
			foreach ($existing_records as $record) {
				if ($record->tcf_record_table_id == $table_id) {
					$table_id++;
				}
			}
			$insertedRecord = array(
				'tcf_record_table_id' => $table_id,
				'tcf_list_id' => $records['tcf_list_id'][$index]
			);
			$cra_records_succ = $this->db->insert('tcf_record', $insertedRecord);
		}

		$this->db->insert('tcf_reviewer_sign',$reviewer);
		$record_id = $records['tcf_list_id'];
		$this->db->where_in('tcf_list_id', $record_id);
		$this->db->set('tcf_flag_stat', 1);
		$this->db->update('tcf_list');

	}

	public function update_field($id, $field, $value)
	{
		$this->db->where('tcf_list_id ', $id);
		$this->db->set($field, $value);
		$this->db->update('tcf_list');
		return ($this->db->affected_rows() > 0);
	}
	public function update_where_tcf($data, $id, $table_name) {
		$this->db->where('tcf_record_table_id', $id);
		$this->db->update($table_name, $data);
		if($this->db->affected_rows() > 0){
			$this->db->where('tcf_record_table_id', $id);
			$this->db->set('review_status', 1);
		    $this->db->update('tcf_record');
		}
	}
	}