<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BanglaResourcesController
 * @package App\Models
 * @version February 11, 2019, 11:17 am UTC
 *
 * @property string word
 */
class BanglaResources extends Model
{
    use SoftDeletes;

    public $table = 'bangla_resources';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'word'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'word' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function dictionary()
    {
        return $this->hasOne('App\Models\DictionaryController','id')->limit(1);
    }

    
    
}
