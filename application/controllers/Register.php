
<?php defined('BASEPATH') OR exit('No direct script access allowed');

		class Register extends CI_Controller  {

		    public function __construct()
		    {

		      parent::__construct();
		      $this->load->database();
		      $this->load->library('session');
		      $this->load->helper('Lookup_helper');
		    }

		    function index()
			{
				$this->load->view('project/register.php');
			}

			function register_user()
			{
				
									$image = '';
								;

				
								 $first_name= $this->input->post('first_name');
						       
								 $email= $this->input->post('email');
					       
								 $password= $this->input->post('password');
					       
								 $project_id= '9718';
					       
								 $random_id= rand();
					       
								 $role= $this->input->post('role');
					       

				$data = array(
									'first_name' => $first_name,
								  
								'email' => $email,
							  
								'password' => $password,
							  
								'project_id' => $project_id,
							  
								'random_id' => $random_id,
							  
								'role' => $role,
							  );

				$this->db->insert('project_user',$data);

				redirect('login');
			}

		 }