<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Absence;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateAbsence extends Mutation
{
    protected $attributes = [
        'name' => 'updateAbsence',
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
            'gmpId' => [
                'name' => 'gmpId', 
                'type' => Type::int(),
            ],
            'turnId' => [
                'name' => 'turnId',
                'type' => Type::int(),
            ],
            'startDate' => [
                'name' => 'startDate', 
                'type' => Type::string(),
            ],
            'endDate' => [
                'name' => 'endDate', 
                'type' => Type::string(),
            ],
            'active' => [
                'name' => 'active',
                'type' => Type::boolean(),
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $absence = Absence::find($args['id']);
        if(!$absence) {
            return 'Registro no encontrado';
        }
        
        $absence->update($args);
        return 'Registro actualizado exitosamente';
    }
}
