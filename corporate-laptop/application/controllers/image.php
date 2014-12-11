<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('mgallery');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('session');
		$this->load->library('tinyauth');
		$this->tinyauth->restrict();
		
		$this->load->helper(array('form', 'url'));
		
    }
	
	function upload(){
		$funcNum = $_GET['CKEditorFuncNum'] ;
		$url = base_url().'uploads/'.$_FILES["upload"]["name"];
		$message =$this->UploadImageFile();
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '".$url."', '".$message."');</script>";
	}
	
	function UploadImageFile(){
		$warning = '';
		if ( strncasecmp($_FILES["upload"]["type"], "image/", 6)  == 0 ){
			if ($_FILES["upload"]["error"] > 0){
				$warning = "Return Code: " . $_FILES["upload"]["error"] ;
			} else {
				$file_name = $_FILES["upload"]["name"];
				$move_to_file = "./uploads/" . $file_name;
				$this->mgallery->save_image_post($file_name);

				if (file_exists($move_to_file))
				{
					$warning = $file_name . " already exists.";
				}
				else
				{
					if( !@move_uploaded_file($_FILES["upload"]["tmp_name"], $move_to_file) )
					{
						$warning = 'Upload Failed!';
					}
				}
			}
		} else {
			$warning = "Invalid file";
		}
		return $warning;
	}
	
	function browse(){
		$funcNum = $_GET['CKEditorFuncNum'];
		echo '<iframe style="width:100%; height: 98%; background: none repeat scroll 0 0 #F9F9F9;border: 1px solid #CDCDCD;" src="'.base_url().'image/select/"></iframe>';
		echo "<script type='text/javascript'>function GetFuncNum(){ return '".$funcNum."'; }</script>";
	}
	
	function select(){
		echo '
		<style>
		.thumbs {
			background: none repeat scroll 0 0 #CCCCCC;
			cursor: pointer;
			float: left;
			margin: 2px;
			padding: 4px;
		}
		.thumbs img{
			height:150px;
			width:auto;
		}
		.navi{
		    background: none repeat scroll 0 0 #EEEEEE;
			border-bottom: 1px solid #CCCCCC;
			margin: -8px;
			padding: 10px;
			position: fixed;
			width: 100%;
		}
		.img-content{
			padding-top: 60px;
		}
		.navi button{
			background: linear-gradient(to bottom, #FCFCFC 0%, #E7E7E7 100%) repeat scroll 0 0 transparent;
			border: 1px solid #CCCCCC;
			color: #595959;
			font-family: Arial,Helvetica,sans-serif;
			font-size: 11px;
			font-weight: bold;
			padding: 5px 15px;
		}
		</style>
		';
		echo $this->BrowseImageFile();
		echo "<script type='text/javascript'>
			function selectFile(filename){
				var sel_file='".base_url()."uploads/'+filename;
				window.parent.window.opener.CKEDITOR.tools.callFunction(window.parent.GetFuncNum(), sel_file, '');
				window.parent.window.close();}
			function cancelSelectFile(){window.parent.window.close();}
			</script>";
	}
	function IsSupportedImgFile($filename)
	{
		$supported_type = array('gif', 'jpeg', 'jpg', 'pjpeg', 'png', 'bmp');
		return in_array(end(explode(".", $filename)), $supported_type);
	}

	function BrowseImageFile()
	{
		$s = '<div class="navi"><button onClick="cancelSelectFile()">Cancel</button></div><div class="img-content">';
		$location = './uploads/';
		$files = scandir($location);
		foreach($files as $filename)
		{
			$this_file = $location.'/'.$filename;
			if( is_file($this_file) && $this->IsSupportedImgFile($filename) )
			{
				$s .= '<div class="thumbs" id="'.$filename.'" onClick="selectFile(this.id)">
						<a><img src="'.base_url().$this_file.'"></a>
					</div>';
			}
		}
		$s .= '<div style="clear:both";></div></div>';
		return $s;
	}
}
?>