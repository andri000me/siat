<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Cetak_model extends CI_Model {
 
    function __construct()
	{
		parent::__construct();
    }
    
    public function get_inventaris()
    {
        $query = $this->db->get('inventaris');
        return $query->result_array();
    }
}
?>