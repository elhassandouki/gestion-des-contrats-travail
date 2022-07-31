<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Employee;
use App\Contrats;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return View('grh.employe.view');
    }
    public function get_data(Request $request){
        
        $displayLength = $request->input('iDisplayLength');
        $displayStart  = $request->input('iDisplayStart');
        
        $sortCol       = $request->input('iSortCol_0');
        $SortDir       = $request->input('sSortDir_0');

        $search        = $request->input('sSearch');

        $q = Employee::where('id','>',0);


        if($search!=null){
            $q->where(function($query)use($search){
                return $query->where('id','like','%'.$search.'%')
                ->orWhere('cin','like','%'.$search.'%')
                ->orwhere('nom','like','%'.$search.'%')
                ->orWhere('prenom','like','%'.$search.'%')
                ->orWhere('ddn','like','%'.$search.'%')
                ->orWhere('date_entree','like','%'.$search.'%')
                ->orWhere('sexe','like','%'.$search.'%')
                ->orWhere('situation_familiale','like','%'.$search.'%');
            });
        }

        if($sortCol==0){
            $q->orderby('id',$SortDir);
        }elseif($sortCol==1){
            $q->orderby('cin',$SortDir);
        }elseif($sortCol==2){
            $q->orderby('nom',$SortDir);
        }elseif($sortCol==3){
            $q->orderby('prenom',$SortDir);
        }elseif($sortCol==4){
            $q->orderby('ddn',$SortDir);
        }elseif($sortCol==5){
            $q->orderby('date_entree',$SortDir);
        }elseif($sortCol==6){
            $q->orderby('sexe',$SortDir);
        }elseif($sortCol==7){
            $q->orderby('situation_familiale',$SortDir);
        }
        $q2    = $q;

        $iTotalDisplayRecords = $q2->orderby('cin')->count();
        $employe = $q->orderby('cin')->offset($displayStart)
                ->limit($displayLength)->get(); 
        return [
            'iTotalRecords' => Employee::count(),
            'iTotalDisplayRecords' => $iTotalDisplayRecords,
            'aaData' => $employe
        ];
    }

    public function get($cin){

       $Employee =  Employee::where('cin',$cin)->first();
       //$Contrats =  Contrats::where('cin_employee',$cin)->get();

        return  View('grh.employe.index',[
            
            'Employee' => $Employee
            //'Contrats' => $Contrats,
        ]);
        
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id',0);

        if(Employee::where('id','<>',$id)->where('cin',$request->input('cin'))->count()>0){
            return view('alerts.operation',[
                'b'   => false,
                'msg' => 'Employee déja existe !!'
            ]);
        }

        $Employee = Employee::find($id);
     
        if($Employee==null)
            $Employee = new Employee;

            $Employee->id                           = $request->input('id');;
            $Employee->cin                          = $request->input('cin');
            $Employee->prenom                       = $request->input('prenom');
            $Employee->nom                          = $request->input('nom');
            $Employee->ddn                          = Carbon::createFromFormat('d/m/Y',$request->input('ddn'))->toDateString();
            $Employee->lieu                         = $request->input('lieu');
            $Employee->date_validite_cin            = Carbon::createFromFormat('d/m/Y',$request->input('date_validite_cin'))->toDateString();
            $Employee->adresse                      = $request->input('adresse');
            $Employee->sexe                         = $request->input('sexe');
            $Employee->situation_familiale          = $request->input('situation_familiale');
            $Employee->ville                        = $request->input('ville');
            $Employee->nombre_enfants               = $request->input('nombre_enfants');
            $Employee->nationalite                  = $request->input('nationalite');
            $Employee->date_entree                  = Carbon::createFromFormat('d/m/Y',$request->input('date_entree'))->toDateString();
            $Employee->numero_cnss                  = $request->input('numero_cnss');
            $Employee->rib                          = $request->input('rib');
            $Employee->telephone                    = $request->input('telephone');
            $Employee->personee_acontact            = $request->input('personee_acontact');
            $Employee->equipe                       = $request->input('equipe');
            $Employee->transporteur                 = $request->input('transporteur');
            $Employee->region                       = $request->input('region');
            $Employee->Ville_2                      = $request->input('Ville_2');
            $Employee->pays                         = $request->input('pays');
            $Employee->adresse_actuelle             = $request->input('adresse_actuelle');
            $Employee->fonction                     = $request->input('fonction');
            $Employee->categorie_professionnelle    = $request->input('categorie_professionnelle');
            $Employee->departement                  = $request->input('departement');
            $Employee->user_add                     = $request->input('user_add');
            $Employee->user_update                  = $request->input('user_update');
            $Employee->user_add                     = "test_01";
            $Employee->user_update                  = "test_01";

            $Employee->save();

            return view('alerts.operation',[
                    'b' => true,
                    'msg' => 'Opération terminée'
            ]);
        



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
