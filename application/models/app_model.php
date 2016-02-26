<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Model extends CI_Model {

	/**
	 * @author :Egi Gusniawan Pradana
	 * @keterangan : Model untuk menangani semua query database aplikasi web
	 **/


	public function getLogin($usr,$psw) {
		$u = mysql_real_escape_string($usr);
		$p = mysql_real_escape_string($psw);
		$cek_login = $this->db->get_where('login', array('username' => $u, 'password' => $p));
		if(count($cek_login->result())>0) {
			foreach($cek_login->result() as $data) {
				$sess_data['logged_in'] = true;
				$sess_data['username'] = $data->username;
				$sess_data['ses_kcfinder']=array();
            	$sess_data['ses_kcfinder']['disabled'] = false;
            	$sess_data['ses_kcfinder']['uploadURL'] = "../../content_upload";

				$this->session->set_userdata($sess_data);
			}
			header('location:'.base_url().'admin/beranda');
		} else {
			header('location:'.base_url().'admin');
		}
	}

	public function getBerita($table,$limit,$offset) {		
		$this->db->from($table);
		$this->db->limit($limit,$offset);
		$this->db->order_by("id", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getAllBerita($table) {
		return $this->db->get($table);
	}

	public function insertBerita($table,$data) {
		return $this->db->insert($table,$data);		
	}

	public function getEditBerita($table,$id) {
		$this->db->from($table);
		$this->db->where('id',$id);
		return $this->db->get();
	}

	public function goEditBerita($table,$data,$id) {
		return $this->db->update($table,$data,$id);
	}

	public function deleteBerita($table,$id) {
		return $this->db->delete($table,array('gambar_berita'=>$id));	
	}

	public function getProduk($table,$limit,$offset) {		
		$this->db->from($table);
		$this->db->limit($limit,$offset);
		$this->db->order_by("id", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function insertProduk($table,$data) {
		return $this->db->insert($table,$data);		
	}

	public function getEditProduk($table,$id) {
		$this->db->from($table);
		$this->db->where('id',$id);
		return $this->db->get();
	}

	public function goEditProduk($table,$data,$id) {
		return $this->db->update($table,$data,$id);
	}

	public function deleteProduk($table,$id) {
		return $this->db->delete($table,array('gambar_produk'=>$id));		
	}


	/******KATEGORI******/
	public function getKategori($table,$limit,$offset) {		
		$this->db->from($table,$limit,$offset);
		$this->db->limit($limit,$offset);
		$this->db->order_by("id", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getAllKategori($table) {
		return $this->db->get($table);
	}

	public function getKategoriBy($table,$field) {		
		$this->db->from($table);
		$this->db->where("jenis_kategori", $field);
		$query = $this->db->get(); 
		return $query;
	}

	public function insertKategori($table,$data) {
		$this->db->from($table);
		$this->db->where('nama_kategori',$data['nama_kategori']);
		$q = $this->db->get();
		if($q->num_rows()>0) {
			return false;
		} else {
			return $this->db->insert($table,$data);	
		}	
	}

	public function getEditKategori($table,$id) {
		$this->db->from($table);
		$this->db->where('id',$id);
		return $this->db->get();
	}

	public function goEditKategori($table,$data,$id) {
		return $this->db->update($table,$data,$id);
	}

	public function deleteKategori($table,$id) {
		return $this->db->delete($table,$id);
	}

	/******END KATEGORI******/


	/******HALAMAN******/

	public function getHalaman($table,$limit,$offset) {		
		$this->db->from($table,$limit,$offset);
		$this->db->limit($limit,$offset);
		$this->db->order_by("id", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getAllHalaman($table) {
		return $this->db->get($table);
	}

	public function insertHalaman($table,$data) {
		return $this->db->insert($table,$data);		
	}

	public function getEditHalaman($table,$id) {
		$this->db->from($table);
		$this->db->where('id',$id);
		return $this->db->get();
	}

	public function goEditHalaman($table,$data,$id) {
		return $this->db->update($table,$data,$id);
	}

	public function deleteHalaman($table,$id) {
		return $this->db->delete($table,$id);
	}

	/******END HALAMAN******/



	public function getBanner($table) {		
		$this->db->from($table);	
		$this->db->order_by("id", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getIdBanner($table,$x) {		
		$this->db->from($table);	
		$this->db->where("id",$x);
		$query = $this->db->get(); 
		return $query;
	}

	public function editBanner($table,$data,$getId) {
		return $this->db->update($table,$data,$getId);		
	}



	public function getGallery($table,$limit,$offset) {		
		$this->db->from($table,$limit,$offset);
		$this->db->limit($limit,$offset);
		$this->db->order_by("id_foto", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getAllGallery($table) {
		return $this->db->get($table);
	}

	public function insertGallery($table,$key) {
		return $this->db->insert($table,$key);		
	}

	public function deleteGallery($table,$id) {
		return $this->db->delete($table,$id);
	}

	
	/******MENU******/

	public function getMenu($table,$limit,$offset) {
		$this->db->from($table,$limit,$offset);
		$this->db->limit($limit,$offset);
		$this->db->order_by("id_menu", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getAllMenu($table) {
		return $this->db->get($table);
	}

	public function insertMenu($table,$data) {
		return $this->db->insert($table,$data);		
	}

	public function getEditMenu($table,$id) {
		$this->db->from($table);
		$this->db->where('id_menu',$id);
		return $this->db->get();
	}

	public function getListMenu($table,$id) {
		$this->db->from($table);
		$this->db->where_not_in('id_menu',$id);
		return $this->db->get();
	}

	public function goEditMenu($table,$data,$id) {
		return $this->db->update($table,$data,$id);
	}

	public function deleteMenu($table,$id) {
		return $this->db->delete($table,$id);
	}

	/******END MENU******/



	public function getNum($table,$field) {
		$this->db->select_max($field);
		return $this->db->get($table);
	}

	public function getContentBanner($table) {		
		$this->db->from($table);
		$this->db->order_by("id", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getContentBerita($table,$limit,$offset) {		
		$this->db->from($table);
		$this->db->where('status','Tampil');
		$this->db->limit($limit,$offset);
		$this->db->order_by("id", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getContentProduk($table,$limit,$offset) {		
		$this->db->from($table);
		$this->db->where('status','Tampil');
		$this->db->limit($limit,$offset);
		$this->db->order_by("id", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getContentGallery($table,$limit,$offset) {		
		$this->db->from($table);
		$this->db->limit($limit,$offset);
		$this->db->order_by("id_foto", "desc");
		$query = $this->db->get(); 
		return $query;
	}

	public function getDetailProduk($table,$id) {
		$this->db->from($table);
		$this->db->where('id',$id);
		return $this->db->get();
	}


	/*PAGE*/

	public function getDetailHalaman($table,$key) {
		$this->db->from($table);
		$this->db->where('url_halaman',$key);
		return $this->db->get();
	}

}