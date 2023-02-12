<?php
namespace App\GraphQL\Types;

use App\Models\Proffessor;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProffessorType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Proffessor',
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
            'lastname' => [
                'type' => Type::string(),
            ],
            'ci' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'active' => [
                'type' => Type::nonNull(Type::boolean()),
            ],
        ];
    }
}