<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CartController extends Controller
{

    public function addcart(Request $request, $id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $product = Product::find($id);
            $cart = new cart;
            $cart->user_id = $userId;
            $cart->name = $product->name;
            $cart->price = $product->original_price;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back()->with('message', 'Added Successfully');
        } else {
            return redirect('login');
        }
    }

    public function showcart()
    {

        $user = auth()->user();
        $cart = DB::table('carts')->select('id', 'name', 'price', 'quantity')->get();
        return view('frontend.cart', ['cart' => $cart]);
    }
    public function deletecart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Removed Successfully');
    }
    public function checkout(Request $request)
    {

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/bill";
        $vnp_TmnCode = "WPBJCL0Z"; //Mã website tại VNPAY 
        $vnp_HashSecret = "HTRAGFHBVVLGVCVHHUBWVUJPVSZFQWMR"; //Chuỗi bí mật

        $vnp_TxnRef = $request->idbill; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Checkout';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = ($request->price) * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'EXIMBANK';
        // $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version

        //Billing

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            // "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function createPayment(Request $request)
    {
        $data = [

            'pay_price' => $request->vnp_Amount,
            'pay_code_vnpay' => $request->vnp_TxnRef,
            'pay_code_bank' => $request->vnp_BankCode,
            'username' => Auth::user()->name,
            'pay_time' => $request->vnp_PayDate,

        ];
        $created = DB::table('payments')->insert($data);

        if ($created) {
            DB::table('carts')->where('user_id', Auth::id())->delete();
            return view('frontend.payment', $data);
        }
    }
}