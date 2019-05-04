<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LevelController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property integer difficulty
 * @property integer topic_id
 * @property integer task_id
 * @property integer score_required
 */
class Level extends Model
{
    use SoftDeletes;

    public $table = 'levels';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'difficulty',
        'topic_id',
        'task_id',
        'score_required'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'difficulty' => 'integer',
        'topic_id' => 'integer',
        'task_id' => 'integer',
        'score_required' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
