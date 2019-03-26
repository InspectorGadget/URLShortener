<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LinkController extends Controller
{

    public function createDIR(Request $request) {
        $unicode = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
        if ($this->isDir($unicode)) {
            return back()->with('error', 'Looks like an error on our side! :/');
        }

        $buildQuery = [
          'owner' => Session::get('email'),
          'link' => $request->input('link'),
          'code' => $unicode,
          'created_at' => new \DateTime()
        ];

        $result = DB::table(env("DB_LINKS"))
            ->insert($buildQuery);

        if (!$result) {
             return back()->with('error', 'Oops! Your DIR couldn\'t be created!');
        }

        return redirect(route('Shorten.me'))->with('message', 'URL Created!');
    }

    public function deleteDIR($id) {
        $result = DB::table(env("DB_LINKS"))
            ->where('ID', $id)
            ->delete();

        if ($result > 0) {
            return back()->with('error', 'Unable to delete!');
        }

        return back()->with('message', 'Successfully deleted!');
    }

    public function editDIR(Request $request, $id) {
        $buildQuery = [
          'link' => $request->input('link')
        ];

        $result = DB::table(env("DB_LINKS"))
            ->where('ID', $id)
            ->update($buildQuery);

        if (!$result) {
            return back()->with('error', 'Unable to process your request right now!');
        }

        return back()->with('message', 'Successfully edited!');
    }

    public function isDir($unicode): bool {
        $result = DB::table(env("DB_LINKS"))
            ->select('ID')
            ->where('code', $unicode)
            ->get()
            ->toArray();

        return count($result) > 0 ? true : false;
    }

    public function getAllLinks(): array {
        $result = DB::table(env("DB_LINKS"))
            ->select('*')
            ->where('owner', Session::get('email'))
            ->get()
            ->toArray();

        return $result;
    }

    public function getLinkByUnicode($unicode) {
        $result = DB::table(env("DB_LINKS"))
            ->select('*')
            ->where('code', $unicode)
            ->get()
            ->first();

        return $result;
    }

}
