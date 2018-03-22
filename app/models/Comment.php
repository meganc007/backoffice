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
		'user_id',
		'post_id',
		'parent_id',
		'comment',
		'internal',
		'hidden',
	];

	public function children()
    {
        return $this->hasMany('Comment', 'parent_id')->with('children');
    }

}