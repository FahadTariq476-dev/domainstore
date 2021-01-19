<?php
function formate_template_name($val)
{
    $keys = ['default', 't1', 't2', 't3'];
    $temps = array('default' => 'Default', 't1' => 'Template1', 't2' => 'Template2', 't3' => 'Template3');

    return in_array($val, $keys) ? $temps[$val] : 'Default';
}

function view_file_name($val)
{
    $keys = ['default', 't1', 't2', 't3'];
    $views = array('default' => 'default.index', 't1' => 'template1.index', 't2' => 'template2.index', 't3' => 'template3.index');

    return in_array($val, $keys) ? $views[$val] : $views['default'];
}

function format_dquery($json)
{
    $obj = json_decode($json);

    $str = '';
    foreach($obj as $k=>$v)
        {$str .= '<b>'.$k.'</b> '.$v.' | ';}
    
    return $str;

}

function getDomains()
{
    if(!empty(session('domains')))
        return session('domains');
    else
    {
        $domains = DB::table('domains')->where(['user_id' => Auth::user()->id])->pluck('url', 'id');
        session(['domains' => $domains]);
        return $domains;
    }
}


?>