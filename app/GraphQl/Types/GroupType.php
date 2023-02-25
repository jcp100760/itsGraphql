<?php

namespace App\GraphQL\Types;

use App\Models\Group;
use GraphQL\Type\Definition\Type;
use App\GraphQL\Fields\TurnField;
use App\GraphQL\Fields\BaseField;
use App\Models\Turn;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class GroupType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Group',
    ];

    public function fields(): array
    {
        $typeTurn = GraphQL::type('Turn');
        $modelTurn = new Turn();
        $fieldTurn = 'turnId';

        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'grade' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'description' => [
                'type' => Type::string(),
            ],
            'active' => [
                'type' => Type::nonNull(Type::boolean()),
            ],
            'turnId' => [
                'type' => Type::nonNull(Type::int()),
            ],
            // 'turn' => TurnField::class,
            'turn' => new BaseField($typeTurn, $modelTurn, $fieldTurn ),    
            
        ];
    }
}
