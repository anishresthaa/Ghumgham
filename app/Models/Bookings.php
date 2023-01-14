<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $table='bookings';
    protected $primaryKey = 'booking_id';
    protected $fillable=[
                            'package_id',
                            'user_id',
                            'no_of_people',
                            'total',
                            'booked_date',
                            'payment_status',
                            'recieved_amount',
                            'status'
                        ];
                  public function user(){
                            return $this->belongsTo(User::class,'user_id','id');
                        }
                   public function package(){
                            return $this->belongsTo(package::class,'package_id','id');
                        }

}


