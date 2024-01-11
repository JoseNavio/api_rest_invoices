<?php


namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class InvoiceFilter extends ApiFilter
{
    //Parameters to filter our models (name,...) This is like a php map
    protected array $safeParams = [
        'customer_id' => ['eq'],
        'amount' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'status' => ['eq', 'ne'],
        'billed_date' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'paid_date' => ['eq', 'gt', 'gte', 'lt', 'lte'],
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
        'neq' => '!=',
        'like' => 'LIKE'
    ];

}
