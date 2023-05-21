<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Routing\Route;

class LogController extends Controller
{

    private $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function index(Request $request, int $categ = 0)
    {
        $categorys = $this->logService->getLogCategory();
        $logs = $this->logService->getCategLogs($categ);
        return view("Log.index",[
            'categorys' => $categorys,
            'logs' => $logs,
            'selectedCateg' => $categ,
            'data_filter' => []
        ]);
    }


    function indexFilter(Request $request)
    {
        $categ = $request->get('selected_categ');
        $categorys = $this->logService->getLogCategory();
        $logs = $this->logService->getCategLogs($categ,$request);
        return view("Log.index",[
            'categorys' => $categorys,
            'logs' => $logs,
            'selectedCateg' => $categ,
            'data_filter' => $request->all()
        ]);
    }
}
