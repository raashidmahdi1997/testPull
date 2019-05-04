<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnglishSentenceControllerRequest;
use App\Http\Requests\UpdateEnglishSentenceControllerRequest;
use App\Repositories\EnglishSentenceControllerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\EnglishSentence;

class EnglishSentenceController extends Controller
{
    private $dataEnglish;

    public function getData()
    {
        $dataEnglish = EnglishSentence::all();
        return view('homePage.table',compact('dataEnglish')); 
        // return view('welcome');
    }
}
