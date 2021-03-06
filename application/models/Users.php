<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Users extends Eloquent {
	protected $fillable = ['userName', 'password', 'firstName', 'lastName', 'age', 'avatar', 'email', 'phone', 'roleId'];

	public function role()
	{
		return $this->belongsTo('Roles', 'roleId');
	}
}