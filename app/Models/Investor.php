<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Investor extends Model
{
    use Notifiable;


    protected $fillable = [
        'title','firstname', 'lastname','phone','email','nationality','gender','amount','viewed'
    ];

    public function getFullnameAttribute($value)
    {
        return $this->firstname.' '. $this->lastname;
    }
}
