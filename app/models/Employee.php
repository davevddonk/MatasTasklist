<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Employee extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	protected $fillable = ['firstname', 'lastname', 'email', 'password']; // Array van velden die 'auto' ingevuld mogen worden ['email', 'firstname', 'lastname']

	//protected $guarded = [];

	// public function getFirstnameAttribute($firstname)
	// {
	// 	return '"' . $firstname . '"';
	// }

	// public function setFirstnameAttribute($value)
	// {
	// 	$this->attributes['firstname'] = $value;
	// }

	// public function setTitleAttribute($value)
	// {
	// 	$this->attributes['title'] = $value;
	// 	$this->attributes['slug'] = maakMooieSlug($value);
	// }

	// public function getFullnameAttribute()
	// {
	// 	return $this->firstname . ' ' . $this->lastname;
	// }

	// public function setPasswordAttribute($password)
	// {
	// 	$this->attributes['password'] = Hash::make($password);
	// }


}