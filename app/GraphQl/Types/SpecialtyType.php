<?php

namespace App\GraphQL\Types;

use App\Models\Matter;
use App\GraphQL\Fields\BaseField;
use App\Models\Proffessor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SpecialtyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Specialty',
    ];
  

    public function fields(): array
    {
        $typeProffessor = GraphQL::type('Proffessor');
        $modelProffessor = new Proffessor();
        $fieldProffessor = 'proffessorId';

        $typeMatter = GraphQL::type('Matter');
        $modelMatter = new Matter;
        $fieldMatter = 'matterId';

        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'matterId' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'proffessorId' => [
                'type' => Type::nonNull(Type::int()),
            ],

            'proffessor' => new BaseField($typeProffessor, $modelProffessor, $fieldProffessor),
            'matter' => new BaseField($typeMatter, $modelMatter, $fieldMatter )         
        ];
    }
}
