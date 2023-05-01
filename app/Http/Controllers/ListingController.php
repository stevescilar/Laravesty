<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class ListingController extends Controller
{
    // for resource controllers you should use constructor
    public function __construct(){
        $this->authorizeResource(Listing::class, 'listing');
    }
   
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // filtering and display at the index page
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);
        // Building Query for search/filtering
        
        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                // display with pagination
                'listings' => Listing::mostRecent()
                ->when(
                    $filters['priceFrom'] ?? false,
                    fn ($query, $value) => $query->where('price','>=',$value)
                )->when(
                    $filters['priceTo'] ?? false,
                    fn ($query, $value) => $query->where('price','<=',$value)
                )->when(
                    $filters['beds'] ?? false,
                    // extension of 6+
                    fn ($query, $value) => $query->where('beds',(int)$value < 6 ? '=' : '>=',$value)
                )->when(
                    $filters['baths'] ?? false,
                    // extension of 6+
                    fn ($query, $value) => $query->where('baths',(int)$value < 6 ? '=' : '>=',$value)
                )->when(
                    $filters['areaFrom'] ?? false,
                    fn ($query, $value) => $query->where('area','>=',$value)
                )->when(
                    $filters['areaTo'] ?? false,
                    fn ($query, $value) => $query->where('area','<=',$value)
                )->paginate(9)->withQueryString()
            ]
            );
    }



    public function create()
    {
        // using policy to prevent an action
        // $this->authorize('create', Listing::class);
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create(
             $request->validate([
                'beds' => 'required|integer|min:0|max:21',
                'baths' => 'required|integer|min:0|max:21',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:2000000',
            ]) 
        );

        return redirect()->route('listing.index')->with('success', 'Listing was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        // if (Auth::user()->cannot('view', $listing)) {
        //     abort(403);
        // }

        // prefered way
        // $this->authorize('view', $listing);
        return inertia(
            'Listing/Show',
      
            [
                'listing' => $listing
            ]
            );
    }

 
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
      
            [
                'listing' => $listing
            ]
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
               'beds' => 'required|integer|min:0|max:21',
               'baths' => 'required|integer|min:0|max:21',
               'area' => 'required|integer|min:15|max:1500',
               'city' => 'required',
               'code' => 'required',
               'street' => 'required',
               'street_nr' => 'required|min:1|max:1000',
               'price' => 'required|integer|min:1|max:2000000',
           ]) 
       );

       return redirect()->route('listing.index')->with('success', 'Listing was Changed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()
            ->with('success','Listing was deleted');
    }
}
