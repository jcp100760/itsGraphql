<?php

namespace App\GraphQL\Types;

use App\Models\Gmp;
use GraphQL\Type\Definition\Type;
use App\GraphQL\Fields\MgField;
use App\GraphQL\Fields\ProffessorField;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;


class GmpType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Gmp',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'mgId' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'proffessorId' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'active' => [
                'type' => Type::nonNull(Type::boolean()),
            ],
            'mg' => MgField::class,
            'proffessor' => ProffessorField::class

        ];
    }
}
