<?php
  /**
   * model for the blog views
   */
  class blogmodel extends CI_Model
  {
    // function to store the data
    function process()
    {
      $title=$this->input->post('head');
      $desc=$this->input->post('body');
      $data = array('Title' => $title,'Body'=>$desc);
      $this->db->insert('test',$data);
    }
    // function to read the data
    public function retrievepost()
    {
      $this->db->from('test');
      $qur=$this->db->get();
      return $qur->result();
    }
    public function editBlog($pid)
    {

      $this->db->from('test');
      $this->db->where('id',$pid);
			$query=$this->db->get();
			return $query->result();
    }
    public function updateBlog($title,$desc,$id)
    {
      $data = array('title' =>$title ,'body' =>$desc);
      $this->db->update('test',$data,array('id' => $id));
      return true;
    }
    public function deleteBlog($id)
    {
      $this->db->where('id',$id);
      $this->db->delete('test');
      return true;
    }
  }

 ?>
