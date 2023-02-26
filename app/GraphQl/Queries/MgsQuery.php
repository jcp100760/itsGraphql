<?php

namespace App\GraphQL\Queries;

use Closure;
use App\Models\Mg;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Graphql\Traits\SearchManyTrait;


class MgsQuery extends Query
{
    use SearchManyTrait;
    protected $attributes = [
        'name' => 'getMgs',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Mg'))));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $data = Mg::all();
        $data = $this->searchMany($data, $args);
        return $data;
    }
}