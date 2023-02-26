<?php

namespace App\GraphQL\Types;

use App\Models\Gmp;
use App\Models\Mg;
use App\Models\Proffessor;
use GraphQL\Type\Definition\Type;
use App\GraphQL\Fields\BaseField;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;


class GmpType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Gmp',
    ];

    public function fields(): array
    {
        $typeMg = GraphQL::type('Mg');
        $modelMg = new Mg();
        $fieldMg = 'mgId';

        $typeProffessor = GraphQL::type('Proffessor');
        $modelProffessor = new Proffessor();
        $fieldProffessor = 'proffessorId';

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

            'mg' => new BaseField($typeMg, $modelMg, $fieldMg ),    
            'proffessor' => new BaseField($typeProffessor, $modelProffessor, $fieldProffessor )     

        ];
    }
}
