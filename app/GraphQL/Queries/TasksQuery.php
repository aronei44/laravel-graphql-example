<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL;
use App\Models\Task;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class TasksQuery extends Query
{
    protected $attributes = [
        'name' => 'tasks',
        'description' => 'Get All Tasks'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('TaskType'));
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Task::all();
    }
}
