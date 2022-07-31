<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ferme;

class FermeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('grh.ferme.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
     public function get_data(Request $request){
        
        $displayLength = $request->input('iDisplayLength');
        $displayStart  = $request->input('iDisplayStart');
        
        $sortCol       = $request->input('iSortCol_0');
        $SortDir       = $request->input('sSortDir_0');

        $search        = $request->input('sSearch');

        $q = Ferme::where('id','>',0);


        if($search!=null){
            $q->where(function($query)use($search){
                return $query->where('n_ferme','like','%'.$search.'%')
                ->orWhere('ferme','like','%'.$search.'%')
                ->orwhere('color_ferme','like','%'.$search.'%')
                ->orWhere('admin_ferme','like','%'.$search.'%')
                ->orWhere('gerant_ferme','like','%'.$search.'%')
                ->orWhere('adresse','like','%'.$search.'%');
            });
        }

        if($sortCol==0){
            $q->orderby('n_ferme',$SortDir);
        }elseif($sortCol==1){
            $q->orderby('ferme',$SortDir);
        }elseif($sortCol==2){
            $q->orderby('color_ferme',$SortDir);
        }elseif($sortCol==3){
            $q->orderby('admin_ferme',$SortDir);
        }elseif($sortCol==4){
            $q->orderby('gerant_ferme',$SortDir);
        }elseif($sortCol==5){
            $q->orderby('adresse',$SortDir);
        }
        $q2    = $q;

        $iTotalDisplayRecords = $q2->orderby('n_ferme')->count();
        $Ferme = $q->orderby('n_ferme')->offset($displayStart)
                ->limit($displayLength)->get(); 
        return [
            'iTotalRecords' => Ferme::count(),
            'iTotalDisplayRecords' => $iTotalDisplayRecords,
            'aaData' => $Ferme
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
