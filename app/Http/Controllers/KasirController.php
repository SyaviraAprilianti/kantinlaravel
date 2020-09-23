<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use App\Transaksi;
use App\detailorder;
use PDF;

class kasirController extends Controller
{
    public function dashboardkasir(){
        return view('kasir.dashkasir');
    }

    public function index()
    {
        $menunye = menu::all();
        return view('transaksi.index',['menu'=>$menunye]);

    }

    public function invoice()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.voicemenu',['transaksi'=> $transaksi]);

    }


public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->id_user = "1";
        $transaksi->total_bayar = $request->totalprice;
        $transaksi->save();
        $idtransaksi = $transaksi->id_transaksi;

        $foods = $request->order;
        $data = array();
        foreach ($foods as $menus) {
            $data[] = [
                'id_menu' => $menus['id'],
                'qty' => $menus['qty'],
                'id_transaksi' => $idtransaksi
            ];
        }
        DetailOrder::insert($data);
        return $data;
    }


    public function orderan()
    {
        $transaksi = Transaksi::with('detailorder')->get();
        return view('transaksi.order', compact('transaksi'));
    }

    public function orderanpdf(Request $request)
    {
        $transaksi = Transaksi::with('detailorder')->get();
        $pdf = PDF::loadView('transaksi.orderpdf', compact('transaksi'));
        return $pdf->stream();
    }

    public function delete($id_transaksi){
        $transaksi = Transaksi::find($id_transaksi);
        $transaksi->delete();
        return redirect('/invoice');

      }
}
