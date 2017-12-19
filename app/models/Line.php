<?php

class Line extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lines';

	protected $fillable = [
        'project_id',
        'description',
        'type', 
        'price', 
        'hours', 
        'hidden',
    ];
}