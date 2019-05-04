<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EnglishSentenceController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property string english_sentence
 */
class EnglishSentence extends Model
{
    use SoftDeletes;

    public $table = 'english_sentences';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'english_sentence'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'english_sentence' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
