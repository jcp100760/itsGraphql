<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Specialty;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class DeleteSpecialty extends Mutation
{
    protected $attributes = [
        'name' => 'deleteSpecialty',
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
        $specialty = Specialty::find($args['id']);
        $specialty->delete();
        return "Registro eliminado";
    }
}
