<?php

namespace App\Http\Controllers;

use App\Library\Services\SchoolDataService;
use App\Repositories\SchoolRepository;
use App\Repositories\SchoolRepositoryInterface;
use App\Respositories\SchoolStatsRepositoryInterface;
use Illuminate\Cache\CacheManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * @var SchoolRepositoryInterface
     */
    private $schoolRepository;

    /**
     * @var SchoolStatsRepositoryInterface
     */
    private $schoolStatsRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchoolRepositoryInterface $schoolRepository,
        SchoolStatsRepositoryInterface $schoolStatsRepository)
    {
        $this->middleware('auth');
        $this->schoolRepository = $schoolRepository;
        $this->schoolStatsRepository = $schoolStatsRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->schoolRepository->getData();
        return view('home');
    }
}
