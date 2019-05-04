<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VocabularyTaskController
 * @package App\Models
 * @version December 26, 2018, 6:22 pm UTC
 *
 * @property integer word_task_id
 * @property integer dictionary_id
 */
class VocabularyTask extends Model
{
    use SoftDeletes;

    public $table = 'vocabulary_tasks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'word_task_id',
        'dictionary_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'word_task_id' => 'integer',
        'dictionary_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function returnSpecificword($dictionary_id)
    {
        //  $synoAndAnto = \DB::select('select  bangla_resources.word as banglaWord

        //             from dictionary , bangla_resources

        //             where dictionary.bangla_word_id = '. '$dictionary_id');

        $dictionary = \DB::table('dictionary')
                    ->join('bangla_resources', 'dictionary.bangla_word_id', '=', 'bangla_resources.id')
                    ->where('dictionary.id','=','$dictionary_id')
                    ->select('dictionary.id as word')
                    ->get();
                    $message = "wrong answer";
                    echo "<script type='text/javascript'>alert('$dictionary');</script>";
       
        echo $dictionary;

        return response()->json($dictionary);
    }
    
}
