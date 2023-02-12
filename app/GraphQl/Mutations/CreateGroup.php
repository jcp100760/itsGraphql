<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Group;
use Closure;
use App\Models\Matter;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateGroup extends Mutation
{
    protected $attributes = [
        'name' => 'createGroup',
    ];

    public function type(): Type
    {
        return Type::listOf(Type::string());
    }

    public function args(): array
    {
        return [
            'mgId' => [
                'name' => 'mgId', 
                'type' => Type::nonNull(Type::int()),
            ],
            'proffessorId' => [
                'name' => 'proffessorId', 
                'type' => Type::nonNull(Type::int()),
            ],
            'active' => [
                'name' => 'active', 
                'type' => Type::nonNull(Type::boolean()),
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        Group::create($args);
        return "Group creado exitosamente";
    }
}
