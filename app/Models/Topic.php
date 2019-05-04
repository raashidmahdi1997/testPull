<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TopicController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property string topic_name
 */
class Topic extends Model
{
    use SoftDeletes;

    public $table = 'topics';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'topic_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'topic_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function allTopics()
    {
        $data = TopicController::all();
        return response()->json($data);
    }


    
}
