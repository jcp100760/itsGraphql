<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Turn;
use Closure;
//use App\Models\Proffessor;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Graphql\Traits\SearchManyTrait;

class TurnsQuery extends Query
{
    use SearchManyTrait;
    protected $attributes = [
        'name' => 'getTurns',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Turn'))));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name', 
                'type' => Type::string(),
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $data = Turn::all();
        // if (isset($args['id'])) {
        //     return Turn::where('id' , $args['id'])->get();
        // }

        // if (isset($args['name'])) {
        //     return Turn::where('name', 'like', '%'. $args['name'] .'%')->get();
        // }

        // return Turn::all();
        $data = $this->searchMany($data, $args);
        return $data;
    }
}
