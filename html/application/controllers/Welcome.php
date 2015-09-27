<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	function __construct(){
		parent::__construct();
		$this->load->model('Database_info', '', TRUE);
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login_form');
		$this->load->view('signup_form');
		$this->load->view('footer');
	}

	// login
	public function login()
	{

		if($this->input->post('usertype') == "user"){

			$data["users"] = $this->Database_info->ulogin($this->input->post('email'),$this->input->post('password'));
	

			if($data["users"][0]->userId){

				$id = $data["users"][0]->userId;

				$this->session->set_userdata('isloggedin', 'user');
				$data['users'] = $this->Database_info->profile($id);
				$data['listItem'] = $this->Database_info->user_item($id);
				$this->session->set_userdata('uid', $id);

				
				

			
	 			$this->load->view('header');
				$this->load->view('profile',$data);
				$this->load->view('footer');
			
			}else{
	
				session_unset(); 
				session_destroy();
				$this->load->view('header');
				$this->load->view('login_form');
				$this->load->view('signup_form');
				$this->load->view('footer');
			
			}
		}elseif($this->input->post('usertype') == "viewer"){

			$data["users"] = $this->Database_info->vlogin($this->input->post('email'),$this->input->post('password'));
			
	
			if($data["users"][0]->userId){
				
				$this->session->set_userdata('isloggedin', 'viewer');
				$id = $data["users"][0]->userId;
				$data['users'] = $this->Database_info->profile($id);
				$data['listItem'] = $this->Database_info->user_item($id);

				

			
	 			$this->load->view('header');
				$this->load->view('viewer_profile',$data);
				$this->load->view('footer');
			
			}else{
	
				session_unset(); 
				session_destroy();
				$this->load->view('header');
				$this->load->view('login_form');
				$this->load->view('signup_form');
				$this->load->view('footer');
			
			}

		}else{

			session_unset(); 
			session_destroy();
			$this->load->view('header');
			$this->load->view('login_form');
			$this->load->view('signup_form');
			$this->load->view('footer');
		
		}

		

	}

	// User View
	public function signup()
	{

		$this->session->set_userdata('isloggedin', 'user');
		$udata = $this->Database_info->new_user($this->input->post('email'),$this->input->post('upassword'),$this->input->post('vpassword'),
												$this->input->post('fname'),$this->input->post('lname'),$this->input->post('address'),
												$this->input->post('city'),$this->input->post('state'),$this->input->post('zip'));
		
		$data["users"] = $this->Database_info->ulogin($this->input->post('email'),$this->input->post('upassword'));
		$id = $data["users"][0]->userId;
		$this->session->set_userdata('isloggedin', 'user');
		$data['users'] = $this->Database_info->profile($id);
		$data['listItem'] = $this->Database_info->user_item($id);
		$this->session->set_userdata('uid', $id);

				
				

			
	 			$this->load->view('header');
				$this->load->view('profile',$data);
				$this->load->view('footer');

	}

	// Buyer View
	public function profile()
	{

		if($this->session->isloggedin == "user"){

			$data['users'] = $this->Database_info->profile($this->session->uid);
			$data['listItem'] = $this->Database_info->user_item($this->session->uid);

	 		$this->load->view('header');
			$this->load->view('profile',$data);
			$this->load->view('footer');

		} else {

			session_unset(); 
			session_destroy();
			$this->load->view('header');
			$this->load->view('login_form');
			$this->load->view('signup_form');
			$this->load->view('footer');

		}
	}

	public function add()
	{
		if($this->session->isloggedin == "user"){

			
			$udata = $this->Database_info->new_item($this->input->post('url'),$this->input->post('itemName'),$this->input->post('itemPrice'), $this->session->uid);
			
			$this->load->view('header');
			$this->load->view('add_form');
			$this->load->view('footer');

		} else {

			session_unset(); 
			session_destroy();
			$this->load->view('header');
			$this->load->view('login_form');
			$this->load->view('signup_form');
			$this->load->view('footer');

		}
	}

	public function add_View()
	{
		if($this->session->isloggedin == "user"){

			$this->load->view('header');
			$this->load->view('add_form');
			$this->load->view('footer');

		} else {

			session_unset(); 
			session_destroy();
			$this->load->view('header');
			$this->load->view('login_form');
			$this->load->view('signup_form');
			$this->load->view('footer');

		}
	}

	// Edit view
	public function edit_view()
	{
		if($this->session->isloggedin == "user"){

			$data['listItem'] = $this->Database_info->item($this->input->get('id'));
			$data['listItem'][0]->userId = $this->input->get('id');
			$this->load->view('header');
			$this->load->view('edit_item',$data);
			$this->load->view('footer');

		} else {

			session_unset(); 
			session_destroy();
			$this->load->view('header');
			$this->load->view('login_form');
			$this->load->view('signup_form');
			$this->load->view('footer');

		}
	}

	// Edit
	public function edit()
	{
		if($this->session->isloggedin == "user"){

			if($this->input->post('itemName') !== "" && $this->input->post('itemPrice') !== ""){
				
				$data = $this->Database_info->edit($this->input->post('itemId'),$this->input->post('itemName'),$this->input->post('itemPrice'));
			
			} elseif ($this->input->post('itemName') !== "" && $this->input->post('itemPrice') == ""){

				$data = $this->Database_info->edit($this->input->post('itemId'),$this->input->post('itemName'),$this->input->post('oitemPrice'));

			} elseif ($this->input->post('itemName') == "" && $this->input->post('itemPrice') !== ""){

				$data = $this->Database_info->edit($this->input->post('itemId'),$this->input->post('oitemName'),$this->input->post('itemPrice'));

			} else{

				$data = $this->Database_info->edit($this->input->post('itemId'),$this->input->post('oitemName'),$this->input->post('oitemPrice'));

			}
			
			$data['users'] = $this->Database_info->profile($this->session->uid);
			$data['listItem'] = $this->Database_info->user_item($this->session->uid);

	 		$this->load->view('header');
			$this->load->view('profile',$data);
			$this->load->view('footer');

		} else {

			session_unset(); 
			session_destroy();
			$this->load->view('header');
			$this->load->view('login_form');
			$this->load->view('signup_form');
			$this->load->view('footer');

		}
	}

	// Delete view
	public function delete_view()
	{
		if($this->session->isloggedin == "user"){
			
			$data['listItem'] = $this->Database_info->item($this->input->get('id'));
			$data['listItem'][0]->userId = $this->input->get('id');
			
			$this->load->view('header');
			$this->load->view('delete_item',$data);
			$this->load->view('footer');
		
		} else {

			session_unset(); 
			session_destroy();
			$this->load->view('header');
			$this->load->view('login_form');
			$this->load->view('signup_form');
			$this->load->view('footer');

		}
	}

	// Delete
	public function delete()
	{
		if($this->session->isloggedin == "user"){
			
			$udata = $this->Database_info->delete($this->input->post('itemId'));
			$data['users'] = $this->Database_info->profile($this->session->uid);
			$data['listItem'] = $this->Database_info->user_item($this->session->uid);

	 		$this->load->view('header');
			$this->load->view('profile',$data);
			$this->load->view('footer');
		
		} else {

			session_unset(); 
			session_destroy();
			$this->load->view('header');
			$this->load->view('login_form');
			$this->load->view('signup_form');
			$this->load->view('footer');

		}
	}

	// Logout
	public function logout()
	{
		session_unset(); 
		session_destroy();
		$this->load->view('header');
		$this->load->view('login_form');
		$this->load->view('signup_form');
		$this->load->view('footer');

	}

}
?>