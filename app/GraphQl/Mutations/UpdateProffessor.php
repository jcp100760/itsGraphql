<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Proffessor;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateProffessor extends Mutation
{
    protected $attributes = [
        'name' => 'updateProffessor',
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
            'lastname' => [
                'name' => 'lastname', 
                'type' => Type::string(),
            ],
            'ci' => [
                'name' => 'ci', 
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
        $proffessor = Proffessor::find($args['id']);
        if(!$proffessor) {
            return 'Registro no encontrado';
        }
        
        $proffessor->update($args);
        return 'Registro actualizado exitosamente';
    }
}
