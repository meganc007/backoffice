<?php

/**
* 
*/
class Company extends Eloquent
{
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	protected $fillable = [
        'name',
        'user_id',
        'address', 
        'city', 
        'state',
        'zip',
        'phone',
        'category_id',
        'hidden',
    ];
}