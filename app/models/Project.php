<?php

class Project extends Eloquent 
{
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $table = 'projects';

	protected $fillable = [
		'company_id',
		'domain_id',
		'user_id',
		'name',
		'type',
		'status',
		'status_date',
		'hidden',
	];

}