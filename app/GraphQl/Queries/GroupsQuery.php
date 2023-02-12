<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Group;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class GroupsQuery extends Query
{
    protected $attributes = [
        'name' => 'groups',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Group'))));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::int(),
            ],
            'grade' => [
                'name' => 'grade', 
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name', 
                'type' => Type::string(),
            ],
            'description' => [
                'name' => 'lastname', 
                'type' => Type::string(),
            ],
            'turnId' => [
                'name' => 'id', 
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['id'])) {
            return Group::where('id' , $args['id'])->get();
        }

        if (isset($args['name'])) {
            return Group::where('name', 'like', '%'. $args['name'] .'%')->get();
        }

        if (isset($args['grade'])) {
            return Group::where('grade', $args['grade'])->get();
        }

        if (isset($args['turnId'])) {
            return Group::where('turnId', $args['turnId'])->get();
        }

        return Group::all();
    }
}
