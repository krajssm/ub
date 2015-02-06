<?php
class UserController extends BaseController {

    /**
     * Show the profile for the given user.
     */
   /* public function showProfile($id)
    {die('2');
        $user = User::find($id);

        return View::make('user.profile', array('user' => $user));
    }*/
    public function getIndex()
    {
		      $users = User::all();
		      //echo "<pre>";print_r($users);		  die('3');

		return View::make('users')->with('users', $users);



		     //  $user = User::find($id);
		     //  print_r($user);
		  //return View::make('user.profile', array('user' => $user));
    }

	public function login()
	{
		if (Auth::check())
		{
			// The user is logged in...
			return Redirect::to('dashboard');
		}
		else
		{
			//$user = User::find(1);
			//Auth::login($user);
		}

			return View::make('users/login');
	
	}
	
	

	public function logout()
	{
			Auth::logout();
			return Redirect::to('login');
	
	}
	
	
	public function loginPost()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				return Redirect::to('dashboard');

			} else {

				// validation not successful, send back to form
				return Redirect::to('login');

			}

		}
	}


	public function dashboard()
	{

		
		if (!Auth::check())
		{
			return Redirect::to('login');
		}
		else
		{
			
			$id = Auth::id();
			$users = User::find($id);
			$data = User::find($id)->details;
			//echo "<pre>";print_r($data);
		}

		return View::make('users/dashboard')->with(array('usersData'=> $users,'usersDetail'=> $data));
	
	}
	
	
		
	public function dashboardPost()
	{
		$id = Auth::id();
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
			'name' => 'required||min:5' // name can only be alphanumeric and has to be greater than 5 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('dashboard')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication

    $user = User::find($id); /// HERE!
    $user->email = Input::get("email");
    $user->name = Input::get("name");
    if ( Input::get("password") != ""){
         $user->password = Hash::make(Input::get("password")); 
    }
    // $user->details = new UserDetail();
     $user->details->address = Input::get('address');
     $user->details->pincode = Input::get('pincode');

    $user->push();



		}
						return Redirect::to('dashboard');

	}


}
