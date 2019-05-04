<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWordTaskControllerRequest;
use App\Http\Requests\UpdateWordTaskControllerRequest;
use App\Repositories\WordTaskControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\BanglaResources;
use App\Models\EnglishResources;
use App\Models\Dictionary;
use App\Models\SynonymAntonym;
use App\Models\Translation;
use App\Models\VocabularyTask;
use View;

class WordTaskController extends Controller
{

    public function getData()
    {
        return View::make('words.wordtable')
        ->with('dataBangla',BanglaResources::all())
        ->with('dataEnglish', EnglishResources::all())
        ->with('dictionary',Dictionary::all())
        ->with('synonymAntonym', SynonymAntonym::all())
        ->with('translation',Translation::all()
    );
    }
}
