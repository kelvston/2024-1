<?php

namespace App\Http\Controllers;

use App\DocumentStamp;
//use Barryvdh\DomPDF\PDF;
use App\Http\Requests\MajinaKuzaliwaRequest;
use App\MajinaKuzaliwa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\View\Factory as ViewFactory;
use App\Jobs\GeneratePdfJob;
use setasign\Fpdi\PdfReader;
use setasign\Fpdi\Fpdi;
use setasign\Fpdf\Fpdf;
use Illuminate\Http\RedirectResponse;
//use Barryvdh\DomPDF\Facade as PDF;use Dompdf\Dompdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use App\Document;
use App\MajinaSahili;
use Carbon\Carbon;



class DocumentSealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $stamps = DocumentStamp::all();
        return view('document.create',compact('stamps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexOath(){
        $stamps = DocumentStamp::all();
        $documents = Document::where('user_id',100)->get();
        return view('document.create_oath',compact('stamps','documents'));
    }

    public function post(Request $request,$id=null)
    {

    $request->validate([
        'document' => 'required|file|mimes:pdf|max:2048',
        'name' => 'required',
        'description' => 'required',
    ]);

    $uploadedDocument = $request->file('document');
    $storedPath = $uploadedDocument->storeAs('public/uploads', $uploadedDocument->getClientOriginalName());

    if (!$storedPath) {
        return response()->json(['error' => 'Failed to store the document'], 500);
    }
    $pdfPath = storage_path('app/' . $storedPath);

    if (!file_exists($pdfPath)) {
        return response()->json(['error' => 'File not found'], 404);
    }


    $pdf = new Fpdi();

    $pageCount = $pdf->setSourceFile($pdfPath);
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $templateId = $pdf->importPage($pageNo);
        $pdf->AddPage();
        $pdf->useTemplate($templateId);

        if($id == 1){
            $imagePath = public_path('assets/img/oath.png');
            $pdf->Image($imagePath, 130, 225, 40, 40);
        }else{
            $imagePath = public_path('assets/img/sign_og.png');
            $pdf->Image($imagePath, 130, 225, 50, 40);
        }


    }
    $modifiedPdfName =  'modified' . $uploadedDocument->getClientOriginalName();
    $modifiedPdfPath = storage_path('app/public/uploads/' . $modifiedPdfName);
    $pdf->Output($modifiedPdfPath, 'F');

    // Manually save the modified PDF using file_put_contents
    $modifiedPdfContent = $pdf->Output('S');
    file_put_contents($modifiedPdfPath, $modifiedPdfContent);
    $url = asset('storage/uploads/'.$modifiedPdfName);
 //    return response()->json(['success' => true, 'url' => $url], 200);
    $document = Document::updateOrCreate(
        [
            'name' => $request->input('name'),
            'user_id' => 100
        ],
        [
            'description' => $request->input('description'),
            'attachment' => $url
        ]
    );
   if ($document) {
       $urll = $document->attachment;
       return response()->json(['success' => true, 'url' => $urll], 200);
   } else {
       return response()->json(['error' => 'Failed to save the document in the database'], 500);
   }




   }


    public function uploadDownloadTime(Request $request, $documentId)
    {

        $document = Document::find($documentId);
        if ($document) {
            $document->downloaded_at = Carbon::now();
            $document->save();
            return response()->json(['success' => true, 'message' => 'Download time updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Document not found'], 404);
        }
    }


    public function previewDocument($userId){
        $documents = Document::where('user_id', $userId)->get();

        return response()->json($documents);
    }


    public function preview($id=null){
        return view('document.create_oath');
    }

    public function viapoMajina(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $stamps = DocumentStamp::all();

        $documents = Document::where('user_id',auth()->user()->id)->get();

        return view('document.viapo_majina.create',compact('stamps','documents'));

    }

    public function viapoKuzaliwa(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $stamps = DocumentStamp::all();

        $documents = Document::where('user_id',auth()->user()->id)->get();

       return view('document.viapo_kuzaliwa.create',compact('stamps','documents'));

    }

    public function saveViapoMajina(Request $request){

        $userId = auth()->user()->id;
        $inputData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'name_edit.*' => 'required|string|max:255',
            'name_wrong.*' => 'required|string|max:255',
        ]);

         $nameEdits = $inputData['name_edit'];
         $nameWrongs = $inputData['name_wrong'];
         if ($nameWrongs) {
            foreach ($nameWrongs as $nameWrong) {
                if (!empty($nameWrong)) {
                    MajinaSahili::create([
                        'user_id' => $userId,
                        'full_name' => $request->input('name'),
                        'address' => $request->input('address'),
                        'religion' => $request->input('religion'),
                        'occupation' => $request->input('occupation'),
                        'name_wrong' => $nameWrong,
                        'name_edit' => null,
                    ]);
                }
            }
        }

        if ($nameEdits) {
            foreach ($nameEdits as $nameEdit) {
                if (!empty($nameEdit)) {
                    MajinaSahili::create([
                        'user_id' => $userId,
                        'full_name' => $request->input('name'),
                        'address' => $request->input('address'),
                        'religion' => $request->input('religion'),
                        'occupation' => $request->input('occupation'),
                        'name_wrong' => null,
                        'name_edit' => $nameEdit,
                    ]);
                }
            }
        }

        $routeParams = [
            '_token'=>$request->input('_token'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'religion' => $request->input('religion'),
            'occupation' => $request->input('occupation'),
            'name_edit' => $nameEdits,
            'name_wrong' => $nameWrongs,
        ];

        return response()->json(['success' => true, 'data' => $routeParams], 200);
    }

