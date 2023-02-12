<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Absence;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateAbsence extends Mutation
{
    protected $attributes = [
        'name' => 'createAbsence',
    ];

    public function type(): Type
    {
        return Type::listOf(Type::string());
    }

    public function args(): array
    {
        return [
            'gmpId' => [
                'name' => 'gmpId', 
                'type' => Type::nonNull(Type::int()),
            ],
            'turnId' => [
                'name' => 'turnId', 
                'type' => Type::nonNull(Type::int()),
            ],
            'startDate' => [
                'name' => 'startDate', 
                'type' => Type::nonNull(Type::string()),
            ],
            'endDate' => [
                'name' => 'endDate', 
                'type' => Type::nonNull(Type::string()),
            ],
            'active' => [
                'name' => 'active', 
                'type' => Type::nonNull(Type::boolean()),
            ]

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        Absence::create($args);
        return "Registro creado exitosamente";
    }
}
