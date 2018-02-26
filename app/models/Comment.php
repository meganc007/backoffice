<?php

class Comment extends Eloquent 
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'comments';

	protected $fillable = [
		'company_id',
		'user_id',
		'project_id',
		'line_id',
		'charges_id',
		'parent',
		'child',
		'comment',
		'internal',
		'hidden',
	];
}