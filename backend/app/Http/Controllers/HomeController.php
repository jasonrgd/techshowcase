<?php

namespace App\Http\Controllers;

use App\Repositories\SchoolRepositoryInterface;
use App\SchoolStat;

class HomeController extends Controller
{
    /**
     * @var SchoolRepositoryInterface
     */
    private $schoolRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchoolRepositoryInterface $schoolRepository)
    {
        $this->middleware('auth');
        $this->schoolRepository = $schoolRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schools = $this->schoolRepository->getData();
        $stats = SchoolStat::all();
        return view('home', ['schools' => $schools, 'stats' => $stats]);
    }
}
