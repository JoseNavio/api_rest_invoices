<?php

namespace App\Filters;

use Illuminate\Http\Request;

/*
 * Class with the rest of filters will depend
 */

class ApiFilter
{
    //Check in CustomerFilter
    protected array $safeParams = [];
    protected array $columnMap = [];
    protected array $operatorMap = [];

    public function transform(Request $request): array
    {
        $eloQuery = []; // Initialize an empty array to store the query conditions

        // Loop over each safe parameter ($parameter : key, $operators : value)
        // (Parameter)'name' => (Value)['eq', 'like'],
        foreach ($this->safeParams as $parameter => $operators) {
            // Get the value of the current parameter from the request
            $query = $request->query($parameter);
            // If the parameter does not exist in the request, skip to the next iteration
            if (!isset($query)) {
                continue;
            }

            // Get the column name associated with the current parameter (?? is like java ?: but checks if the value is null)
            $column = $this->columnMap[$parameter] ?? $parameter;

            // Loop over each operator associated with the current parameter
            foreach ($operators as $operator) {
                // If the current operator exists in the request, add a condition to the $eloQuery array
                if (isset($query[$operator]))
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
            }
        }

        // Return the array of query conditions
        return $eloQuery;
    }

}
