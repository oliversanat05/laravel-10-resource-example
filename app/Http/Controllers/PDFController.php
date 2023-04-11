<?php

namespace App\Http\Controllers;

use App\Http\Resources\VMapResource;
use App\Models\Vmap;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function createPDF()
    {
        $vmaps = Vmap::get();

        $pdf = PDF::loadView('pdf.pdf', compact('vmaps'));
        return $pdf->download('vmap.pdf');
    }

    public function index(Request $request)
    {
        // $vmaps = Vmap::where('userId', 940)->whereIn('isDelete', [1, -1])->with(['values' => function ($query) {
        //     $query->with(['kpis' => function($query) {
        //         $query->with(['strategies' => function ($query) {
        //             $query->with(['projects' => function ($query) {
        //                 $query->with(['criticalActivities']);
        //             }]);
        //         }]);
        //     }]);
        // }])->get();

        $include = $request->query('include'); //to pass relationship in parameters

        $pageSize = $request->query('pageSize') ?? 10000;

        $include = explode('.', $include);

        $vmaps = Vmap::where('userId', 940)->whereIn('isDelete', [1, -1])->with((isset($include[0]) && ($include[0] == 'values')) ? [$include[0] => function ($query) use ($include) {

            $query->where('isDelete', true)->with((isset($include[1]) && ($include[1] == 'kpis')) ? [$include[1] => function ($query) use ($include) {

                $query->where('isDelete', false)->whereIn('statusId', [0, 1, 2])->with((isset($include[2]) && ($include[2] == 'strategies')) ? [$include[2] => function ($query) use ($include) {

                    $query->where('isDelete', false)->whereIn('statusId', [0, 1, 2])->with((isset($include[3]) && ($include[3] == 'projects')) ? [$include[3] => function ($query) use ($include) {

                        $query->where('isDelete', false)->whereIn('statusId', [0, 1, 2])->with((isset($include[4]) && ($include[4] == 'criticalActivities')) ? [$include[4] => function ($query) {

                            $query->where('isDelete', false)->whereIn('statusId', [0, 1, 2])->orderBy('cOrder');

                        }] : [])->orderBy('pOrder');

                    }] : [])->orderBy('sOrder');

                }] : [])->orderBy('kOrder');

            }] : [])->orderBy('displayOrder');

        }] : [])->orderBy('formTitle', 'ASC')->paginate($pageSize); // vMap table

        // return $vMap;
        return VMapResource::collection($vmaps);
    }
}
