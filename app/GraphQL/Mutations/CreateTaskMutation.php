<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL;
use App\Models\Task;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class CreateTaskMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createTask',
        'description' => 'Create new task'
    ];

    public function type(): Type
    {
        return GraphQL::type('TaskType');
    }

    public function args(): array
    {
        return [
            'name'=> [
                'type'=>Type::nonNull(Type::string()),
                'description'=>'name of task'
            ],
            'status'=> [
                'type'=>Type::nonNull(Type::string()),
                'description'=>'status of task'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $task = Task::create($args);
        return $task;
    }
}
