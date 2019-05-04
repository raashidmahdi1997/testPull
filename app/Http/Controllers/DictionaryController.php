<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDictionaryControllerRequest;
use App\Http\Requests\UpdateDictionaryControllerRequest;
use App\Repositories\DictionaryControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\EnglishResources;
use App\Models\BanglaResources;


class DictionaryController extends Controller
{
    public function getData()
    {
        
        $data = \DB::table('dictionary')
                ->join('bangla_resources','bangla_resources.id','=','dictionary.bangla_word_id')
                ->join('english_resources','english_resources.id','=','dictionary.english_word_id')
                ->select('dictionary.id as id','bangla_resources.word as banglaWord',
                'english_resources.word as englishWord')
                ->get()->toArray();

        return view('words.dictionarytable',compact('data'));        
    }
    
}
