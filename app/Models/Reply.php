<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table='replies';
    protected $fillable=[
                            'user_id',
                            'contact_id',
                            'subject',
                            'message'
                        ];
                  public function user(){
                            return $this->belongsTo(User::class,'user_id','id');
                        }
                   public function package(){
                            return $this->belongsTo(contact::class,'contact_id','id');
                        }
}
