<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use ModelTree, AdminBuilder;
    protected $table = 'area';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('area_order');
        $this->setTitleColumn('area_name');
    }

    public function scopeGetId($query,$id){
        $query->where('id',$id);
    }


    public function scopeProvince()
    {
        return $this->where('area_type', 1);
    }
    public function scopeCity()
    {
        return $this->where('area_type', 2);
    }
    public function scopeDistrict()
    {
        return $this->where('area_type', 3);
    }

    public function parent()
    {
        return $this->belongsTo(Area::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Area::class, 'parent_id');
    }
    public function brothers()
    {
        return $this->parent->children();
    }

    public static function options($id)
    {
        if (! $self = static::find($id)) {
            return [];
        }
        return $self->brothers()->pluck('area_name', 'id');
    }

    public function rele_area_addr(){
        return $this->hasMany(MemberOrAddr::class);
    }
}
