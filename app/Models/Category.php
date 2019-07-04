<?php

/*****************************************************************
* Author: Rascon, Roberto
*
* Date: 2019-07-03
*
* Description; defines structure and model relationships
*               for Category model
*
*****************************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /* TABLE STRUCTURE:
      id_category INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      category_name VARCHAR(100) UNIQUE NOT NULL COMMENT 'Must be UNIQUE to avoid confusion',
      category_image VARCHAR(255) NULL COMMENT 'If pictures for categories will be used',
      category_created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    */

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
      'category_name', 'category_image'
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
    protected $table = 'categories';

    /**
    * Primary Key name.
    * @var string
    */
    protected $primaryKey = 'id_category';

    /* Relationships between models */
}
