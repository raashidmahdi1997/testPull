<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSentenceTaskControllerRequest;
use App\Http\Requests\UpdateSentenceTaskControllerRequest;
use App\Repositories\SentenceTaskControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\BanglaSentences;
use App\Models\EnglishSentence;
use View;

class SentenceTaskController extends Controller
{
   

    public function getData()
    {
        return View::make('sentence.sentencetable')
        ->with('dataBangla', BanglaSentences::all())
        ->with('dataEnglish', EnglishSentence::all());
    }
}
