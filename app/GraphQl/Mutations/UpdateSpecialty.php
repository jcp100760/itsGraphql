<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Specialty;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateSpecialty extends Mutation
{
    protected $attributes = [
        'name' => 'updateSpecialty',
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
            'proffessorId' => [
                'name' => 'proffessorId', 
                'type' => Type::int(),
            ],
            

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $specialty = Specialty::find($args['id']);
        if(!$specialty) {
            return 'Registro no encontrado';
        }
        
        $specialty->update($args);
        return 'Registro actualizado exitosamente';
    }
}
