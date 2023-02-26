<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Mg;
use App\Models\Matter;
use App\Models\Group;
use App\GraphQL\Fields\BaseField;
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
         $typeMatter = GraphQL::type('Matter');
         $modelMatter = new Matter;
         $fieldMatter = 'matterId';

         $typeGroup = GraphQL::type('Group');
         $modelGroup = new Group;
         $fieldGroup = 'groupId';

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
            
            'matter' => new BaseField($typeMatter, $modelMatter, $fieldMatter ),    
            'group' => new BaseField($typeGroup, $modelGroup, $fieldGroup )     
        ];
    }
}
