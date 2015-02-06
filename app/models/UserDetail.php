<?php


class UserDetail extends Eloquent {

	//use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_details';
	protected $primaryKey='id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
  public function Udetails()
    {
        return $this->belongsTo('User');
    }
   
}
