<?php

namespace App\Filters;
use Illuminate\Http\Request;
/*
 * Class with the rest of filters will depend
 */
class ApiFilter
{
    //Parameters to filter our models (name,...)
    protected $safeParams = [];
    //To map the columns of the table with an specific format
    protected $columnMap = [];
    protected $operatorMap = [];

    public function transform(Request $request){
        $eloQuery = [];
        foreach ($this->safeParams as $param => $operators){
            //Query which stores request from parameter
            $query = $request->query($param);
            if(!isset($query)){
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;
            foreach ($operators as $operator){
                if(isset($query[$operator]))
                $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
            }
        }
        return $eloQuery;
    }
}
