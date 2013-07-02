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
	public function __construct()
	{
		parent::__construct();
		$this->current_user=$this->session->userdata('logged_in');
	}
	public function index()
	{
		$this->load->helper('file');
		if($postdata=$this->input->post())
		{//print_r($postdata);
			//load template to apply
			//$preview_data = $this->load->view('T/'.$postdata['template'].'_html',$postdata,true);
			$preview_data = "Hello world";	
			if($this->current_user)
			{
				//user logged in
				$file_name=$this->current_user['id'];
				$temp_path_html=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
			}
			else
			{
				//user not logged in 
				$file_name=mt_rand().time();
				$temp_path_html=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
				$temp_path_img=FCPATH.$this->config->item('path_temp_img').$file_name.'.jpg';
				
				$style="<style>body { background-image:url('".FCPATH."assets/img/digitalchakra_logo.jpg'); } </style>";
				$preview_data = $style.$preview_data;
				
			}
			if(!write_file($temp_path_html, $preview_data))
			{
				$data['success']='no';
				$data['msg']='Unable to write file';
				$result['resultset']=$data;
			}
			else
			{
				$data['image']='no';
				if(!$this->current_user)
				{					
					// Command to execute
					$command = FCPATH."application/third_party/wkhtmltoimage-i386 --load-error-handling ignore";
					
					// Putting together the command for `shell_exec()`
					$ex = "$command " . $temp_path_html ." ". $temp_path_img;
					
					// Generate the image
					$output = shell_exec($ex);
				
					//remove html
					unlink($temp_path_html);
					
					
					//set returning image type yes
					$data['image']='yes';
				}
				$data['success']='yes';
				$data['html']=$file_name;
				$result['resultset']=$data;
				//$data['html']=$preview_html;
				//$data['css']=$postdata['css'];
				//$data['link']=$tempnam;
				//$this->load->view('preview',$data);
			}
			$this->load->view('json',$result);
		}
		else
		{
			redirect('home', 'refresh');	
		}
	}
	function page()
	{
		//preview inside application
		$this->load->helper('file');
		$html = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
		if($this->current_user)
		{
			$content = read_file(FCPATH.$this->config->item('path_temp_file').$html.".html");
		}
		else
		{
			$content = '<img src="'.base_url($this->config->item('path_temp_img').$html.'.jpg').'" >';
		}
		$data['html']=$content;
		$data['link']=$html;
		$data['user_id']=$this->current_user['id'];
		$data['view_page'] = 'preview';
		//$this->load->view('template', $data);
		$this->load->view('preview',$data);	
	}
	function resume()
	{
		//online link for user
		$this->load->helper('file');
		$data['link'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
		$data['view_page'] = 'onlinePreview';
		$this->load->view('template', $data);
		//$this->load->view('onlinePreview',$data);	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
