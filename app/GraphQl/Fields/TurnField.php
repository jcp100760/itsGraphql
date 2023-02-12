<?php

declare(strict_types=1);

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use App\Models\Turn;
use Rebing\GraphQL\Support\Facades\GraphQL;


class TurnField extends Field
{
    protected $attributes = [
        'name' => 'turn',
    ];

    public function type(): Type
    {
        return GraphQL::type('Turn');
    }

    public function resolve($root, array $args)
    {
        return Turn::where('id' , $root['turnId'])->get()[0];
    }
}
