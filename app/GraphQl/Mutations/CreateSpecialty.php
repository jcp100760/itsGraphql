<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Specialty;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateSpecialty extends Mutation
{
    protected $attributes = [
        'name' => 'createSpecialty',
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
            'proffessorId' => [
                'name' => 'proffessorId', 
                'type' => Type::nonNull(Type::int()),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        Specialty::create($args);
        return "Relacion Matter-Proffessor creada exitosamente";
    }
}
