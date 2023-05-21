<?php

namespace App\Services;

use Illuminate\Http\Request;

class LogFilter
{
    private \SplFileInfo $file;

    public function __construct(\SplFileInfo $file)
    {
        $this->file = $file;
    }

    public function valid(Request $request)
    {
        $c_file_size = $this->file->getSize();
        $c_utime = $this->file->getATime();
        $c_ctime = $this->file->getCTime();
        $c_ctime = mktime(date('H',$c_ctime),date('i',$c_ctime),0,date('m',$c_ctime),date('d',$c_ctime),date('Y',$c_ctime));
        $u_ctime = $this->file->getATime();
        $u_ctime = mktime(date('H',$u_ctime),date('i',$u_ctime),0,date('m',$u_ctime),date('d',$u_ctime),date('Y',$u_ctime));
        $c_file_name = $this->file->getFilename();
        $file_size_cmp = $request->get('file_size_cmp');
        $file_size = $request->get('file_size');
        $file_name = $request->get('file_name');
        $file_date_start_cmp = $request->get('cr_file_date_start_cmp');
        $file_date_start = $request->get('cr_file_date_start');
        $file_date_end_cmp = $request->get('cr_file_date_end_cmp');
        $file_date_end = $request->get('cr_file_date_end');
        $file_date_start_cmp_up = $request->get('up_file_date_start_cmp');
        $file_date_start_up = $request->get('up_file_date_start');
        $file_date_end_cmp_up = $request->get('up_file_date_end_cmp');
        $file_date_end_up = $request->get('up_file_date_end');

        $valid = true;

        if ($file_size) {
            switch ($file_size_cmp) {
                case '>':
                    $valid&= $c_file_size > $file_size ;
                    break;
                case '>=':
                    $valid&= $c_file_size  >= $file_size;
                    break;
                case '<':
                    $valid&= $c_file_size < $file_size;
                    break;
                case '<=':
                    //dd($file_size_cmp,$file_size,$c_file_size,$c_file_name);
                    $valid&= $c_file_size <= $file_size;
                    break;
                case '=':
                    $valid&= $file_size == $c_file_size;
                    break;
            }
        }
        if ($file_name) {
            $valid&= stripos($c_file_name, $file_name) !== false;
        }

        if ($file_date_start) {
            $start_date = (new \DateTime($file_date_start,new \DateTimeZone('Europe/Paris')))->getTimestamp();
            switch (strtolower($file_date_start_cmp)) {
                case 'on':
                    //dd($start_date,$c_ctime);
                    $valid&= $start_date == $c_ctime;
                    break;
                case 'ofter':
                    $valid&=  $start_date >= $c_ctime;
                    break;
                case 'before':
                    $valid&=  $start_date <= $c_ctime;
                    break;
            }
        }

        if ($file_date_end) {
            $end_date = (new \DateTime($file_date_end,new \DateTimeZone('Europe/Paris')))->getTimestamp();
            switch (strtolower($file_date_end_cmp)) {
                case 'on':
                    $valid&= $end_date == $c_utime;
                    break;
                case 'ofter':
                    $valid&=  $end_date >= $c_utime;
                    break;
                case 'before':
                    $valid&=  $end_date <= $c_utime;
                    break;

            }
        }


        if ($file_date_start_up) {
            $start_date = (new \DateTime($file_date_start_up,new \DateTimeZone('Europe/Paris')))->getTimestamp();
            switch (strtolower($file_date_start_cmp_up)) {
                case 'on':

                    $valid&= $start_date == $u_ctime;
                    break;
                case 'ofter':
                    $valid&=  $start_date >= $u_ctime;
                    break;
                case 'before':
                    $valid&=  $start_date <= $u_ctime;
                    break;
            }
        }

        if ($file_date_end_up) {
            $end_date = (new \DateTime($file_date_end_up,new \DateTimeZone('Europe/Paris')))->getTimestamp();
            switch (strtolower($file_date_end_cmp_up)) {
                case 'on':
                    $valid&= $end_date == $u_ctime;
                    break;
                case 'ofter':
                    $valid&=  $end_date >= $u_ctime;
                    break;
                case 'before':
                    $valid&=  $end_date <= $u_ctime;
                    break;

            }
        }

        return $valid;



    }
}
