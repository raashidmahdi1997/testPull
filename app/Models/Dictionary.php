<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DictionaryController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property integer english_word_id
 * @property integer bangla_word_id
 */
class Dictionary extends Model
{
    use SoftDeletes;

    public $table = 'dictionary';
    public $timestamps = false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'english_word_id',
        'bangla_word_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'english_word_id' => 'integer',
        'bangla_word_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

   

    // public function banglaResourcesController()
    // {
    //     return $this->belongsTo('App\Models\BanglaResourcesController','bangla_word_id')->limit(1);
    // }

    // public function englishResourcesController()
    // {
    //     return $this->belongsTo('App\Models\EnglishResourcesController','english_word_id')->limit(1);
    // }

    
}
