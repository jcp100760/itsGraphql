<?php

declare(strict_types=1);

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use App\Models\Mg;
use Rebing\GraphQL\Support\Facades\GraphQL;


class MgField extends Field
{
    protected $attributes = [
        'name' => 'mg',
    ];

    public function type(): Type
    {
        return GraphQL::type('Mg');
    }

    public function resolve($root, array $args)
    {
        return Mg::where('id' , $root['mgId'])->get()[0];
    }
}
