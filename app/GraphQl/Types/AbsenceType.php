<?php

namespace App\GraphQL\Types;

use App\GraphQL\Fields\BaseField;
use App\Models\Absence;
use App\Models\Turn;
use App\Models\Gmp;
use GraphQL\Type\Definition\Type;
// use App\GraphQL\Fields\GmpField;
// use App\GraphQL\Fields\TurnField;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;


class AbsenceType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Absence',
    ];
    

    public function fields(): array
    {

         $typeTurn = GraphQL::type('Turn');
         $modelTurn = new Turn;
         $fieldTurn = 'turnId';

         $typeGmp = GraphQL::type('Gmp');
         $modelGmp = new Gmp;
         $fieldGmp = 'gmpId';

        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'gmpId' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'turnId' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'startDate' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'endDate' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'active' => [
                'type' => Type::nonNull(Type::int()),
            ],
            //'gmp' => GmpField::class,
            //'turn' => TurnField::class,   
            'turn' => new BaseField($typeTurn, $modelTurn, $fieldTurn ),    
            'gmp' => new BaseField($typeGmp, $modelGmp, $fieldGmp )     

        ];
    }
}
