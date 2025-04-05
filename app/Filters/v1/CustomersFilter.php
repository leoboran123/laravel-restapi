<?php

namespace App\Filters\v1;

use Illuminate\Http\Request;

use App\Filters\ApiFilter;

class CustomersFilter  extends ApiFilter{
    protected $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'adress' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['gt','eq','lt'],
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>=',

    ];

    


}



