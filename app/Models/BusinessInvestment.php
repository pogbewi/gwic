<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class BusinessInvestment extends Model
{
    use Notifiable;


    protected $fillable = [
        'title','firstname', 'lastname','phone','businessname','email','address','address_two','nationality',
        'operation_countries','city','gender','amount_needed','status','agreed','viewed'
    ];

    public function getFullnameAttribute($value)
    {
        return $this->firstname.' '. $this->lastname;
    }
}
