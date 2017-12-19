<?php

class Domain extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'domains';

	protected $fillable = [
		'server_id',
		'provider_id',
		'domain',
		'status',
		'hidden',
	];
}