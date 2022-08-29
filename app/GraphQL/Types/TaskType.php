<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Task;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TaskType extends GraphQLType
{
    protected $attributes = [
        'name' => 'TaskType',
        'model' => Task::class
    ];

    public function fields(): array
    {
        return [
            'id'=> [
                'type'=>Type::id(),
                'description'=>'id'
            ],
            'name'=> [
                'type'=>Type::nonNull(Type::string()),
                'description'=>'name of task'
            ],
            'status'=> [
                'type'=>Type::nonNull(Type::string()),
                'description'=>'status of task'
            ],

        ];
    }
}
