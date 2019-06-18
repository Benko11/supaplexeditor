<?php

namespace App\Http\Controllers;

use App\Field\FieldRender;
use Illuminate\Support\Facades\Storage;
use App\File\File;

class ElementController extends Controller
{
  public function index()
  {
    return response()->json(['data' => elements()]);
  }

  public function indexImages()
  {
    return response()->json(['data' => elementsImages()]);
  }
}
