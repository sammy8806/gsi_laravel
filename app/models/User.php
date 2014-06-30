<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait, SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    protected $fillable = [
        'first_name', 'last_name', 'email', 'customLoginName',
        'lastLogin', 'lastLoginIP', 'lastLoginDate', 'active',
        'address', 'phone', 'cellnumber'
    ];
    protected $guarded = ['password'];
    protected $dates = ['deleted_at'];

    public function gameservers()
    {
        return $this->hasMany('Gameserver');
    }

//    public function tickets()
//    {
//        return $this->hasMany('Ticket');
//    }
//
//    public function actionLogEntrys()
//    {
//        return $this->hasMany('ActionLogEntry');
//    }

}
