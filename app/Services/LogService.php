<?php
namespace App\Services;

use App\Models\Category;
use App\Models\LogKd;
use Illuminate\Http\Request;
use App\Services\LogFilter;


class LogService
{

    public function getLogCategory()
    {
        $categs = Category::all();
        return $categs;
    }


    public function getCategLogs($categId,?Request $request = null)
    {
        if($categId == 0) {
            $logsConf = LogKd::all();
        } else {
            $logsConf = LogKd::where('category_id' ,$categId)->get();
        }

        $logs = [];
        foreach ($logsConf as $conf)
        {
            $file_path = $conf->file_path;
            $file_extensions = json_decode($conf->extensions,true);
            $pattern = $conf->pattern;
            if(empty($pattern)) {
                $pattern = '.';
            }
            foreach ($file_extensions as $ext)
            {
                $g = new \RegexIterator(new \GlobIterator("$file_path/*.$ext"),"/$pattern/");
                foreach($g as $fileinfo) {
                    $file_path = $fileinfo->getpathName();
                    $filter = new LogFilter($fileinfo);
                    if($request && !$filter->valid($request)) {
                        continue;
                    }
                    $logs[] = $fileinfo;
                }
            }
        }
        uasort($logs,function ($a,$b){
            return $b->getMTime() - $a->getMTime();
        });
        return $logs;
    }
}
