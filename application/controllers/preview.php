<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preview extends CI_Controller {

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
		$this->load->helper('file');
		$preview_html = $this->load->view('tohtml',"",true);
		$tempnam=mt_rand().time();
		$temppath=FCPATH.'temp/files/'.$tempnam.'.html';
		if (!write_file($temppath, $preview_html))
			{
				 echo 'Unable to write the file';
			}
			else
			{
				$data['html']=$preview_html;
				$data['link']=$tempnam;
				$this->load->view('preview',$data);	
			}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
