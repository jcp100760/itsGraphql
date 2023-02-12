<?php

namespace App\GraphQL\Fields;

use App\Models\Proffessor;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Rebing\GraphQL\Support\Field;
use Rebing\GraphQL\Support\Facades\GraphQL;

class BaseField extends Field
{ 
    protected $attributes = [
        'description' => 'BaseField',
    ];

    protected $Type;
    protected $Model;
    protected $Field;

    public function __construct(Type $type, Model $model, $field)
    {
        $this->Type = $type;
        $this->Model = $model;
        $this->Field = $field;
    }

    public function type(): Type
    {
        return GraphQL::type($this->Type);
    }

    public function resolve($root, array $args)
    {
        $Field = $root->{$this->Field};
        return $this->Model->where('id' , $Field)->get()[0];
    }

}
