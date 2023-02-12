<?php
namespace App\GraphQL\Types;

use App\GraphQL\Fields\BaseField;
use App\Models\Matter;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MatterType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Matter',
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
            'description' => [
                'type' => Type::string(),
            ],
        ];
    }
}