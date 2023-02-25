<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Matter;
// use App\GraphQL\Fields\MatterField;
// use App\GraphQL\Fields\GroupField;
// use App\GraphQL\Fields\ProffessorField;
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
            // 'matter' => MatterField::class,
            // 'proffessor' => ProffessorField::class,

            'proffessor' => new BaseField($typeProffessor, $modelProffessor, $fieldProffessor),
            'matter' => new BaseField($typeMatter, $modelMatter, $fieldMatter )         
        ];
    }
}
