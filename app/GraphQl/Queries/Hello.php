<?php
namespace App\GraphQL\Queries;

use Closure;
use App\Models\Proffessor;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;


class Hello extends Query
{
    protected $attributes = [
        'name' => 'hello',
    ];

    public function type(): Type
    {
        return Type::listOf(Type::nonNull(GraphQL::type('Hello')));
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, array $args)
    {
        // return [
        //     "id" => 1
        // ];
        return [
            [
                "id" => 1
            ],
            [
                "id" => 2
            ]
        ];
    }

}