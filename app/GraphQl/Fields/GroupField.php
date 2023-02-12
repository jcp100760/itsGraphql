<?php

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use App\Models\Group;
use Rebing\GraphQL\Support\Facades\GraphQL;


class GroupField extends Field
{
    protected $attributes = [
        'name' => 'group',
    ];

    public function type(): Type
    {
        return GraphQL::type('Group');
    }

    public function resolve($root, array $args)
    {
        return Group::where('id' , $root['groupId'])->get()[0];
    }
}
