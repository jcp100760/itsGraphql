<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Turn;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TurnType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Turn',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }
}
