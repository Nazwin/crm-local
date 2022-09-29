<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $table = 'projects';
    protected $fillable = [
        'name', 'description', 'url', 'photo', 'created_at', 'updated_at'
    ];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($project) {
            $project->tasks()->delete();
        });
    }
}
