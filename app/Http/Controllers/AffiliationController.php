<?php

namespace App\Http\Controllers;

use App\Http\Requests\AffiliationRequest;
use App\Models\Affiliation;
use Illuminate\Http\Request;

class AffiliationController extends Controller
{
    /**
     * Get all affiliations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    //
    public function index(){

        return Affiliation::all();
    }

    /**
     * Retrieves and returns an Affiliation object based on the given ID.
     *
     * @param string $id The ID of the Affiliation to retrieve.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the Affiliation with the given ID is not found.
     * @return \App\Models\Affiliation The retrieved Affiliation object.
     */
    public function show(string $id){
        
        return Affiliation::findOrFail($id);
    }

    /**
     * Deletes an affiliation from the database.
     *
     * @param string $id The ID of the affiliation to be deleted.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the affiliation with the given ID is not found.
     * @return Affiliation The deleted affiliation.
     */
    public function destroy(string $id){
        
        $affiliation = Affiliation::findOrFail($id);
        $affiliation->delete();

        return $affiliation;
    }

    /**
     * Store an affiliation request.
     *
     * @param AffiliationRequest $request The affiliation request to be stored.
     * @throws Some_Exception_Class Description of any exception that may occur.
     * @return Affiliation The stored affiliation.
     */
    public function store(AffiliationRequest $request){
        
        $validated = $request->validated();

        $affiliation = Affiliation::create($validated);

        return $affiliation;
    }

    /**
     * Update the name of an affiliation.
     *
     * @param AffiliationRequest $request the request object containing the validated data
     * @param string $id the ID of the affiliation to be updated
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException if the affiliation with the given ID is not found
     * @return Affiliation the updated affiliation object
     */
    public function name(AffiliationRequest $request, string $id){

        $affiliation = Affiliation::findOrFail($id);
        $validated = $request->validated();
        $affiliation->name = $validated['name'];

        $affiliation->save();

        return $affiliation;
    }
}
