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
    public function show() {
        return dd(new FieldRender);
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
        dd($file);
    }
}
