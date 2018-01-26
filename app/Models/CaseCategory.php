<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class CaseCategory extends Model
{
    use ModelTree, AdminBuilder;

    protected $table = 'case_category';
    public $timestamps = false;
}
