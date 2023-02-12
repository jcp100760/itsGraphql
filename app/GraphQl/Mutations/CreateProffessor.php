<?php
namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Proffessor;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class CreateProffessor extends Mutation
{
    protected $attributes = [
        'name' => 'createProffessor',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::string());
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name', 
                'type' => Type::nonNull(Type::string()),
            ],
            'lastname' => [
                'name' => 'lastname', 
                'type' => Type::nonNull(Type::string()),
            ],
            'ci' => [
                'name' => 'ci', 
                'type' => Type::nonNull(Type::int()),
            ],
            'active' => [
                'name' => 'active', 
                'type' => Type::nonNull(Type::boolean()),
            ]
           
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        Proffessor::create($args);
        return "Proffessor creado exitosamente";
    }
}