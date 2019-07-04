<?php

/*****************************************************************
* Author: Rascon, Roberto
*
* Date: 2019-07-03
*
* Description; defines structure and model relationships
*               for Product model
*
*****************************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /* TABLE STRUCTURE:
      id_product INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      code VARCHAR(100) NULL UNIQUE COMMENT 'Manual input',
      product_name VARCHAR(100),
      wholesale_price DECIMAL(7,2) NULL,
      retail_price DECIMAL(7,2) NULL,
      belongs_to_category INT UNSIGNED NOT NULL COMMENT 'Foreign key to categories table',
      belongs_to_store INT UNSIGNED NOT NULL COMMENT 'Foreign key to stores table',
      product_image VARCHAR(100) NULL COMMENT 'If product will need image',
      is_active BOOLEAN NOT NULL DEFAULT TRUE,
      CONSTRAINT product_belongs_to_category FOREIGN KEY(belongs_to_category) REFERENCES categories(id_category) ON UPDATE CASCADE ON DELETE RESTRICT,
      CONSTRAINT product_belongs_to_store FOREIGN KEY(belongs_to_store) REFERENCES stores(id_store) ON UPDATE CASCADE ON DELETE RESTRICT
    */

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
      'code', 'product_name', 'wholesale_price', 'retail_price',
      'belongs_to_category', 'belongs_to_store', 'product_image',
      'is_active'
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
    protected $table = 'products';

    /**
    * Primary Key name.
    * @var string
    */
    protected $primaryKey = 'id_product';

    /* Relationships between models */

    /**
    * Returns category for product.
    * @var Category
    */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'belongs_to_category', 'id_category');
    }

    /**
    * Returns store for product.
    * @var Store
    */
    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'belongs_to_store', 'id_store');
    }
}
