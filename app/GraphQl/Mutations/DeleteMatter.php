<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Matter;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class DeleteMatter extends Mutation
{
    protected $attributes = [
        'name' => 'deleteMatter',
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
        $matter = Matter::find($args['id']);
        $matter->delete();
        return "Registro eliminado";
    }
}
