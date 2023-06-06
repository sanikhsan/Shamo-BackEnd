<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        // Get request limit parameter
        $limit = $request->input('limit');

        // Get request transaction
        $transaction = Transaction::with(['Items.Product'])->where('users_id', Auth::user()->id)->paginate($limit);

        // Filter transaksi berdasarkan ID
        $id = $request->input('id');
        if ($id) {
            $transaction = Transaction::with(['Items.Product'])->find($id);

            if ($transaction) {
                ResponseFormatter::success(
                    $transaction,
                    'Data transaksi berhasil diambil'
                );
            } else {
                ResponseFormatter::error(
                    null,
                    'Data transaksi tidak ditemukan',
                    404
                );
            }
        }

        $status = $request->input('status');
        if ($status) {
            $transaction->where('status', $status);
        }

        return ResponseFormatter::success(
            $transaction,
            'Data list transaction berhasil diambil'
        );
    }
}
