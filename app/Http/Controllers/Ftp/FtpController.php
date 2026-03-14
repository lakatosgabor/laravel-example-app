<?php

namespace App\Http\Controllers\Ftp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FtpController extends Controller
{
    public function uploadTestFile(){
        // 1. Teszt tartalom létrehozása
        $content = "Ez egy teszt fájl tartalma, ami FTP-re megy.";
        $fileName = 'teszt_' . time() . '.txt';

        try {
            // 2. Feltöltés a 'my_ftp' nevű lemezre
            // A 'put' metódus létrehozza a fájlt a távoli szerveren
            $success = Storage::disk('my_ftp')->put($fileName, $content);

            if ($success) {
                return "Siker! A fájl elérhető: " . $fileName;
            }
            
            return "Hiba történt a feltöltés során.";

        } catch (\Exception $e) {
            \Log::error("FTP hiba: " . $e->getMessage());
            return "Kapcsolódási hiba az FTP szerverhez.";
        }
    }
}
