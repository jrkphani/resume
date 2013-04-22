<?
class Upload extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('image_lib');
      #$this->load->model('files_model');
      #$this->load->database();
      #$this->load->helper('url');
   }
   public function index()
   {
      $this->load->view('upload');
   }
   public function upload_file()
{
   $status = "";
   $msg = "";
   $file_element_name = 'userfile';
   if ($status != "error")
   {
      $config['upload_path'] = FCPATH.'tmp/img/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']  = 1024 * 8;
      $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload($file_element_name))
      {
         $result['status'] = 'error';
         $result['msg'] = $this->upload->display_errors('', '');
      }
      else
      {
		 /*database
         //$data = $this->upload->data();
         //$file_id = $this->files_model->insert_file($data['file_name'], $_POST['title']);
         
         if($file_id)
         {
            $status = "success";
            $msg = "File successfully uploaded";
         }
         else
         {
            unlink($data['full_path']);
            $status = "error";
            $msg = "Something went wrong when saving the file, please try again.";
         }*/
        $data = $this->upload->data();
        $config['image_library'] = 'gd2';
		$config['source_image'] = $data['full_path'];
		$new_file_name=mt_rand().time().$data['file_ext'];
		$config['new_image'] = $data['file_path'].$new_file_name;
		//$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 70;
		$config['height'] = 75;
		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
		if (!$this->image_lib->resize())
		{
			unlink($data['full_path']);
            $result['status'] = "error";
            $result['msg'] = "Something went wrong when saving the file, please try again.";
			//echo $this->image_lib->display_errors();
		}
		else
		{
		unlink($data['full_path']);
        $result['status'] = "success";
        $result['msg'] = "File successfully uploaded";
        $result['imgUrl'] = base_url('tmp/img').'/'.$new_file_name;
        $result['fname'] = $new_file_name;
		}
      }
      //@unlink($_FILES[$file_element_name]);
   }
   echo json_encode($result);
}
}
?>
