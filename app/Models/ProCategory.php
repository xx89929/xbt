<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class ProCategory extends Model
{
    use ModelTree, AdminBuilder;
    protected $table = 'product_category';
    public $timestamps = false;
}
