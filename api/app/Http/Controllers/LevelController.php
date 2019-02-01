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

        $level = $file->level($id);
        return response()->json(['data' => [
            'capacity' => $file->getCapacity(),
            'width' => $level->getWidth(),
            'height' => $level->getHeight(),
            'name' => $level->name(),
            'infotrons' => $level->infotrons(),
            'infotronsAll' => $level->allInfotrons(),
            'gravity' => $level->gravity(),
            'freezeZonks' => $level->freezeZonks(),
            'level' => $level->render()
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
