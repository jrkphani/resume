
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
	 
 }
 function search()
 {
 	$str = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
 	echo $str; die;
 }
}

?>

