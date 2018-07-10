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
    // function to get the edit blog details
    public function editBlog($pid)
    {

      $this->db->from('test');
      $this->db->where('id',$pid);
			$query=$this->db->get();
			return $query->result();
    }
    // function to update the editted blog
    public function updateBlog()
    {
      $title=$this->input->post('head');
      $desc=$this->input->post('body');
      $id=$this->input->post('id');
      $data = array('title' =>$title ,'body' =>$desc);
      $this->db->update('test',$data,array('id' => $id));
      return true;

    }
    //function to delete the blog
    public function deleteBlog($id)
    {
      $this->db->where('id',$id);
      $this->db->delete('test');
      return true;
    }
  }

 ?>
