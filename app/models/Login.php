<?php

class Login extends Eloquent 
{
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $table = 'logins';

	protected $fillable = [
		'company_id',
		'server_id',
		'domain_id',
		'username',
		'password',
		'login_type',
		'url',
		'comments',
	];
}