<?php

class Post extends Eloquent 
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'posts';

	protected $fillable = [
		'company_id',
		'user_id',
		'project_id',
		'line_id',
		'charge_id',
		'comment',
		'internal',
		'hidden',
	];

	public function comments()
    {
        return $this->hasMany('Comment');
    }
}