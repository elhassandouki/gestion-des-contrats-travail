<?php

namespace App\Http\Controllers\Modal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contrats;
use App\Employee;

class AutoModalController extends Controller{


    public function automodel($type,$id){

        if($id!=null){
         
            switch ($type) {
                case 1:
                    return $this->Employee($id);
                break;
                case 2:
                    return $this->Contrat($id);
                break;
                case 3:
                    return $this->add_Contrat($id);
                break;
                case 3:
                    return $this->ferme($id);
                break;
            }
        }
        return '';
    }

    public function Employee($id){

        $Employee  =   Employee::where('id',$id)->first();

        if($Employee==null){
            $Employee       = new Employee;
            $Employee->id   = 0;
        }
        return view('modal.form.employee',[
            'Employee' => $Employee
        ]);
    }
    public function add_Contrat($id){

        $Employee  =   Employee::where('id',$id)->first();

        return view('modal.form.add_contrat',[
            'Employee' => $Employee
        ]);
    }

    public function Contrat($id){

        $Contrats  =   Contrats::where('id',$id)->first();

        if($Contrats==null){
            $Contrats       = new Contrats;
            $Contrats->id   = 0;
        }

        return view('modal.form.contrat',[
            'Contrats' => $Contrats
        ]);
    }

    public function index(){

        return View('modal.modal');
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
