<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EnglishResourcesController
 * @package App\Models
 * @version December 26, 2018, 6:21 pm UTC
 *
 * @property string word
 * @property string image_link
 */
class EnglishResources extends Model
{
    use SoftDeletes;

    public $table = 'english_resources';
    public $timestamps = false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'word',
        'image_link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'word' => 'string',
        'image_link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function dictionaryController()
    {
        return $this->hasOne('App\Models\DictionaryController','id')->limit(1);
    }

    
}
