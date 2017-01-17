<?php

 class Task_model  extends CI_Model{

 	public function __construct($value='')
 	{
 		parent::__construct();

 		 $id = '';
 	}

 	public function task_data()
 	{
 		$ury = $this->db->get('task');
 		return $ury->result();
 		/*if ($user != '' && $pass != ''){
 			$query = $this->db->get_where('users', array( 'user_email' => $user ,'user_password' => $pass));
 			$query= $query->row();
 			if(isset($query->user_id))
 			$this->id = $query->user_id ;
 			//$query->free_result();
 				
 				$query = $this->db->get_where('task' , array('user_id' => $query->user_id));

 				if($query->num_rows()>0){
 					return $query->result();
 				}else{
 					return FALSE;
 				}
 			}else{
 				return FALSE;
 			
 		}*/
 	}
 	public function task_update($id, $array)
 	{
 		$query = $this->db->where('task_id',$id);
 		$query = $this->db->update('task',$array);
 		if ($query) {
 			return "update successfull";
 		}else{
 			return "update failed".$this->db-error();
 		}
 	}
 	public function task_del($id,$tbl)
 	{
 		
 		$query = $this->db->delete($tbl,array('task_id' => $id));
 		if ($query) {
 			return "row deleted id=".$id;
 		}else{
 			return "row delete failed id=".$id;
 		}
 	}
 	public function task_insert($value='', $tbl)
 	{
 		$query = $this->db->insert($tbl, $value);
 		if ($query && $this->db->affected_rows()>0) {
 			$query = $this->db->get($tbl);
 			if($query->num_rows()>0)
 				return $query->result();
 		}else{
 			return $this->db->error();
 		}
 	}
 }