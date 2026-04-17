<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\ProductDetail;
use App\Models\MaterialOption;
use App\Models\SizeOption;
use App\Models\ContactInfo;
use App\Models\CarouselSlide;

class PublicController extends Controller
{
    /**
     * Show the public jewellery showcase (home page)
     */
    public function index()
    {
        return view('jewellery-boost', [
            'hero' => HeroSection::getActive(),
            'product' => ProductDetail::getActive(),
            'materials' => MaterialOption::getAll(),
            'sizes' => SizeOption::getAll(),
            'contact' => ContactInfo::getActive(),
            'carouselSlides' => CarouselSlide::getAll(),
        ]);
    }
}
