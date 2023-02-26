<?php
namespace App\GraphQL\Queries;

use Closure;
use App\Models\Gmp;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Graphql\Traits\SearchManyTrait;


class GmpsQuery extends Query
{
    use SearchManyTrait;
    protected $attributes = [
        'name' => 'gmps',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Gmp'))));
        
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::string(),
            ],
            'mgId' => [
                'name' => 'mgId', 
                'type' => Type::int(),
            ],
            'proffessorId' => [
                'name' => 'proffessorId', 
                'type' => Type::int(),
            ],
           
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $data = Gmp::all();
        $data = $this->searchMany($data, $args);
        return $data;
    }
}