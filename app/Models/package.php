<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    use HasFactory;
    protected $table='packages';
    protected $fillable=[   'PackageName',
                            'PackageLocation',
                            'PackagePrice',
                            'PackageFeatures',
                            'PackageDetails',
                            'Days',
                            'Nights',
                            'PackageImage',
                            'Popular',
                            'created_by',
                            'updated_by'
                        ];
                        function  createdBy(){
                            return $this->belongsTo(User::class,'created_by');
                        }

                        function  updatedBy(){
                            return $this->belongsTo(User::class,'updated_by');
                        }
}

