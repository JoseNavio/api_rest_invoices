<?php

namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomerFilter extends ApiFilter
{
    //Parameters to filter our models (name,...) This is like a php map
    protected array $safeParams = [
        'name' => ['eq','like'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postal_code' => ['eq', 'gt', 'lt'],
    ];
    //To map table columns with an specific format
    protected array $columnMap = [
    //'postalCode' => 'postal_code'
    ];
    protected array $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'like' => 'LIKE'
    ];

}
