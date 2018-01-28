<?php

namespace App\Admin\Extensions\Tools;

use App\Models\MemberType;
use Encore\Admin\Admin;
use Encore\Admin\Grid\Tools\AbstractTool;
use Illuminate\Support\Facades\Request;

class UserType extends AbstractTool
{
    protected function script()
    {
        $url = Request::fullUrlWithQuery(['type' => '_type_']);

        return <<<EOT

$('input:radio.user-type').change(function () {

    var url = "$url".replace('_type_', $(this).val());

    $.pjax({container:'#pjax-container', url: url });

});

EOT;
    }

    public function render()
    {
        Admin::script($this->script());
        $member_type = MemberType::all()->pluck('title','id');

        $options = $member_type->prepend('所有会员');

        return view('admin.tools.user_type', compact('options'));
    }
}