<?php

namespace App\Http\Controllers;

 use Cart;
  use Shoppingcart;
  use App\Order;
  use Carbon\Carbon;
  // use App\Transaction;

use App\Product ; 
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
 use PayPal\Api\Transaction;
use Session;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use PayPal\Api\PaymentExecution;

class Paymentcontroller extends Controller
{

    private $apiContext;
    public function __construct(){
        $this->apiContext =  new ApiContext(
        new OAuthTokenCredential(
            config('paypal.client_id'),
           config('paypal.secret'),
        )

    );
        $this->apiContext->setConfig(config('paypal.settings'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $payment_id = Session::get('payment_id');
        Session::forget('payment_id');
         $execution = new PaymentExecution();
          
         $execution->setPayerId($request->input('PayerID'));
         $payment = Payment::get($payment_id, $this->apiContext);
         try{
            $result = $payment->execute($execution, $this->apiContext);
           if ($result->getState() == 'approved') {
             return redirect()->back()->with('success','Thanh toán thành công');
           }else
           {
            return "that bai";
           }
        }catch (Exception $e){
            return "Faild";
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            dd($this->apiContext);
                ### Payer
        // $totalmoney =str_replace(',','', \Cart::getSubTotal(0,3)) ;
        //   dd($request->all());
        // $transaction = Transaction::insertGetId([
        //         'tr_user_id'=> get_data_user('web','id'),
        //         'tr_total'  => (int)$totalmoney,
        //         'tr_note'   => $request->note,
        //         'tr_address'   => $request->address,
        //         'tr_phone'   => $request->phone,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        // ]);
        // if ($transaction) {
        //     $product = Cart::getcontent();
        //     foreach($product as $value){
        //         Order::insert([
        //             'or_transaction_id'=>$transaction,
        //             'or_product_id'=> $value->id,
        //             'or_qty' =>$value->quantity,
        //             'or_price' =>$value->attributes->price_old,
        //             'or_sale' =>$value->attributes->sale,
        //         ]);
        //     }
        // }
        // \Cart::clear();
       
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // ### Itemized information
        // (Optional) Lets you specify item wise
        // information
        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(2);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));

        // ### Additional payment details
        // Use this optional field to set additional
        // payment information such as tax, shipping
        // charges etc.
        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);

        // ### Amount
        // Lets you specify a payment amount.
        // You can also specify additional details
        // such as shipping, tax.
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

       
        //$baseUrl = getBaseUrl();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('create'))
            ->setCancelUrl(route('create'));

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent set to 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));


        // For Sample Purposes Only.
        //$request = clone $payment;

        // ### Create Payment
        // Create a payment by calling the 'create' method
        // passing it a valid apiContext.
        // (See bootstrap.php for more on `ApiContext`)
        // The return object contains the state and the
        // url to which the buyer must be redirected to
        // for payment approval
        try {
            $payment->create($this->apiContext);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            // ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            echo "Faild";
            exit(1);
        }

        // ### Get redirect url
        // The API response provides the url that you must redirect
        // the buyer to. Retrieve the url from the $payment->getApprovalLink()
        // method
        $approvalUrl = $payment->getApprovalLink();

        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
         // ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);
       Session::put('payment_id',$payment->id);
        return redirect()->to( $approvalUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
