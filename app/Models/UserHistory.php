<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserHistoryController
 * @package App\Models
 * @version December 26, 2018, 6:22 pm UTC
 *
 * @property integer user_id
 * @property integer topic_id
 * @property integer task_id
 * @property integer level_id
 * @property string remember_token
 */
class UserHistory extends Model
{
    use SoftDeletes;

    public $table = 'user_historys';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;
    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'topic_id',
        'task_id',
        'level_id',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'topic_id' => 'integer',
        'task_id' => 'integer',
        'level_id' => 'integer',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
