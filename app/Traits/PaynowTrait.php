<?php
    namespace App\Traits;

    use Illuminate\Http\Request;

    trait PaynowTrait 
    {

        /**
         * @param Request $request
         * @return $this|false|string         
         * Initiates Paynow Payments
         */
        public function intiate($amount, $fullname, $email, $purpose)
        {         
            $resulturl = env('APP_URL') .'/api/payments/';
            $status = 'Message';
            $user = Auth::user();
            $payment = new Transaction;        
            $payment->reference = $this->generateMerchanttrace();
            $payment->email = $email;
            $payment->amount = $amount;
            $payment->fullname = $fullname;
            $payment->merchanttrace = $this->generateMerchanttrace();
            $payment->save();
            $hash = hash('sha512', env('PAYNOW_APP_ID'). $payment->reference . $fullname . $amount .  env('APP_URL') . $resulturl . $email . $payment->merchanttrace. $status . env('PAYNOW_APP_KEY'));

            $response = Http::asForm()->post(env('PAYNOW_APP_URL'), [
                'id' => env('PAYNOW_APP_ID'),
                'reference' => $payment->reference,
                'name' => $fullname,
                'amount' => $amount,
                'returnurl' => env('APP_URL'),
                'resulturl' => $resulturl,
                'authemail' => $email,
                'merchanttrace' => $payment->merchanttrace,
                'status'  => $status,
                'hash' => strtoupper($hash)
            ]);
            
            $this->respons($response->getBody()->getContents());       
        }

        public function respons($response) {
        
            $parts = explode('&', $response);
            foreach($parts as &$value) {
                $value = explode('=', $value);
            }
            if($parts[0][1] == "Ok") {
                $status = $parts[0][1];
                $browserurl = urldecode($parts[1][1]);
                $pollurl = urldecode($parts[2][1]);
                $hash = $parts[3][1];
                $vHash = hash('sha512', $status . $browserurl . $pollurl . env('PAYNOW_APP_KEY'));
                if(strtoupper($vHash) == $hash) {
                return redirect()->away($browserurl)->send();
                } else {dd('Try ');}
            } else {dd("NO!!");}   
        }

        public function generateMerchanttrace() {
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $number = substr(str_shuffle(str_repeat($pool, 5)), 0, 6);

            // call the same function if the merchanttrace exists already
            if ($this->merchanttraceExists($number)) {
                return $this->generateMerchanttrace();
            }
            // otherwise, it's valid and can be used
            return $number;
        }

        public function merchanttraceExists($number) {
            // query the database and return a boolean
            return Payment::where('merchanttrace', $number)->exists();
        }

        public function init_response(Request $request)
        {
            dd($request);
        }


            // public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) {
        
            //     if( $request->hasFile( $fieldname ) ) {
        
            //         if (!$request->file($fieldname)->isValid()) {
        
            //             flash('Invalid Image!')->error()->important();
        
            //             return redirect()->back()->withInput();
        
            //         }
        
            //         return $request->file($fieldname)->store($directory, 'public');
        
            //     }
        
            //     return null;
        
            // }
    
    }
