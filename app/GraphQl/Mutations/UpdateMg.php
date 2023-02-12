<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Mg;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateMg extends Mutation
{
    protected $attributes = [
        'name' => 'updateMg',
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
            'matterId' => [
                'name' => 'matterId', 
                'type' => Type::int(),
            ],
            'groupId' => [
                'name' => 'groupId',
                'type' => Type::int(),
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $mg = Mg::find($args['id']);
        if(!$mg) {
            return 'Registro no encontrado';
        }
        
        $mg->update($args);
        return 'Registro actualizado exitosamente';
    }
}
