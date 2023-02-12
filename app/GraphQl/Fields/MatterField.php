<?php

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use App\Models\Matter;
use Rebing\GraphQL\Support\Facades\GraphQL;


class MatterField extends Field
{
    protected $attributes = [
        'name' => 'matter',
    ];

    public function type(): Type
    {
        return GraphQL::type('Matter');
    }

    public function resolve($root, array $args)
    {
        return Matter::where('id' , $root['matterId'])->get()[0];
    }
}
