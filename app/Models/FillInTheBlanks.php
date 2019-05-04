<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FillInTheBlanksController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property integer sentence_task_id
 * @property string incomplete_sentence
 * @property integer translation_id
 * @property string explanation
 */
class FillInTheBlanks extends Model
{
    use SoftDeletes;

    public $table = 'fill_in_the_blanks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'sentence_task_id',
        'incomplete_sentence',
        'translation_id',
        'explanation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sentence_task_id' => 'integer',
        'incomplete_sentence' => 'string',
        'translation_id' => 'integer',
        'explanation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
