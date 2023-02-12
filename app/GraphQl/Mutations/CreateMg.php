<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Mg;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateMg extends Mutation
{
    protected $attributes = [
        'name' => 'createMg',
    ];

    public function type(): Type
    {
        return Type::listOf(Type::string());
    }

    public function args(): array
    {
        return [
            'matterId' => [
                'name' => 'matterId', 
                'type' => Type::nonNull(Type::int()),
            ],
            'groupId' => [
                'name' => 'groupId', 
                'type' => Type::nonNull(Type::int()),
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        Mg::create($args);
        return "Relacion Mattter-Group creada exitosamente";
    }
}
