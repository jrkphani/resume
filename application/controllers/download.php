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
	public function __construct()
	{
		parent::__construct();
		$this->current_user=$this->session->userdata('logged_in');
		/*if(!$this->current_user)
		{
			redirect('login', 'refresh');
		}*/
	}
	public function index()
	{
		$this->load->model('user');
		$id_encrypt = ($this->uri->segment(3)) ? urldecode($this->uri->segment(3)) : NULL;
		$html = $this->user->get_id($id_encrypt);
		if($html)
		{
			$data['view_page'] = 'download';
			$data['html']=base_url('download/wk_html_to_pdf/'.$html);
			//$data['html']=base_url('download/pdf/'.$html);
			$this->load->view('template', $data);
		}
		else
		{
			echo "404"; exit(0);
		}
		
		//$this->load->view('home');
	}
	function activation()
	{
		$this->load->helper('file');
		$this->load->model('user');
		$id_encrypt = ($this->uri->segment(3)) ? urldecode($this->uri->segment(3)) : NULL;
		$html = $this->user->get_id($id_encrypt);
		
		if($html)
		{						
			$resultdata['view_page'] = 'activate_download';
			$resultdata['html']=base_url('download/wk_html_to_pdf/'.$html);
			$this->load->view('template', $resultdata);
		}
		else
		{
			echo "404"; exit(0);
		}
   	}
	function pdf()
	{
		//mpdf
	$html = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	if($html)
	{
		// Set name of pdf file will be download
		if($this->current_user)
			$download_pdf_name=$this->current_user['firstname'].' '.$this->current_user['lastname'].' Resume.pdf';
		else
			$download_pdf_name='Resume.pdf';

		$this->load->helper('file');
		$this->load->library('mpdf');
		$htmlpath=FCPATH.$this->config->item('path_temp_file').$html.'.html';
		$content=read_file($htmlpath);
		//echo $content; die;
		#new mPDF('utf-8','A4', 0, '', 0, 0, 0, 0, 10, 10, 'L');
		$mpdf = new mPDF('utf-8','A4', 0, '', 0, 0, 0, 0, 40, 40);
		//$mpdf->useOnlyCoreFonts = true;
		$mpdf->SetDisplayMode('fullpage');
		//$mpdf->SetAutoFont(0);
		$mpdf->WriteHTML($content);
		//$mpdf->Output();
		$mpdf->Output($download_pdf_name,'D');

		unlink($htmlpath);	// Delete html file after convertion
	}
	else
		{
			echo "404"; exit(0);
		}
	}

	//convert input html file to pdf using wkhtmlpdf convertor and ask for download
	function wk_html_to_pdf()
	{
		$html = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
		if($html)
		{
			/*if($this->current_user)
			{
				$pdf_name=$this->current_user['id'].'.pdf';		// If user logged in user ID will the name, else random number and current time.
				$download_pdf_name=$this->current_user['firstname'].' '.$this->current_user['lastname'].' Resume.pdf';	// If user logged in, First and Last Name used for name the downloading pdf file
			}
			else
			{
				$pdf_name=mt_rand().'_'.time().'.pdf';
				$download_pdf_name='Resume.pdf';
			}*/
			
			$pdf_name=$html.'.pdf';
			$download_pdf_name='Resume.pdf';
				
			$html_path=FCPATH.$this->config->item('path_temp_file').$html.'.html';	// html file path
			$pdf_path=FCPATH.$this->config->item('path_temp_file').$pdf_name;	// path for where generated pdf file have to save
			$wk_path=FCPATH.'application/third_party/./wkhtmltopdf-i386';	// wkhtmlpdf file path
			$comm=$wk_path.' '.$html_path.' '.$pdf_path;
			
			shell_exec($comm);	// Exececute command on terminal
			unlink($html_path);	// Delete html file after convertion
			
			if(!$this->current_user)
			$this->session->sess_destroy();
			if (file_exists($pdf_path) && is_readable($pdf_path) && preg_match('/\.pdf$/',$pdf_path))
			{
				// Ask for download pdf file
				header('Content-Type: application/pdf');
				header("Content-Disposition: attachment; filename=\"$download_pdf_name\"");
				readfile($pdf_path);
			}
			else
			{
				header("HTTP/1.0 404 Not Found");
				echo "<h1>Error 404: File Not Found: <br /><em>$pdf_path</em></h1>";
			}
		}
		else
		{
			echo "404"; exit(0);
		}
	}
}