<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$html = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
		if($html)
		{
			$htmlpath=FCPATH.'temp/files/'.$html;
			$results = shell_exec('python '.FCPATH.'py/pdf.py '.$htmlpath);
			if($results)
			{
				echo "SUCCESS";
				$data['pdf']=$htmlpath;
				$this->load->view('download',$data);
			}
			else
			{
				echo "FAILED"; exit(0);
			}
			#echo ' python '.FCPATH.'py/pdf.py '.$htmlpath;
		}
		else
		{
			echo "404"; exit(0);
		}
		
		//$this->load->view('home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
