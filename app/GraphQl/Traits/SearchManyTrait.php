<?php
  
namespace App\Graphql\Traits;
  
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Illuminate\Database\Eloquent\Collection;
  
trait SearchManyTrait {
  


    function searchMany(Collection $data, array $args)
      {
        foreach ($args as $key => $value) {
          if ($key === 'startDate') {
            $data = $data->where($key, '>=', $value);
            continue;
          }
          if ($key === 'endDate') {
            $data = $data->where($key, '<=', $value);
            continue;
          }
          $data = $data->where($key, '=', $value);
        }
        if (count($data) == 1) {
          $formatData = [];
          foreach ($data as $key => $value) {
            array_push($formatData, $data[$key]);
          }
          return $formatData;
        }
        return $data;
      } 
  
}