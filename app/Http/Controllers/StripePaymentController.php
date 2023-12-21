<?php
 
namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
use Validator;
use Stripe;
 
class StripePaymentController extends Controller
{
    public function paymentStripe(){
        return view('stripe');
    }
 
   public function add_money(Request $request)
{
    try {
        $input = $request->all();

        $charge = \Stripe\Charge::create([
            'source' => $input['stripeToken'],
            'description' => "10 cucumbers from Roger's Farm",
            'amount' => $input['totalPrice'],
            'currency' => 'usd',
            'application_fee_amount' => 200,
        ], [
            'stripe_account' => '{{CONNECTED_STRIPE_ACCOUNT_ID}}',
        ]);

        // Handle success, e.g., redirect to a success page
        return redirect()->route('success');

    } catch (\Exception $e) {
        // Log the error and handle it appropriately
        Log::error('Stripe API Error: ' . $e->getMessage());

        // Redirect to an error page or show an error message
        return redirect()->route('error');
    }
}

}