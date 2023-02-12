<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Matter;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateMatter extends Mutation
{
    protected $attributes = [
        'name' => 'updateMatter',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::string());
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
            'description' => [
                'name' => 'description', 
                'type' => Type::string(),
            ],

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $matter = Matter::find($args['id']);
        if(!$matter) {
            return 'Registro no encontrado';
        }
        
        $matter->update($args);
        return 'Registro actualizado exitosamente';
    }
}
