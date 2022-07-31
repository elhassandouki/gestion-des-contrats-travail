<?php

namespace App\Exports;

use App\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class EmployeeExport implements FromQuery, WithHeadings
{

	use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Employee::query();
    }

    public function headings(): array{

        return [
            'ID',
            'CIN',
            'Prénom',
            'Nom',
            'DDN',
            'Lieu Naissance',
            "CIN Valable juqsu'au ",
            'Adresse',
            'Sexe',
            'Situation Familiale',
            'Ville',
            'Nbr enfants',
            'Nationalité',
            'Date Entrée',
            'N° CNSS',
            'RIB',
            'Télephone',
            "Contacter en cas d'urgence",
            'Equipe',
            'Transporteur',
            'Région',
            'Ville',
            'Pays',
            'Adresse Actule',
            'Fonction',
            'Categorie Professionnelle',
            'Département',
         
        ];
    }
}
