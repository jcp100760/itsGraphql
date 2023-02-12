<?php
namespace App\GraphQL\Queries;

use Closure;
use App\Models\Proffessor;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
//use App\GraphQL\Middleware\Authenticate;
use Rebing\GraphQL\Support\Query;


class ProffessorsQuery extends Query
{
     protected $attributes = [
         'name' => 'proffessors',
     ];
    
    // protected $middleware = [
    //     Authenticate::class,
    // ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Proffessor'))));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::string(),
            ],
            'name' => [
                'name' => 'name', 
                'type' => Type::string(),
            ],
            'lastname' => [
                'name' => 'lastname', 
                'type' => Type::string(),
            ],
            'ci' => [
                'name' => 'ci', 
                'type' => Type::int(),
            ],
            // 'matters' => [
            //     'name' => 'matters', 
            //     'type' => Type::listOf(Type::nonNull(GraphQL::type('Matter'))),
            // ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['id'])) {
            return Proffessor::where('id' , $args['id'])->get();
        }

        if (isset($args['lastname'])) {
            return Proffessor::where('lastname', 'like', '%'. $args['lastname'] .'%')->get();
        }

        if (isset($args['ci'])) {
            return Proffessor::where('ci', $args['ci'])->get();
        }

        return Proffessor::all();
    }
}