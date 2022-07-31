<?php

namespace App\Exports;

use App\Contrats;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class ContratsExport implements FromQuery,WithHeadings
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Contrats::query();
    }

    public function headings(): array{

        return [
            'ID',
            'CIN Employee',
            'ID Employee',
            'Ferme',
            'Date Embauche	',
            'Date Envoyer',
            'Date Reçu',
            'Legalise',
            'Vérifier',
            'CIN Vérifier',
            'CNSS Vérifier',
            'Fiche Vérifier',
            'RIB Vérifier',
            'Date Fin Contrat',
        ];
    }
}
