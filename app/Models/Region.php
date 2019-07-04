<?php

/*****************************************************************
* Author: Rascon, Roberto
*
* Date: 2019-07-03
*
* Description; defines structure and model relationships
*               for Region model
*
*****************************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /* TABLE STRUCTURE:
      id_region INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      region_name VARCHAR(100) UNIQUE NOT NULL COMMENT 'Must be UNIQUE to avoid confusion',
      region_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    */

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
      'region_name'
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
    protected $table = 'regions';

    /**
    * Primary Key name.
    * @var string
    */
    protected $primaryKey = 'id_region';

    /* Relationships between models */

    /**
    * Returns store collection for region.
    * @var Store collection
    */
    public function stores()
    {
        return $this->hasMany('App\Models\Store', 'id_region', 'belongs_to_region');
    }
}
