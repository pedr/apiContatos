<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'sellerName',
        'companyName',
        'contactName',
        'email',
        'telephone',
        'expirationDate',
        'contactDate'
    ];
}
