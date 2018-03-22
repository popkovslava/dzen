<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class UploadController extends Controller
{
    /**
     * Usages Storage disc
     *
     * @var string
     */
    private $disc;

    /**
     * Save directory Storage disc
     *
     * @var string
     */
    private $dir;

    public function __construct()
    {
        parent::__construct();

        $this->disc = 'public-files';
        $this->dir = 'files';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $fileModel)
    {
        $response = [];
        $files = [];

        //Get all files params
        foreach ($request->allFiles() as $param) {
            if (is_array($param)) {
                foreach ($param as $file) {
                    $files[] = $file;
                }
            } else {
                $files[] = $file;
            }
        }

        foreach ($files as $file) {
            try {
                $path = $file->store($this->dir, $this->disc);
                $fileModel->fileName = $file->getClientOriginalName();
                $fileModel->filePath = \Storage::disk($this->disc)->getAdapter()->getPathPrefix() . $path;
                $fileModel->fileUrl = URL::asset($this->dir . "/{$path}");
                // If it now has an id, it should have been successful.
                if ($fileModel->save()) {
                // this creates the response structure for jquery file upload
                    $success = new \stdClass();
                    $success->name = $fileModel->fileName;
                    $success->size = $file->getSize();
                    $success->url = $fileModel->fileUrl;
                    $success->deleteUrl = action(class_basename($this) . '@destroy', $fileModel->id);
                    $success->deleteType = 'DELETE';
                    $success->fileID = $fileModel->id;

                    return Response::json(['files' => [$success]], 200);
                }
            } catch (Exception $exception) {
                // Something went wrong. Log it.
                Log::error($exception);
                $error = array(
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'error' => $exception->getMessage(),
                );
                // Return error
                return Response::json($error, 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload = File::find($id);
        $upload->delete();

        $success = new \stdClass();
        $success->{$upload->fileName} = true;

        return Response::json(array('files' => array($success)), 200);
    }
}
