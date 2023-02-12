<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Turn;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateTurn extends Mutation
{
    protected $attributes = [
        'name' => 'updateTurn',
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
            'name' => [
                'name' => 'name', 
                'type' => Type::string(),
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $turn = Turn::find($args['id']);
        if(!$turn) {
            return 'Registro no encontrado';
        }
        
        $turn->update($args);
        return 'Registro actualizado exitosamente';
    }
}
