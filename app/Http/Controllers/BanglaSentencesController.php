<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBanglaSentencesControllerRequest;
use App\Http\Requests\UpdateBanglaSentencesControllerRequest;
use App\Repositories\BanglaSentencesControllerRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\BanglaSentences;
use App\Models\EnglishSentence;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use View;

class BanglaSentencesController extends Controller
{

    private $dataBangla;
    private $dataEnglish;

    public function getData()
    {
        // $data = BanglaSentences::all();
        // return view('homePage.table',compact('data')); 
        // // return view('welcome');
        $dataBangla = BanglaSentences::all();
        $dataEnglish = EnglishSentence::all();
        return View::make('sentence.sentencetable')
        ->with('dataBangla',$dataBangla)
        ->with('dataEnglish', $dataEnglish);
    }
}
