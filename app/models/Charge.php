<?php

class Charge extends Eloquent 
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'charges';

	protected $fillable = [
		'line_id',
		'user_id',
		'hours',
		'hidden',
	];
}