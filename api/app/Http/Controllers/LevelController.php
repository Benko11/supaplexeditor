<?php

namespace App\Http\Controllers;

use App\Field\FieldRender;
use Illuminate\Support\Facades\Storage;
use App\File;

class LevelController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * 
     */
    public function show($id) {
        $file = new File;
        $file->config('LEVELS', 'DAT')->read();

        $level = $file->level($id)->render();
        return response()->json(['data' => [
            'capacity' => $file->getCapacity(),
            'width' => $file->getWidth(),
            'height' => $file->getHeight(),
            'level' => $level,
        ]]);
    }

    /**
     * 
     */
    public function test() {
        $file = new File;
        $file->setType('DAT');
        $file->setFileName('LEVELS');
        $file->setSource();
        $file->read();
        
        dd($file->levels());
    }
}