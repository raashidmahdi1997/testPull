<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SentenceTaskController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property integer task_id
 * @property integer topic_id
 * @property integer level_id
 */
class SentenceTask extends Model
{
    use SoftDeletes;

    public $table = 'sentence_tasks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'task_id',
        'topic_id',
        'level_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'task_id' => 'integer',
        'topic_id' => 'integer',
        'level_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
