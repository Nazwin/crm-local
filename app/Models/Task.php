<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $table = 'tasks';
    protected $fillable = [
        'name', 'description', 'date_start', 'date_end', 'status', 'project_id', 'created_at', 'updated_at'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'task_user', 'task_id','user_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($task) {
            $task->users()->delete();
        });
    }
}
