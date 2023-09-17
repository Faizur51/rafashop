<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class CheckoutComponent extends Component
{
    public $ship_to_defferent;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $address;
    public $city;
    public $district;
    public $thana;


    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_address;
    public $s_city;
    public $s_district;
    public $s_thana;

   public $paymentmode;


   public $thankyou;


    public $disabled=false;

    public function updated($fields){


        $this->validateOnly($fields,[

            'firstname'=>'required',
            'lastname'=>'required',
            'mobile'=>'required|numeric|unique:orders',
            'email'=>'required|email|unique:orders',
            'address'=>'required',
            'city'=>'required',
            'district'=>'required',
            'thana'=>'required',
            'paymentmode'=>'required',

        ]);


        if($this->ship_to_defferent)

         $this->validateOnly($fields,[
             's_firstname'=>'required',
             's_lastname'=>'required',
             's_mobile'=>'required|numeric',
             's_email'=>'required|email',
             's_address'=>'required',
             's_city'=>'required',
             's_district'=>'required',
             's_thana'=>'required',

         ]);

    }

   public function placeOrder()
   {

        $this->validate([

        'firstname'=>'required',
        'lastname'=>'required',
        'mobile'=>'required|numeric|unique:orders',
        'email'=>'required|email|unique:orders',
        'address'=>'required',
        'city'=>'required',
        'district'=>'required',
        'thana'=>'required',
           'paymentmode'=>'required',
       ]);

       $order=new Order();
       $order->user_id=Auth::user()->id;
       $order->subtotal=session()->get('checkout')['subtotal'];
       $order->discount=session()->get('checkout')['discount'];
       $order->tax=session()->get('checkout')['tax'];
       $order->total=session()->get('checkout')['total'];

      $order->firstname=$this->firstname;
      $order->lastname=$this->lastname;
      $order->mobile=$this->mobile;
      $order->email=$this->email;
      $order->address=$this->address;
      $order->city=$this->city;
      $order->district=$this->district;
      $order->thana=$this->thana;
      $order->status='ordered';
      $order->shipping_different=$this->ship_to_defferent ? 1: 0;
      $order->save();



      foreach (Cart::instance('cart')->content() as $item)
      {

       $orderitem=new OrderItem();
       $orderitem->product_id=$item->id;
       $orderitem->order_id=$order->id;
       $orderitem->price=$item->price;
       $orderitem->quantity=$item->qty;
       $orderitem->save();

      }

     if($this->ship_to_defferent){
         $this->validate([
             's_firstname'=>'required',
             's_lastname'=>'required',
             's_mobile'=>'required|numeric',
             's_email'=>'required|email',
             's_address'=>'required',
             's_city'=>'required',
             's_district'=>'required',
             's_thana'=>'required',
         ]);

         $shipping=new Shipping();
         $shipping->order_id=$order->id;
         $shipping->firstname=$this->s_firstname;
         $shipping->lastname=$this->s_lastname;
         $shipping->mobile=$this->s_mobile;
         $shipping->email=$this->s_email;
         $shipping->address=$this->s_address;
         $shipping->city=$this->s_city;
         $shipping->district=$this->s_district;
         $shipping->thana=$this->s_thana;
         $shipping->save();
     }

    if($this->paymentmode=="cod"){
        /*$transaction=new Transaction();
        $transaction->user_id=Auth::user()->id;
        $transaction->order_id=$order->id;
        $transaction->mode="cod";
        $transaction->status="pending";
        $transaction->save();*/
        $this->makeTransaction($order->id,'pending');
        $this->resetCart();

    }else if($this->paymentmode=="card"){

        dd('Online payment gateway');
    }

   }

   public function resetCart(){
       $this->thankyou=1;
       Cart::instance('cart')->destroy();
       session()->forget('checkout');
   }

   public function makeTransaction($order_id,$status){

       $transaction=new Transaction();
       $transaction->user_id=Auth::user()->id;
       $transaction->order_id=$order_id;
       $transaction->mode=$this->paymentmode;
       $transaction->status=$status;
       $transaction->save();

   }

   public function varifyForCheckout()
   {
        if(!Auth::check())
        {
          return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('shop.cart');
        }
   }

   //aie code cart component theke ana holo coupon thakle tar discount korar jonno

    public function calculateDiscounts(){

        if(session()->has('coupon')){
            if(session()->get('coupon')['type'] =='fixed'){
                $this->discount=session()->get('coupon')['value'];
            }else{
                $this->discount=Cart::instance('cart')->subtotal()*session()->get('coupon')['value']/1010;
            }
            $this->subtotalAfterDiscount=Cart::instance('cart')->subtotal()-$this->discount;
            $this->taxAfterDiscount=($this->subtotalAfterDiscount*config('cart.tax'))/100;
            $this->totalAfterDiscount=$this->subtotalAfterDiscount+$this->taxAfterDiscount;
        }
    }

    public function setAmmountForCheckout(){

        if(!Cart::instance('cart')->count()>0){
            session()->forget('checkout');
            return;
        }

        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'tax'=>$this->taxAfterDiscount,
                'total'=>$this->totalAfterDiscount
            ]);
        }
        else
        {
            session()->put('checkout',[
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'tax'=>Cart::instance('cart')->tax(),
                'total'=>Cart::instance('cart')->total()
            ]);
        }
    }

    public function checkoutModal(){
       $this->dispatchBrowserEvent('show-modal');
    }


    public function render()
    {

        $this->varifyForCheckout();

        if(session()->has('coupon')){
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }else{
                $this->calculateDiscounts();
            }
        }

        $this->setAmmountForCheckout();

        return view('livewire.checkout-component');
    }
}
