<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FixJumbledSentencesController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property integer sentence_task_id
 * @property integer english_sentence_id
 * @property string explanation
 */
class FixJumbledSentences extends Model
{
    use SoftDeletes;

    public $table = 'fix_jumbled_sentences';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'sentence_task_id',
        'english_sentence_id',
        'explanation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'd' => 'integer',
        'sentence_task_id' => 'integer',
        'english_sentence_id' => 'integer',
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
