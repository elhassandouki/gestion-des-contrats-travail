<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Etat\Fpdf;
use Carbon\Carbon;
use Auth;

use App\Contrats;
use App\Employee;

use DB;

use App\Structure\Views\vContrats;


class ContratsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->msj_dbl_cin();
        return View('grh.contrat.index');

    }

    private function msj_dbl_cin(){
        Contrats::whereIn('cin_employee',vContrats::select('cin_employee')->get())->update([
            'duplicate' => 1
        ]);
    }

    public function get_data(Request $request){

        $displayLength = $request->input('iDisplayLength');
        $displayStart  = $request->input('iDisplayStart');
        
        $sortCol       = $request->input('iSortCol_0');
        $SortDir       = $request->input('sSortDir_0');

        $search        = $request->input('sSearch');

        $q = Contrats::where('id','>',0);
       

        if($search!=null){
            $q->where(function($query)use($search){
                return $query->where('id_employee','like','%'.$search.'%')
                ->orWhere('cin_employee','like','%'.$search.'%')
                ->orwhere('ferme','like','%'.$search.'%')
                ->orWhere('date_embauche','like','%'.$search.'%')
                ->orWhere('date_envoyer','like','%'.$search.'%')
                ->orWhere('date_recu','like','%'.$search.'%')
                ->orWhere('legalise','like','%'.$search.'%')
                ->orWhere('dossier_valider','like','%'.$search.'%')
                ->orWhere('cin_valider','like','%'.$search.'%')
                ->orWhere('cnss_valider','like','%'.$search.'%')
                ->orWhere('ficher_valider','like','%'.$search.'%')
                ->orWhere('rib_valider','like','%'.$search.'%')
                ->orWhere('date_fin_contrat','like','%'.$search.'%');
            });
        }

        if($sortCol==0){
            $q->orderby('id_employee',$SortDir);
        }elseif($sortCol==1){
            $q->orderby('cin_employee',$SortDir);
        }elseif($sortCol==2){
            $q->orderby('ferme',$SortDir);
        }elseif($sortCol==3){
            $q->orderby('date_embauche',$SortDir);
        }elseif($sortCol==4){
            $q->orderby('date_envoyer',$SortDir);
        }elseif($sortCol==5){
            $q->orderby('date_recu',$SortDir);
        }elseif($sortCol==6){
            $q->orderby('legalise',$SortDir);
        }elseif($sortCol==7){
            $q->orderby('dossier_valider',$SortDir);
        }elseif($sortCol==8){
            $q->orderby('cin_valider',$SortDir);
        }elseif($sortCol==9){
            $q->orderby('cnss_valider',$SortDir);
        }elseif($sortCol==10){
            $q->orderby('ficher_valider',$SortDir);
        }elseif($sortCol==11){
            $q->orderby('rib_valider',$SortDir);
        }elseif($sortCol==12){
            $q->orderby('date_fin_contrat',$SortDir);
        }
        $q2    = $q;

     

        $iTotalDisplayRecords = $q2->orderby('id_employee')->count();
        $contrats = $q->orderby('date_embauche')->offset($displayStart)
                ->limit($displayLength)->get(); 

        return [
            'iTotalRecords' => Contrats::count(),
            'iTotalDisplayRecords' => $iTotalDisplayRecords,
            'aaData' => $contrats
        ];
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
        $cin = $request->input('cin_employee',0);

        $from = Carbon::now()->subMonths(6);
        $to   = Carbon::today();

        

        if(Contrats::where('cin_employee','=',$cin)->whereBetween('date_embauche',[$from,$to])->count()>0){
            return view('alerts.operation',[
                'b'   => false,
                'msg' => 'Contrat déja existe !!'
            ]);
        }
        
            $Contrats = new Contrats;

            $Contrats->cin_employee         = $request->input('cin_employee');
            $Contrats->id_employee          = $request->input('id_employee');
            $Contrats->ferme                = $request->input('ferme');

            $date_embauche = $request->input('date_embauche');
            if($date_embauche!=null)
                $Contrats->date_embauche = Carbon::createFromFormat('d/m/Y',$date_embauche)->toDateString();
            else
                 $Contrats->date_embauche  = null;


            $date_envoyer = $request->input('date_envoyer');
            if($date_envoyer!=null)
                $Contrats->date_envoyer = Carbon::createFromFormat('d/m/Y',$date_envoyer)->toDateString();
            else
                 $Contrats->date_envoyer  = null;

            $date_recu = $request->input('date_recu');
            if($date_recu!=null)
                $Contrats->date_recu = Carbon::createFromFormat('d/m/Y',$date_recu)->toDateString();
            else
                 $Contrats->date_recu  = null;

            $Contrats->legalise             = $request->input('legalise');
            $Contrats->dossier_valider      = $request->input('dossier_valider');
            $Contrats->cin_valider          = $request->input('cin_valider');
            $Contrats->cnss_valider         = $request->input('cnss_valider');
            $Contrats->ficher_valider       = $request->input('ficher_valider');
            $Contrats->rib_valider          = $request->input('rib_valider');

            $date_fin_contrat = Carbon::createFromFormat('d/m/Y',$date_embauche)->addMonths(6)->addDay(-1)->toDateString();

            $Contrats->date_fin_contrat     = $date_fin_contrat;
            $Contrats->user_add             = Auth::user()->name;
            $Contrats->user_update          = "NULL";


            $Contrats->save();

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
    public function update(Request $request)
    {
          $Contrats = Contrats::find($request->input('id'));

          $date_embauche = $request->input('date_embauche');
          if($date_embauche!=null)
            $Contrats->date_embauche = Carbon::createFromFormat('d/m/Y',$date_embauche)->toDateString();
          else
            $Contrats->date_embauche  = null;


          $date_envoyer = $request->input('date_envoyer');
          if($date_envoyer!=null)
            $Contrats->date_envoyer = Carbon::createFromFormat('d/m/Y',$date_envoyer)->toDateString();
          else
            $Contrats->date_envoyer  = null;

          $date_recu = $request->input('date_recu');
          if($date_recu!=null)
            $Contrats->date_recu = Carbon::createFromFormat('d/m/Y',$date_recu)->toDateString();
          else
            $Contrats->date_recu  = null;

          $Contrats->legalise             = $request->input('legalise');
          $Contrats->dossier_valider      = $request->input('dossier_valider');
          $Contrats->cin_valider          = $request->input('cin_valider');
          $Contrats->cnss_valider         = $request->input('cnss_valider');
          $Contrats->ficher_valider       = $request->input('ficher_valider');
          $Contrats->rib_valider          = $request->input('rib_valider');

          $date_fin_contrat = Carbon::createFromFormat('d/m/Y',$date_embauche)->addMonths(6)->addDay(-1)->toDateString();

          $Contrats->date_fin_contrat     = $date_fin_contrat;
          $Contrats->user_update          = Auth::user()->name;

          $Contrats->save();

              return view('alerts.operation',[
                    'b' => true,
                    'msg' => 'Opération terminée'
            ]);
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

    public function imp_contart($id){
        ob_end_clean();

        $Contrat  = Contrats::find($id);

        $pdf = new Fpdf;
        $pdf->AddPage();
        $pdf->Settitle(''.$Contrat->employees->nom.' '.$Contrat->employees->prenom);
        $pdf->SetFont('Courier', 'B', 18);
        $pdf->Cell(50, 25, 'Hello World!');
        $pdf->Output();
    }
}
