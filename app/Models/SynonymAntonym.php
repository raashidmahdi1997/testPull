<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SynonymAntonymController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property integer word_task_id
 * @property integer english_word_id
 * @property integer synonym_word_id
 * @property integer antonym_word_id
 */
class SynonymAntonym extends Model
{
    use SoftDeletes;

    public $table = 'synonyms_antonyms';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'word_task_id',
        'english_word_id',
        'synonym_word_id',
        'antonym_word_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'word_task_id' => 'integer',
        'english_word_id' => 'integer',
        'synonym_word_id' => 'integer',
        'antonym_word_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
