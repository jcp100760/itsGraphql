<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Group;
use Closure;
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
        return Type::nonNull(Type::string());
    }

    public function args(): array
    {
        return [
            'grade' => [
                'name' => 'grade', 
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::string(),
            ],
            'turnId' => [
                'name' => 'turnId',
                'type' => Type::int(),
            ],
            'active' => [
                'name' => 'active',
                'type' => Type::boolean(),
            ],           

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        Group::create($args);
        return "Group creado exitosamente";
    }
}
