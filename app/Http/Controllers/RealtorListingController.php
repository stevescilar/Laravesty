<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Listing;

class RealtorListingController extends Controller
{
    // for resource controllers you should use constructor
    public function __construct(){
        $this->authorizeResource(Listing::class, 'listing');
    }
   
    public function index()
    {
        // dd(Auth::user()->listings);
        return inertia(
            'Realtor/Index',
            ['listings' => Auth::user()->listings]);
    }
    public function destroy(Listing $listing)
    {
        // when model already deleted->404
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success','Listing was deleted');
    }
}
