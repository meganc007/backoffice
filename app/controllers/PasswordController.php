<?php

class PasswordController extends Controller {
	
	public function getForgotPassword()
	{
		return View::make('passwords.index');
	}

	public function postForgotPassword()
	{
		$valid = Validator::make(Input::all(), [
			'email' => 'required|email',
		]);

		if ( !$valid->fails() ) 
		{
			$email = Input::get('email');

			$user = User::where('email', $email)->first();

			if ( isset($user->email) && $email == $user->email ) 
			{

				$reset_token = str_random(64);
				$email = $user->email;

				$user->reset_token = $reset_token;
				$user->token_time = Carbon::now();
				$user->save();

				Mail::send('emails.reset', ['email' => $email, 'reset_token' => $reset_token], function($message) 
					use ($email, $reset_token) {
			        $message->from('mncommings@gmail.com')->to($email)->subject('Reset your password');
			    });


				return Redirect::route('signin')
					->with('info', "We've sent you an email with password reset instructions.");

			}
			else
			{
				return Redirect::back()->with('info', "That's not a valid email");
			}
		}
		else 
		{
			return Redirect::back()->withErrors($valid);
		}
	}//end postForgotPassword()

	public function getResetPassword() {
		return View::make('passwords.update');
	}

	public function postResetPassword() {
		
		$valid = Validator::make(Input::all(), [
			'password' => 'required|same:confirm_password',
			'confirm_password' => 'required|same:password',
		]);

		if ( !$valid->fails() ) 
		{
			$email = Request::segment(2);
			$reset_token = Request::segment(3);

			if ( isset($email) && isset($reset_token) ) {
				$user = User::where('email', $email)->first();

				$token_time = new Carbon($user->token_time); 

				if ( $reset_token == $user->reset_token && Carbon::now() < $token_time->addHours(12) ) {
					
					$user->password = Hash::make( Input::get('password') );
					$user->save();

					return Redirect::route('signin')->with('info', "You have successfully reset your password");
				}
				else
				{
					return Redirect::route('forgot')->with('info', "That link has expired. Please request a new one.");
				}
			}
			
		}
		else
		{
			return Redirect::back()->withErrors($valid);
		}

	}

}