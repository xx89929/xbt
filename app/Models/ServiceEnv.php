<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class ServiceEnv extends Model
{
    use ModelTree, AdminBuilder;
    protected $table = 'xbt_service_env';

    public $timestamps = false;

}
