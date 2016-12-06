<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Users extends Eloquent {
	 protected $fillable = ['firstName', 'lastName', 'age', 'avatar', 'email', 'phone'];
}