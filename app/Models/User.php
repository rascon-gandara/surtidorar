<?php

/*****************************************************************
* Author: Rascon, Roberto
*
* Date: 2019-07-03
*
* Description; defines structure and model relationships
*               for User model
*
*****************************************************************/

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /* TABLE STRUCTURE:
      id_user INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      employee_id VARCHAR(100) UNIQUE COMMENT 'Manual input',
      name VARCHAR(100) NOT NULL,
      lastname VARCHAR(100),
      email VARCHAR(100) UNIQUE,
      nickname VARCHAR(100) UNIQUE NOT NULL,
      user_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    */

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
      'employee_id', 'name', 'lastname', 'email', 'nickname'
    ];

    /**
    * The attributes that should be hidden for arrays.
    * @var array
    */
    protected $hidden = [
      'password', 'remember_token'
    ];

    /**
    * Define if timestamps are used in table.
    * @var bool
    */
    public $timestamps = false;

    /**
    * Table name.
    * @var string
    */
    protected $table = 'users';

    /**
    * Primary Key name.
    * @var string
    */
    protected $primaryKey = 'id_user';

    /* Relationships between models */
}
