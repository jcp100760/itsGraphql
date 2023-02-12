<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Group;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class DeleteGroup extends Mutation
{
    protected $attributes = [
        'name' => 'deleteGroup',
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::nonNull(Type::int()),
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $group = Group::find($args['id']);
        $group->delete();
        return "Registro eliminado";
    }
}
