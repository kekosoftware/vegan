<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    use HasFactory;
  
    protected $table = 'questions';
    public $timestamps = true;

    protected $fillable = [
        'description',
        'created_at'
    ];
   
    /**
     * The has Many Relationship
     *
     * @var array
     */
    
    public function answers()
    {
        return $this->hasMany(Answer::class)->whereNull('parent_id');
    }

    public function answers_totals()
    {
        return $this->hasMany(Answer::class);;
    }
    
}
