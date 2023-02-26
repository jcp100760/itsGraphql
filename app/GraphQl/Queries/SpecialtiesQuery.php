<?php

namespace App\GraphQL\Queries;

use Closure;
use App\Models\Specialty;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Graphql\Traits\SearchManyTrait;


class SpecialtiesQuery extends Query
{
    use SearchManyTrait;
    protected $attributes = [
        'name' => 'getSpecialties',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Specialty'))));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::int(),
            ],
            'proffessorId' => [
                'name' => 'proffessorId', 
                'type' => Type::int(),
            ],
            'matterId' => [
                'name' => 'matterId', 
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $data = Specialty::all();
        $data = $this->searchMany($data, $args);

        return $data;
    }
}