//    public function saveKuzaliwa(Request $request){
//        $userId = auth()->user()->id;
//        // Trim & Normalize Input
//        $request->merge(array_map('trim', $request->all()));
//        $request->merge(['birthWitness' => strtolower(trim($request->birthWitness))]);
//
//        // Validation Messages
//        $messages = [
//            'name.required' => 'Jina linahitajika.',
//            'name.string' => 'Jina lazima liwe maandishi.',
//            'name.max' => 'Jina lisizidi herufi 255.',
//            'address.required' => 'Anwani inahitajika.',
//            'religion.required' => 'Dini inahitajika.',
//            'occupation.required' => 'Kazi inahitajika.',
//            'hospital.required' => 'Hospitali inahitajika.',
//            'hospital_address.required' => 'Anwani ya hospitali inahitajika.',
//            'birthCategory.required' => 'Aina ya kuzaliwa inahitajika.',
//            'birthWitness.required' => 'Shahidi wa kuzaliwa anahitajika.',
//            'signature.required' => 'Sahihi inahitajika.',
//            'signature.file' => 'Sahihi lazima iwe faili halali.',
//            'signature.mimes' => 'Sahihi lazima iwe katika format ya JPG, PNG, au PDF.',
//            'signature.max' => 'Sahihi isizidi 2MB.',
//            'date.required' => 'Tarehe inahitajika.',
//            'date.date' => 'Tarehe lazima iwe halali.',
//            'witnessName.required' => 'Weka jina la mtu wa kawaida.',
//        ];
//
//
//            // Base Validation
//            $inputData = $request->validate([
//                'name' => 'required|string|max:255',
//                'address' => 'required|string|max:255',
//                'religion' => 'required|string|max:255',
//                'occupation' => 'required|string|max:255',
//                'hospital' => 'required|string|max:255',
//                'hospital_address' => 'required|string|max:255',
//                'birthCategory' => 'required|string|max:255',
//                'birthWitness' => 'required|string|max:255',
//                'signature' => 'required|file|mimes:jpg,png,pdf|max:2048',
//                'date' => 'required|date',
//                'witnessName' => $request->birthWitness === 'regular' ? 'required|string|max:255' : 'nullable|string|max:255',
//            ], $messages);
//
//            // Additional Validation if Witness is 'Regular'
//            if ($request->birthWitness === 'regular') {
//                $extraValidation = $request->validate([
//                    'region' => 'required|string|max:255',
//                    'district' => 'required|string|max:255',
//                    'ward' => 'required|string|max:255',
//                    'village' => 'required|string|max:255',
//                ], [
//                    'region.required' => 'Mkoa unahitajika.',
//                    'district.required' => 'Wilaya inahitajika.',
//                    'ward.required' => 'Kata inahitajika.',
//                    'village.required' => 'Kijiji kinahitajika.',
//                ]);
//
//                $inputData = array_merge($inputData, $extraValidation);
//            }
//
//        $signaturePath = $request->file('signature')->store('signatures', 'public');
//
//
//        $user = MajinaKuzaliwaRequest::create([
//            'user_id'=>$userId,
//            'name' => $inputData['name'],
//            'address' => $inputData['address'],
//            'religion' => $inputData['religion'],
//            'occupation' => $inputData['occupation'],
//            'hospital' => $inputData['hospital'],
//            'hospital_address' => $inputData['hospital_address'],
//            'birthCategory' => $inputData['birthCategory'],
//            'birthWitness' => $inputData['birthWitness'],
//            'signature' => $signaturePath, // Save the file path
//            'date' => $inputData['date'],
//            'witnessName' => $inputData['witnessName'] ?? null, // Only save witness name if available
//        ]);
//
//
//        $routeParams = [
//            '_token'=>$request->input('_token'),
//            'name' => $inputData['name'],
//            'address' => $inputData['address'],
//            'religion' => $inputData['religion'],
//            'occupation' => $inputData['occupation'],
//            'birthCategory' => $inputData['birthCategory'],
//            'birthWitness' => $inputData['birthWitness'],
//            'signature' => $signaturePath,
//            'date' => $inputData['date'],
//            'witnessName' => $inputData['witnessName'] ?? null,
//        ];
//
//        return response()->json(['success' => true, 'data' => $routeParams], 200);
//    }

    public function saveKuzaliwa(MajinaKuzaliwaRequest $request)
    {

        $userId = auth()->user()->id;

        $signaturePath = $request->file('signature')->store('signatures', 'public');


        $user = MajinaKuzaliwa::create([
            'user_id' => $userId,
            'name' => $request['name'],
            'address' => $request['address'],
            'religion' => $request['religion'],
            'occupation' => $request['occupation'],
            'hospital' => $request['hospital'],
            'hospital_address' => $request['hospital_address'],
            'birthCategory' => $request['birthCategory'],
            'birthWitness' => $request['birthWitness'],
            'signature' => $signaturePath,
            'date' => $request['date'],
            'witnessName' => $request['witnessName'] ?? null,
        ]);

        $routeParams = [
            '_token'=>$request->input('_token'),
            'name' => $request['name'],
            'address' => $request['address'],
            'religion' => $request['religion'],
            'occupation' => $request['occupation'],
            'hospital' => $request['hospital'],
            'hospital_address' => $request['hospital_address'],
            'birthCategory' => $request['birthCategory'],
            'birthWitness' => $request['birthWitness'],
            'signature' => $signaturePath,
            'date' => $request['date'],
            'witnessName' => $request['witnessName'] ?? null,
        ];

        return response()->json(['success' => true, 'data' => $routeParams], 200);

    }

    public function generatePDF(Request $request)
    {

        $fullName = $request->datas['name'];
        $address = $request->datas['address'];
        $religion = $request->datas['religion'];
        $occupation = $request->datas['occupation'];
        $nameEdits = $request->datas['name_edit'];
        $nameWrongs = $request->datas['name_wrong'];



        // Load the view and pass the variables
        $pdf = PDF::loadView('document.viapo_majina.pdf.generated_names', compact('fullName', 'address','religion', 'occupation', 'nameEdits', 'nameWrongs'));

        $fileName = 'certificate_' . time() . '.pdf';
        $filePath = storage_path('app/public/templates/' . $fileName);
        $pdf->save($filePath);

        $url = asset('storage/templates/'.$fileName);


        $document = Document::updateOrCreate(
            [
                'name' => 'majina yamekosewa document',
                'user_id' =>  auth()->user()->id
            ],
            [
                'description' => 'template',
                'attachment' => $url
            ]
        );


        if ($document) {
            $urll = $document->attachment;
            return response()->json(['success' => true, 'url' => $urll], 200);
        } else {
            return response()->json(['error' => 'Failed to save the document in the database'], 500);
        }

    }

    public function generatePDFKuzaliwa(Request $request){


        $fullName = $request->datas['name'];
        $address = $request->datas['address'];
        $hospital_address = $request->datas['hospital_address'];
        $religion = $request->datas['religion'];
        $occupation = $request->datas['occupation'];
        $birthCategory = $request->datas['birthCategory'];
        $birthWitness = $request->datas['birthWitness'];
        $signature = $request->datas['signature'];
        $date = $request->datas['date'];
        $witnessName = $request->datas['witnessName'];

        // Load the view and pass the variables
        $pdf = PDF::loadView('document.viapo_kuzaliwa.pdf.generate_kuzaliwa', compact('fullName', 'address','religion', 'occupation', 'birthCategory', 'birthWitness','signature','date','witnessName','hospital_address'));

        $fileName = 'certificate_' . time() . '.pdf';
        $filePath = storage_path('app/public/templates/' . $fileName);
        $pdf->save($filePath);

        $url = asset('storage/templates/'.$fileName);


        $document = Document::updateOrCreate(
            [
                'name' => 'Kiapo chs kuzaliwa',
                'user_id' =>  auth()->user()->id
            ],
            [
                'description' => 'template',
                'attachment' => $url
            ]
        );


        if ($document) {
            $urll = $document->attachment;
            return response()->json(['success' => true, 'url' => $urll], 200);
        } else {
            return response()->json(['error' => 'Failed to save the document in the database'], 500);
        }

    }

}
