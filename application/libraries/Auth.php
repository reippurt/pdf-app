<?php

Class Auth{

	protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
    }

	public function credentials($email, $password)
	{
		$result = false;

		$query = $this->CI->db->get_where('users', array('loginEmail'=>$email));

		if($query->num_rows() == 1)
		{
			$user = $query->row();
			
			if( password_verify( $password, $user->loginPassword ) ){
				
				$response = array('content'=>'Du er logget ind', 'class'=>'success');
				$result = $user;	

			} else {
				$response['content'] = "Adgangskoden matcher ikke til " . $email;
			}
		
		} else {
			$response['content'] = "Vi kunne ikke genkende email";
		}

		$this->CI->session->set_flashdata('response', $response);

		return $result;
	}

	public function startSession($user)
	{

		$user_data = array(
			'logged_in' => 1,
			'email' => $user->loginEmail,
			'name' => $user->name
		);

		$this->CI->session->set_userdata($user_data);
	}

	public function logout()
	{
		$this->CI->session->sess_destroy();
	}

}

?>