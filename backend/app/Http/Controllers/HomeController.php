<?php

namespace App\Http\Controllers;

use App\Repositories\SchoolRepositoryInterface;

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
        $data = $this->schoolRepository->getData();
        return view('home');
    }
}
