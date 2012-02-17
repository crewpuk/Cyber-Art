<?php  if( ! defined("BASEPATH")) exit("No direct script access allowed");
class Ubah extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('cyber_model'));
		$this->load->helper(array('form','css','html'));
        $this->load->library(array('table','session','admin_panel'));
	}

	function generate_name($digit=20){
	    $max=$digit;
	    $name='';
	    for($i=0;$i<$max;$i++){
	        if($i%8==0 && $i>0)$name.="_";
	        $name.=rand(0,9);
	    }
	    return $name;
	}
	function image_name($path,$file_name){
	    $name=$this->generate_name();
	    $i=0;
	    $e=explode('.',$file_name);
	    $ext=$e[count($e)-1];
	    while($i<1){
	        if(file_exists($path.$name.'.'.$ext))$name=$this->generate_name();
	        else $i++;
	    }
	    return $name.'.'.$ext;
	}


	function posting($id){
		if(isset($_POST['update_posting'])){
			$path='images/art/';

			$set = array(
				'tanggal'=>date('Y-m-d'),
				'title'=>$_POST['judul'],
				'isi'=>$_POST['isi'],
				'kategori'=>$_POST['kategori'],
				'view'=>0
				);

			if(($_POST['ganti_gambar']=='1'&&$_FILES['gambar']['size']!=0)||$_FILES['gambar']['size']!=0){
				$image_name=$set['image']=$this->image_name($path,$_FILES['gambar']['name']);
			}
				$simpan = move_uploaded_file($_FILES['gambar']['tmp_name'], $path.$image_name);

				$this->db->set($set)->where('id',$_POST['id'])->update('m_posting');
			
			echo('<script>window.parent.location="'.base_url().'administrator/dashboard/posting/";</script>');
		}
		else{
			$data = $this->cyber_model->get_id('m_posting',$id);
			$table .= form_open(base_url()."administrator/ubah/posting/".$id,array("enctype"=>"multipart/form-data"));
			$tmpl = array('table_open','<table cellpadding="5" cellspacing="0" width="100%"');

			$gambar_upload=form_upload('gambar');
			if(!file_exists('images/art/'.$data->image)){
				$gambar_upload = 'File rusak<br>';
				$gambar_upload.=form_upload('gambar');
			}
			elseif($data->image!=""||$data->image!==NULL){
				$gambar_upload='<img src="'.base_url().'images/art/'.$data->image.'" style="max-width:75px;max-height:50px;" /><br>';
				$gambar_upload.='<label><input type="checkbox" name="ganti_gambar" value="1" /> Ubah gambar?</label><br>'.form_upload('gambar');
			}

			$list = array(
			'Judul',form_hidden('id',$data->id).form_input('judul',$data->title),
			'Isi',form_textarea('isi',$data->isi),
			'Kategori',form_input('kategori',$data->kategori),
			'Gambar',$gambar_upload,
			'',form_submit('update_posting','Update').form_reset('reset','Reset')
			);
			$new_list = $this->table->make_columns($list,2);
			$this->table->set_template($tmpl);
			$table .= $this->table->generate($new_list);
			$table .= form_close();
			echo($table);
		}	
	}
}