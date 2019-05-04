<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TranslationController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property integer english_sentence_id
 * @property integer bangla_sentence_id
 */
class Translation extends Model
{
    use SoftDeletes;

    public $table = 'translations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public $fillable = [
        'english_sentence_id',
        'bangla_sentence_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'english_sentence_id' => 'integer',
        'bangla_sentence_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
