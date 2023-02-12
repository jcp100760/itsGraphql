<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Group;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateGroup extends Mutation
{
    protected $attributes = [
        'name' => 'updateGroup',
    ];

    public function type(): Type
    {
        return Type::listOf(Type::string());
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::nonNull(Type::int()),
            ],
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
            'active' => [
                'name' => 'active',
                'type' => Type::boolean(),
            ],
            'turnId' => [
                'name' => 'turnId',
                'type' => Type::int(),
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $group = Group::find($args['id']);
        if(!$group) {
            return 'Registro no encontrado';
        }
        
        $group->update($args);
        return 'Registro actualizado exitosamente';
    }
}
