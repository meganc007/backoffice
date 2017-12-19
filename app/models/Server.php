<?php

class Server extends Eloquent 
{
	protected $table = 'servers';

	protected $fillable = [
		'provider_id',
		'company_id',
		'username',
		'url',
		'password',
		'status',
		'hidden',
	]; 
}