<?php

namespace App\Http\Controllers;

/** Models */
use App\Code;
use App\Specimen;
use App\Taxonomie;
use App\Curatorial;
use App\Collection;
use App\Caste;
/**  */
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
/** PhpSpreadsheet */
# Import
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Controllers\Src\MyReadFilter;
# Export
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SpecimenController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    return view('specimens.list', [
      'ids' => Specimen::select('id')->get()->pluck('id')->all(),
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
    $code = Code::where('value', $request->get('code'))->get();
    if ($code->isEmpty()) {
      $code = new Code();
      $code->value= $request->get('code');
      $code->save();
    }

    $specimen = new Specimen();
    $specimen->code_id = $code->id;
    $specimen->collection_notes = $request->get('collection_notes');
    $specimen->correction_notes = $request->get('correction_notes');
    $specimen->save();

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

  public function search() {
    return view('specimens.search');
  }

  public function find(Request $request) {
    /** if user dont select any attribute do: */
    if (sizeof($request->all()) < 2) {
      return redirect()->route('specimens.index');
    }
    /** Get attributes selected by user */
    $attributes = array_keys($request->all());
    unset($attributes[0]);
    /** Build conditions array */
    foreach ($attributes as $attribute) {
      list($table, $column, $value) = explode("@", $attribute);
      $conditions[] = [$table.'.'.$column, $value];
    }
    /**  Query to DB */
    $specimens = Specimen::join('taxonomies', 'specimens.id', '=', 'taxonomies.specimen_id')
      ->join('curatorials', 'specimens.id', '=', 'curatorials.specimen_id')
      ->join('collections', 'specimens.id', '=', 'collections.specimen_id')
      ->join('castes', 'specimens.id', '=', 'castes.specimen_id')
      ->where($conditions)->paginate(5000); # Aquí hay un error con paginación cuando se supera este límite.
    /** List of specimens on query */
    return view('specimens.list', [
      'ids' => $specimens->pluck('id')->all(),
      'specimens' => $specimens,
      'count' => $specimens->count()
    ]);
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

  public function import()
  {
    return view('specimens.import');
  }

  /** This method save in DB specimens from Excel file data */
  public function massStore(Request $request)
  {
    $inputFileName = $request->file('file')->path();
    $inputFileType = IOFactory::identify($inputFileName);
    $reader = IOFactory::createReader($inputFileType);
    $sheetname = 'Worksheet';
    $reader->setLoadSheetsOnly($sheetname);
    $filterSubset = new MyReadFilter();
    $reader->setReadFilter($filterSubset);
    $spreadsheet = $reader->load($inputFileName);
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    /** Insert data in DB: */
    foreach ($sheetData as $row) {
      /** Code */
      $code = Code::where('value', $row['A'])->first();  
      if ($code === null) {
        $code = new Code();
        $code->value = $row['A'];
        $code->save();
      }
      /** Data */
      $specimen = new Specimen();
      $specimen->code_id = $code->id;            # code_id
      $specimen->collection_notes = $row['AM'];  # collection_notes
      $specimen->correction_notes = $row['AN'];  # correction_notes
      $specimen->save();
      /** Taxonomie */
      $taxonomie = new Taxonomie();
      $taxonomie->specimen_id = $specimen->id;
      $taxonomie->subfamily = $row['B'];
      $taxonomie->tribe = $row['C'];
      $taxonomie->genus = $row['D'];
      $taxonomie->subgenre = $row['E'];
      $taxonomie->complex = $row['F'];
      $taxonomie->specie = $row['G'];
      $taxonomie->subspecie = $row['H'];
      $taxonomie->author = $row['I'];
      $taxonomie->save();
      /** Curatorial */
      $curatorial = new Curatorial();
      $curatorial->specimen_id = $specimen->id;
      $curatorial->prepared_by = $row['J'];
      $curatorial->prepared_at = $row['K'];
      $curatorial->determined_by = $row['L'];
      $curatorial->determined_at = $row['M'];
      $curatorial->life_stage_sex = $row['N'];
      $curatorial->medium = $row['O'];
      $curatorial->owned_by = $row['P'];
      $curatorial->located_at = $row['Q'];
      $curatorial->notes = $row['R'];
      $curatorial->collection_code = $row['S'];
      $curatorial->save();
      /** Collection */
      $collection = new Collection();
      $collection->specimen_id = $specimen->id;
      $collection->country = $row['T'];
      $collection->state = $row['U'];
      $collection->municipality = $row['V'];
      $collection->locality = $row['W'];
      $collection->site = $row['X'];
      $collection->latitude = $row['Y'];
      $collection->longitude = $row['Z'];
      $collection->altitude = $row['AA'];
      $collection->collected_at = $row['AB'];
      $collection->method = $row['AB'];
      $collection->habitat = $row['AD'];
      $collection->microhabitat = $row['AE'];
      $collection->collector_1 = $row['AF'];
      $collection->collector_2 = $row['AG'];
      $collection->relation = $row['AH'];
      $collection->save();
      /** Caste */
      $caste = new Caste();
      $caste->specimen_id = $specimen->id;
      $caste->workers = $row['AI'];   # workers
      $caste->soldiers = $row['AJ'];  # soldiers
      $caste->queens = $row['AK'];    # queens
      $caste->males = $row['AL'];     # males
      $caste->save();
    }

    return redirect()->route('specimens.index');
  }

  public function export($ids)
  {
    $ids = unserialize(urldecode($ids));
    if (!$ids) {
      $ids = Specimen::select('id')->get()->pluck('id')->all();
    }
    
    return view('specimens.export', [
      'ids' => $ids
    ]);
  }

  public function massShow(Request $request, $ids)
  {
    if ($request->has('pdf')) {
      // export to pdf...
    }

    if ($request->has('excel')) {  

      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      $sheet->setCellValue('A1', 'Datos');
      $sheet->setCellValue('A2', 'Número de Catálogo');

      $sheet->setCellValue('B1', 'Taxonomía');
      $sheet->setCellValue('B2', 'Subfamilia');
      $sheet->setCellValue('C1', 'Taxonomía');
      $sheet->setCellValue('C2', 'Tribu');
      $sheet->setCellValue('D1', 'Taxonomía');
      $sheet->setCellValue('D2', 'Género');
      $sheet->setCellValue('E1', 'Taxonomía');
      $sheet->setCellValue('E2', 'Subgénero');
      $sheet->setCellValue('F1', 'Taxonomía');
      $sheet->setCellValue('F2', 'Complejo o Grupo');
      $sheet->setCellValue('G1', 'Taxonomía');
      $sheet->setCellValue('G2', 'Especie');
      $sheet->setCellValue('H1', 'Taxonomía');
      $sheet->setCellValue('H2', 'Subespecie');
      $sheet->setCellValue('I1', 'Taxonomía');
      $sheet->setCellValue('I2', 'Autor');

      $sheet->setCellValue('J1', 'Curatorial');
      $sheet->setCellValue('J2', 'Preparado Por');
      $sheet->setCellValue('K1', 'Curatorial');
      $sheet->setCellValue('K2', 'Fecha de Preparación');
      $sheet->setCellValue('L1', 'Curatorial');
      $sheet->setCellValue('L2', 'Determinado Por');
      $sheet->setCellValue('M1', 'Curatorial');
      $sheet->setCellValue('M2', 'Fecha de Determinado');
      $sheet->setCellValue('N1', 'Curatorial');
      $sheet->setCellValue('N2', 'Life Stage Sex');
      $sheet->setCellValue('O1', 'Curatorial');
      $sheet->setCellValue('O2', 'Medio');
      $sheet->setCellValue('P1', 'Curatorial');
      $sheet->setCellValue('P2', 'Proporcionado Por');
      $sheet->setCellValue('Q1', 'Curatorial');
      $sheet->setCellValue('Q2', 'Localizado En');
      $sheet->setCellValue('R1', 'Curatorial');
      $sheet->setCellValue('R2', 'Notas del Espécimen');
      $sheet->setCellValue('S1', 'Curatorial');
      $sheet->setCellValue('S2', 'Número de Bitácora');
      
      $sheet->setCellValue('T1', 'Colecta');
      $sheet->setCellValue('T2', 'País');
      $sheet->setCellValue('U1', 'Colecta');
      $sheet->setCellValue('U2', 'Estado');
      $sheet->setCellValue('V1', 'Colecta');
      $sheet->setCellValue('V2', 'Municipio');
      $sheet->setCellValue('W1', 'Colecta');
      $sheet->setCellValue('W2', 'Localidad');
      $sheet->setCellValue('X1', 'Colecta');
      $sheet->setCellValue('X2', 'Sitio');
      $sheet->setCellValue('Y1', 'Colecta');
      $sheet->setCellValue('Y2', 'Latitud');
      $sheet->setCellValue('Z1', 'Colecta');
      $sheet->setCellValue('Z2', 'Longitud');
      $sheet->setCellValue('AA1', 'Colecta');
      $sheet->setCellValue('AA2', 'Altitud');
      $sheet->setCellValue('AB1', 'Colecta');
      $sheet->setCellValue('AB2', 'Fecha de Colecta');
      $sheet->setCellValue('AC1', 'Colecta');
      $sheet->setCellValue('AC2', 'Método de Colecta');
      $sheet->setCellValue('AD1', 'Colecta');
      $sheet->setCellValue('AD2', 'Hábitat');
      $sheet->setCellValue('AE1', 'Colecta');
      $sheet->setCellValue('AE2', 'Microhábitat');
      $sheet->setCellValue('AF1', 'Colecta');
      $sheet->setCellValue('AF2', 'Colector (1)');
      $sheet->setCellValue('AG1', 'Colecta');
      $sheet->setCellValue('AG2', 'Colector (2)');
      $sheet->setCellValue('AH1', 'Colecta');
      $sheet->setCellValue('AH2', 'Relación Ejemplares en Alcohol');

      $sheet->setCellValue('AI1', 'Castas');
      $sheet->setCellValue('AI2', 'Obreras');
      $sheet->setCellValue('AJ1', 'Castas');
      $sheet->setCellValue('AJ2', 'Soldados');
      $sheet->setCellValue('AK1', 'Castas');
      $sheet->setCellValue('AK2', 'Reinas');
      $sheet->setCellValue('AL1', 'Castas');
      $sheet->setCellValue('AL2', 'Machos');

      $sheet->setCellValue('AM1', 'Datos');
      $sheet->setCellValue('AM2', 'Notas de la Colección');
      $sheet->setCellValue('AN1', 'Datos');
      $sheet->setCellValue('AN2', 'Notas de Corrección');

      $ids = unserialize(urldecode($ids));
      $specimens = Specimen::find($ids);

      /** Excel file has assigned first row for name tables, second row for name columns.
       *  Third row it begins to write each specimen values. This is why i=3.
        */
      $i = 3;
      foreach ($specimens as $specimen) {
        $sheet->setCellValue('A'.$i, $specimen->catalog_number);

        $taxonomie = $specimen->taxonomie;
        $sheet->setCellValue('B'.$i, $request->has('subfamily') ? $taxonomie->subfamily : null);
        $sheet->setCellValue('C'.$i, $request->has('tribe') ? $taxonomie->tribe : null);
        $sheet->setCellValue('D'.$i, $request->has('genus') ? $taxonomie->genus : null);
        $sheet->setCellValue('E'.$i, $request->has('subgenre') ? $taxonomie->subgenre : null);
        $sheet->setCellValue('F'.$i, $request->has('complex') ? $taxonomie->complex : null);
        $sheet->setCellValue('G'.$i, $request->has('specie') ? $taxonomie->specie : null);
        $sheet->setCellValue('H'.$i, $request->has('subspecie') ? $taxonomie->subspecie : null);
        $sheet->setCellValue('I'.$i, $request->has('author') ? $taxonomie->author : null);

        $curatorial = $specimen->curatorial;
        $sheet->setCellValue('J'.$i, $request->has('prepared_by') ? $curatorial->prepared_by : null);
        $sheet->setCellValue('K'.$i, $request->has('prepared_at') ? $curatorial->prepared_at : null);
        $sheet->setCellValue('L'.$i, $request->has('determined_by') ? $curatorial->determined_by : null);
        $sheet->setCellValue('M'.$i, $request->has('determined_at') ? $curatorial->determined_at : null);
        $sheet->setCellValue('N'.$i, $request->has('life_stage_sex') ? $curatorial->life_stage_sex : null);
        $sheet->setCellValue('O'.$i, $request->has('medium') ? $curatorial->medium : null);
        $sheet->setCellValue('P'.$i, $request->has('owned_by') ? $curatorial->owned_by : null);
        $sheet->setCellValue('Q'.$i, $request->has('located_at') ? $curatorial->located_at : null);
        $sheet->setCellValue('R'.$i, $request->has('notes') ? $curatorial->notes : null);
        $sheet->setCellValue('S'.$i, $request->has('collection_code') ? $curatorial->collection_code : null);
        
        $collection = $specimen->collection;
        $sheet->setCellValue('T'.$i, $request->has('country') ? $collection->country : null);
        $sheet->setCellValue('U'.$i, $request->has('state') ? $collection->state : null);
        $sheet->setCellValue('V'.$i, $request->has('municipality') ? $collection->minicipality : null);
        $sheet->setCellValue('W'.$i, $request->has('locality') ? $collection->locality : null);
        $sheet->setCellValue('X'.$i, $request->has('site') ? $collection->site : null);
        $sheet->setCellValue('Y'.$i, $request->has('latitude') ? $collection->latitude : null);
        $sheet->setCellValue('Z'.$i, $request->has('longitude') ? $collection->longitude : null);
        $sheet->setCellValue('AA'.$i, $request->has('altitude') ? $collection->altitude : null);
        $sheet->setCellValue('AB'.$i, $request->has('collected_at') ? $collection->collected_at : null);
        $sheet->setCellValue('AC'.$i, $request->has('method') ? $collection->method : null);
        $sheet->setCellValue('AD'.$i, $request->has('habitat') ? $collection->habitat : null);
        $sheet->setCellValue('AE'.$i, $request->has('microhabitat') ? $collection->microhabitat : null);
        $sheet->setCellValue('AF'.$i, $request->has('collector_1') ? $collection->collector_1 : null);
        $sheet->setCellValue('AG'.$i, $request->has('collector_2') ? $collection->collector_2 : null);
        $sheet->setCellValue('AH'.$i, $request->has('relation') ? $collection->relation : null);

        $caste = $specimen->caste;
        $sheet->setCellValue('AI'.$i, $request->has('workers') ? $caste->workers : null);
        $sheet->setCellValue('AJ'.$i, $request->has('soldiers') ? $caste->soldiers : null);
        $sheet->setCellValue('AK'.$i, $request->has('queens') ? $caste->queens : null);
        $sheet->setCellValue('AL'.$i, $request->has('males') ? $caste->males : null);

        $sheet->setCellValue('AM'.$i, $request->has('collection_notes') ? $specimen->collection_notes : null);
        $sheet->setCellValue('AN'.$i, $request->has('correction_notes') ? $specimen->correction_notes : null);

        $i++;
      }
      
      $writer = new Xlsx($spreadsheet);
      $fileName = 'exported_at_'.now('America/Mexico_City')->toDateString().'.xlsx';
      $writer->save('./storage/downloads/'.$fileName);
      return Storage::disk('public')->download('/downloads/'.$fileName); # We have to delete all downloads after.
    }
  }
}