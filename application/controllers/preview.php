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
		if($this->session->userdata('logged_in'))
	   {
		$this->load->helper('file');
		if($postdata=$this->input->post())
		{
		//echo "<pre>";
		//print_r($postdata);
		$preview_html = $this->load->view('T/'.$postdata['template'].'_html',$postdata,true);
		$tempnam=mt_rand().time();
		$temppath=FCPATH.'tmp/files/'.$tempnam.'.html';
		if (!write_file($temppath, $preview_html))
			{
				$data['success']='no';
				$data['msg']='Unable to write file';
				$result['resultset']=$data;
				$this->load->view('json',$result);
			}
			else
			{
				$data['success']='yes';
				$data['html']=$tempnam;
				$result['resultset']=$data;
				$this->load->view('json',$result);
				//$data['html']=$preview_html;
				//$data['css']=$postdata['css'];
				//$data['link']=$tempnam;
				//	$this->load->view('preview',$data);	
			}
		}
		else
		{
		redirect('login', 'home');	
		}
	}
	else
	{
		redirect('login', 'refresh');
	}
	}
	function page()
	{
		$this->load->helper('file');
		$html = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
		//echo $html; die;
		$content = read_file(FCPATH."/tmp/files/".$html.".html");
		$data['html']=$content;
		$data['link']=$html;
		$data['view_page'] = 'preview';
		//$this->load->view('template', $data);
		$this->load->view('preview',$data);	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
