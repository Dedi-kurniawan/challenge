<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getPesan($nilai)
    {
        switch ($nilai) {
            case 'create' :
                $notif = [
                    'alert-type' => 'success',
                    'message' => 'Data Berhasil Di Tambah!'
                ];
                break;
            case 'update' :
                $notif = [
                    'alert-type' => 'info',
                    'message' => 'Data Berhasil Di Update!'
                ];
                break;
            case 'delete' :
                $notif = [
                    'alert-type' => 'error',
                    'message' => 'Data berhasil di Hapus!'
                ];
                break;
            case 'error' :
                $notif = [
                    'alert-type' => 'warning',
                    'message' => 'Terjadi kesalahan silahkan ulangi!'
                ];
                break;
            default :
                $notif = false;
                break;
        }
        return $notif;
    }
}
