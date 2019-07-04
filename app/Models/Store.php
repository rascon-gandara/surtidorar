<?php

/*****************************************************************
* Author: Rascon, Roberto
*
* Date: 2019-07-03
*
* Description; defines structure and model relationships
*               for Store model
*
*****************************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /* TABLE STRUCTURE:
      id_store INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      store_name VARCHAR(100) UNIQUE NOT NULL COMMENT 'Must be UNIQUE to avoid confusion',
      street_address VARCHAR(300) NULL,
      belongs_to_region INT UNSIGNED NOT NULL COMMENT 'Foreign key to categories table',
      store_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
      CONSTRAINT store_belongs_to_region FOREIGN KEY(belongs_to_region) REFERENCES regions(id_region) ON UPDATE CASCADE ON DELETE RESTRICT
    */

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
      'store_name', 'street_address', 'belongs_to_region'
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
    protected $table = 'stores';

    /**
    * Primary Key name.
    * @var string
    */
    protected $primaryKey = 'id_store';

    /* Relationships between models */

    /**
    * Returns region for store.
    * @var Region
    */
    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'belongs_to_region', 'id_region');
    }

    /**
    * Returns product collection for store.
    * @var Product collection
    */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'id_store', 'belongs_to_store');
    }
}
