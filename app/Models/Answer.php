<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'question_id', 
        'parent_id', 
        'description'
    ];

    public function question_rela(){
        return $this->belongsTo('App\Model\Question');
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        //return $this->hasMany(Answer::class, 'parent_id');
        return $this->hasMany('App\Models\Answer', 'parent_id');
    }
}
