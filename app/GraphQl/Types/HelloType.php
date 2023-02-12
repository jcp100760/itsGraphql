<?php

namespace App\GraphQL\Types;
use App\Models\Proffessor;
use App\GraphQL\Fields\HelloField;
use App\GraphQL\Fields\BaseField;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class HelloType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Hello',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        $model = new Proffessor();
        $field = 'proffessorId';
        $data = ['model' => $model, 'field'=>$field];

        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'name' => HelloField::class,
            'prueba' => new BaseField($data)
        ];
    }

    public function getModel(){
        return new Proffessor();
    }
}
