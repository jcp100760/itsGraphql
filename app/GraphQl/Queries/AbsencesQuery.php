<?php
namespace App\GraphQL\Queries;

use Closure;
use App\Models\Absence;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;


class AbsencesQuery extends Query
{
    protected $attributes = [
        'name' => 'absences',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Absence'))));
        
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::string(),
            ],
            'turnId' => [
                'name' => 'turnId', 
                'type' => Type::int(),
            ],
            
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['id'])) {
            return Absence::where('id' , $args['id'])->get();
        }

        if (isset($args['turnId'])) {
            return Absence::where('id' , $args['turnId'])->get();
        }
         return Absence::all();
    }
}