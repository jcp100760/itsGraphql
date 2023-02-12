<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Mg;
use App\GraphQL\Fields\MatterField;
use App\GraphQL\Fields\GroupField;
use App\GraphQL\Fields\ProffessorField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MgType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Mg',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'matterId' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'groupId' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'matter' => MatterField::class,
            'group' => GroupField::class,
        ];
    }
}
