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
			$data['view_page'] = 'download';
			$data['html']=base_url('download/pdf/'.$html);
			$this->load->view('template', $data);
		}
		else
		{
			echo "404"; exit(0);
		}
		
		//$this->load->view('home');
	}
	function pdf()
	{
		//mpdf
	$html = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	if($html)
	{
	$this->load->helper('file');
	$this->load->library('mpdf');
	$htmlpath=FCPATH.'tmp/files/'.$html.'.html';
	$content=read_file($htmlpath);
	//echo $content; die;
	#new mPDF('utf-8','A4', 0, '', 0, 0, 0, 0, 10, 10, 'L');
	$mpdf = new mPDF('utf-8','A4', 0, '', 0, 0, 0, 0, 40, 40);
	//$mpdf->useOnlyCoreFonts = true;
	$mpdf->SetDisplayMode('fullpage');
	//$mpdf->SetAutoFont(0);
	$mpdf->WriteHTML($content);
	//$mpdf->Output();
	$mpdf->Output('Resume.pdf','D');
	}
	else
		{
			echo "404"; exit(0);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
