<?php

namespace App\Http\Controllers;

use App\Taxonomie;
use App\Collection;
use App\Specimen;
use App\Curatorial;
use App\Caste;
use Illuminate\Http\Request;

class InsertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('specimens.list', [
            'specimens' => Specimen::paginate(25),
            'count' => Specimen::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specimens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $specimen = Specimen::create([
            'code' => Specimen::generateCode($request->get('code')),
            'collection_notes' => $request->get('collection_notes'),
            'correction_notes' => $request->get('correction_notes')
        ]);

        $taxonomie = new Taxonomie();
        $taxonomie->specimen_id = $specimen->id;
        $taxonomie->subfamily = $request->get('subfamily');
        $taxonomie->tribe = $request->get('tribe');
        $taxonomie->genus = $request->get('genus');
        $taxonomie->subgenre = $request->get('subgenre');
        $taxonomie->complex = $request->get('complex');
        $taxonomie->specie = $request->get('specie');
        $taxonomie->subspecie = $request->get('subspecie');
        $taxonomie->author = $request->get('author');
        $taxonomie->save();

        $collection = new Collection();
        $collection->specimen_id = $specimen->id;
        $collection->country = $request->get('country');
        $collection->state = $request->get('state');
        $collection->municipality = $request->get('municipality');
        $collection->locality = $request->get('locality');
        $collection->site = $request->get('site');
        $collection->latitude = $request->get('latitude');
        $collection->longitude = $request->get('longitude');
        $collection->altitude = $request->get('altitude');
        $collection->collected_at = $request->get('collected_at');
        $collection->method = $request->get('method');
        $collection->habitat = $request->get('habitat');
        $collection->microhabitat = $request->get('microhabitat');
        $collection->collector_1 = $request->get('collector_1');
        $collection->collector_2 = $request->get('collector_2');
        $collection->relation = $request->get('relation');
        $collection->save();

        Curatorial::create([
            'specimen_id' => $specimen->id,
            'prepared_by' => $request->get('prepared_by'),
            'prepared_at' => $request->get('prepared_at'),
            'determined_by' => $request->get('determined_by'),
            'determined_at' => $request->get('determined_at'),
            'life_stage_sex' => $request->get('life_stage_sex'),
            'medium' => $request->get('medium'),
            'owned_by' => $request->get('owned_by'),
            'located_at' => $request->get('located_at'),
            'notes' => $request->get('notes'),
            'collection_code' => $request->get('collection_code')
        ]);

        Caste::create([
            'specimen_id' => $specimen->id,
            'workers' => $request->get('workers'),
            'soldiers' => $request->get('soldiers'),
            'queens' => $request->get('queens'),
            'males' => $request->get('males')
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specimen  $specimen
     * @return \Illuminate\Http\Response
     */
    public function show(Specimen $specimen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specimen  $specimen
     * @return \Illuminate\Http\Response
     */
    public function edit(Specimen $specimen)
    {
        return view('specimens.edit', [
            'specimen' => $specimen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specimen  $specimen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specimen $specimen)
    {
        # update taxonomie
        $taxonomie = $specimen->taxonomie;
        $taxonomie->subfamily = $request->get('subfamily');
        $taxonomie->tribe = $request->get('tribe');
        $taxonomie->genus = $request->get('genus');
        $taxonomie->subgenre = $request->get('subgenre');
        $taxonomie->complex = $request->get('complex');
        $taxonomie->specie = $request->get('specie');
        $taxonomie->subspecie = $request->get('subspecie');
        $taxonomie->author = $request->get('author');
        $taxonomie->save();
        # /update taxonomie

        # update curatorial
        $curatorial = $specimen->curatorial;
        $curatorial->prepared_by = $request->get('prepared_by');
        $curatorial->prepared_at = $request->get('prepared_at');
        $curatorial->determined_by = $request->get('determined_by');
        $curatorial->determined_at = $request->get('determined_at');
        $curatorial->life_stage_sex = $request->get('life_stage_sex');
        $curatorial->medium = $request->get('medium');
        $curatorial->owned_by = $request->get('owned_by');
        $curatorial->located_at = $request->get('located_at');
        $curatorial->notes = $request->get('notes');
        $curatorial->collection_code = $request->get('collection_code');
        $curatorial->save();
        # /update curatorial
        
        # update collection
        $collection = $specimen->collection;
        $collection->country = $request->get('country');
        $collection->state = $request->get('state');
        $collection->municipality = $request->get('municipality');
        $collection->locality = $request->get('locality');
        $collection->site = $request->get('site');
        $collection->latitude = $request->get('latitude');
        $collection->longitude = $request->get('longitude');
        $collection->altitude = $request->get('altitude');
        $collection->collected_at = $request->get('collected_at');
        $collection->method = $request->get('method');
        $collection->habitat = $request->get('habitat');
        $collection->microhabitat = $request->get('microhabitat');
        $collection->collector_1 = $request->get('collector_1');
        $collection->collector_2 = $request->get('collector_2');
        $collection->relation = $request->get('relation');
        $collection->save();
        # /update collection

        # update caste
        $caste = $specimen->caste;
        $caste->workers = $request->get('workers');
        $caste->soldiers = $request->get('soldiers');
        $caste->queens = $request->get('queens');
        $caste->males = $request->get('males');
        $caste->save();
        # /update caste

        # update data
        $specimen->collection_notes = $request->get('collection_notes');
        $specimen->correction_notes = $request->get('correction_notes');
        $specimen->save();
        # /update data

        return redirect()->route('specimens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specimen  $specimen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specimen $specimen)
    {
        $specimen->taxonomie->delete();
        $specimen->curatorial->delete();
        $specimen->collection->delete();
        $specimen->caste->delete();
        $specimen->delete();

        return redirect()->route('specimens.index');
    }
}