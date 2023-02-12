<?php

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use App\Models\Proffessor;
use Rebing\GraphQL\Support\Facades\GraphQL;


class ProffessorField extends Field
{
    protected $attributes = [
        'name' => 'proffessor',
    ];

    public function type(): Type
    {
        return GraphQL::type('Proffessor');
    }

    public function resolve($root, array $args)
    {
        return Proffessor::where('id' , $root['proffessorId'])->get()[0];
    }
}
