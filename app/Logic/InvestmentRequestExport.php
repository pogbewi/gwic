<?php


namespace App\Logic;

use App\Models\BusinessInvestment;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class InvestmentRequestExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function __construct($reqs)
    {
        $this->reqs = $reqs;
    }

    public function collection()
    {
        /*$reqData = [];
        foreach ($this->reqs as $req) {

            $reqData[] = [
                'Title' => $req->title,
                'First Name' => $req->firstname,
                'Email' => $req->email,
                'Phone' => $req->phone,
                'Gender' => $req->gender,
                'Accpted Terms' => $req->agreed ? 'Yes' : 'No',
                'Date Sent' => prettyDate($req->created_at),
            ];

        }*/
        return $this->reqs;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'First Name',
            'Last Name',
            'Phone',
            'Business Name',
            'Email',
            'Address',
            'Address Two',
            'Nationality',
            'Countries Of Operations',
            'City',
            'Gender',
            'Amount Needed',
            'Business Status',
            'Accepted Terms',
            'Viewed',
            'Date Sent'
        ];
    }
}
