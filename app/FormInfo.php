<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormInfo extends Model
{
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'address1',
    	'address2',
    	'city',
    	'state',
    	'zip',
    	'phone',
    	'email',
    	'company_name',
    	'company_address',
    	'company_city',
    	'company_phone',
    	'file',
        'approved'
    ];
}
