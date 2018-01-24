<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class WangEditor extends Field
{
    protected $view = 'admin.wang-editor';

    protected static $css = [
        '/packages/wangEditor/release/wangEditor.min.css',
    ];

    protected static $js = [
        '/packages/wangEditor/release/wangEditor.min.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $token = csrf_token();
        $this->script = <<<EOT

        var E = window.wangEditor
        var editor = new E('#{$this->id}');
        
        editor.customConfig.zIndex = 0
        editor.customConfig.uploadImgServer = '/WangImgUp'
        editor.customConfig.uploadFileName = 'wang_editor_file'
        editor.customConfig.uploadImgMaxSize = 1024 * 1024
        editor.customConfig.uploadImgParams = {
            _token: "{$token}"   
        }
        editor.customConfig.onchange = function (html) {
            $('input[name=$name]').val(html);
        }
        editor.create()

EOT;
        return parent::render();
    }
}
