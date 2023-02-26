<?php
namespace App\GraphQL\Queries;

use Closure;
use App\Models\Absence;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Graphql\Traits\SearchManyTrait;


class AbsencesQuery extends Query
{
    use SearchManyTrait;
    protected $attributes = [
        'name' => 'absences',
    ];
    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Absence'))));
        
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::int(),
            ],
            'startDate' => [
                'name' => 'startDate', 
                'type' => Type::string(),
            ],
            'endDate' => [
                'name' => 'endDate', 
                'type' => Type::string(),
            ],
            'turnId' => [
                'name' => 'turnId', 
                'type' => Type::int(),
            ],
            'reason' => [
                'name' => 'reason', 
                'type' => Type::string(),
            ],
            'active' => [
                'name' => 'active', 
                'type' => Type::boolean(),
            ],

            
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $data = Absence::all();
        $data = $this->searchMany($data, $args);

        return $data;
    }
}