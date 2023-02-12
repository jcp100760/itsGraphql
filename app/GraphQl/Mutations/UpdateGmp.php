<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Gmp;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateGmp extends Mutation
{
    protected $attributes = [
        'name' => 'updateGmp',
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
            'mgId' => [
                'name' => 'mgId', 
                'type' => Type::int(),
            ],
            'proffessorId' => [
                'name' => 'proffessorId',
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
        $gmp = Gmp::find($args['id']);
        if(!$gmp) {
            return 'Registro no encontrado';
        }
        
        $gmp->update($args);
        return 'Registro actualizado exitosamente';
    }
}
