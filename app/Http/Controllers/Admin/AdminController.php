<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Booking;
use App\Models\CustomerGuest;
use App\Models\Listing;
use App\Models\Property;
use App\Models\PropKey;
use App\Models\TestApi;
use App\Models\Token;
use App\Models\TokenPropkey;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    use PasswordValidationRules;
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
          if(Auth::user()->role_id == 1)
          {
            $has_api_key = false;
            $has_token = false;
            $isUpToDate = false;

            $now = Carbon::now('Europe/Paris');
            $id = Auth::user()->id;
            $user = User::where('id',$id)->first();
            $lastCall = $user->lastcall;
            $token = Token::with('user')->where('user_id',$id)->first();
            if($lastCall == null)
            {
                
                $user->lastcall = $now;
                $user->save();
            }
            $diff = Carbon::parse($now)->diffInMinutes($lastCall);

            // if(is_null($token->apikey) || empty($token->apikey) || $token->apikey === '' && $isUpToDate == false)
            // {
            //     $has_api_key = false;
       
            // }else
            // {
            //     if(Property::count() <= 0 )
            //     {
            //         $this->getProperties();
            //         $has_api_key = true;
            //         $isUpToDate = true;
            //     }else{
                   
            //         $has_api_key = true;
            //         $isUpToDate = true;
            //     }
            //$this->SetUser();
                
            // }
            //$this->getProperties();
            //$this->SetPropertyKey();
            //$this->getBookings();
            //$this->testApiKey();
            //$propkeys = PropKey::where('id',7)->first();
            // DB::table('token_propertieskey')->truncate();
            // DB::table('testapi')->truncate();

   
            //$this->testPropKey($propkeys->id);
           // $id = DB::table('testapi')->where('id',1)->first();
            
            // if(is_null($token->token) || empty($token->token) || $token->token === '')
            // {
            //     $has_token = false;
            // }else
            // {
            //     if(Booking::count() <= 0 )
            //     {
            //         $this->getBookings();
            //         $has_token = true;
            //     }else
            //     {
            //         $has_token = true;
            //     }

                
            // }
            
            $bookings = Booking::with('property')->get();
            // $messages = Message::orderBy('time', 'desc')->where('user_id',$id)->get();
            
            // $messages_count = count($messages);
            // $unread = count($messages->where('read',false));
            // $messages = Message::orderBy('time', 'desc')
            // ->where('user_id',$id)
            // ->limit(10)
            // ->get();
            
            return view('admin.dashboard',compact('diff','token','bookings'));

          }
          else if(Auth::user()->role_id == 2)
          {
              return view('staf.dashboard');
          }else
          {
             return view('dashboard');
          }

          
    }


    public function resetAll()
    {
        $now = Carbon::now('Europe/Paris');
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        $this->getProperties();
        $this->getBookings();
        $this->getMessages();
        return redirect()->back()->with('success','you are up to date');
    }

    public function showProperties()
    {
        $id = Auth::user()->id;
        $properties = Property::where('user_id',$id)->get();
        $propkeys = PropKey::with('properties')->get();
        return view('admin.properties.list',compact('properties','propkeys'));
    }



    public function adminlist()
    {
        $admin = DB::table('users')->
            where('role_id','=','1')
            ->get();
  
        if(Auth::user()->role_id == 1)
        {

            return view('admin.adminlist',compact('admin'));

        }
        else
        {
           return abort(404);
        }
    }

    public function staflist()
    {
        $staf = DB::table('users')->
            where('role_id','=','2')
            ->get();
  
        if(Auth::user()->role_id == 1)
        {

            return view('admin.staflist',compact('staf'));

        }
        else
        {
           return abort(404);
        }
    }

    public function customerlist()
    {
        $customer = DB::table('users')->
            where('role_id','=','1')
            ->get();
  
        if(Auth::user()->role_id == 1)
        {

            return view('admin.customerlist',compact('customer'));

        }
        else
        {
           return abort(404);
        }
    }


    public function SetUser()
    {
        $customers = new CustomerGuest();
        $customers->setConnection('mysql2');
        $customers = CustomerGuest::where('id_user',6)->get();

        foreach ($customers as $customer => $value)
        {
            User::create([
                'name' => $value->name,
                'email' => $value->email,
                'password' => Hash::make(!empty($value->mdp) ? $value->mdp : '123456' ),
                'role_id' => 1,
                'lastcall'=> null,
                'can_refresh_token'=> 0,
                'user_id' => 6
            ]);

        }


    }

    public function sendmessages(Request $request)
    {
        $message = strip_tags($request->message);
        dd($message);
    }





    public function create()
    {

         return view('admin.action.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $role_id = '1';
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role_id' => ['required','exists:App\Models\Role,id'],
            'apikey' => ['required','unique:tokens']
            
        ])->validate();

        $admin = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $role_id,
            'lastcall'=> null,
            'can_refresh_token'=> 0
        ]);
        
        $token = Token::create([
            'user_id' => $admin->id,
            'token' => '',
            'apikey'=> $request->apikey,
        ]);

        $request->session()->flash('success', 'L\'admin a été créé avec succès');
        return redirect()->to('admin/list');
    }

    public function show()
    {
        return view('profile.show');
    }

    public function showTokenManger()
    {
        $id = Auth::user()->id;
        $token = Token::with('user')->where('user_id',$id)->first();
        return view('admin.token.token',compact('token'));
    }

    public function storetoken(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        $apikey = $request->apikey;
         DB::table('tokens')->insert([
                'user_id'=> $id,
                'apikey' => $apikey

            ]);
        
        Session::flash('success', 'le token as bien été créer');
        $user->can_refresh_token = 0;
        $user->save();
        return redirect()->back();
    }

    public function changestatus(Request $request)
    {
        if($request->ajax())
        {

            // $status = $request->input('status');
            // $order = Order::find($request->id);
            // $order->status = $status;
        
            // if($order)
            // {
            //     $order->save();
            //     return response()->json(['success'=>'status updater']);
            // }else{
            //     return response()->json(['error'=>'status non updater, pas de order']);
            // }
            
        }
    }

    public function testApiKey()
    {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        //$apikey = $request->apikey;
        $customers = new CustomerGuest();
        $customers->setConnection('mysql2');
        $customers = CustomerGuest::where('id_user',6)->get();
        foreach ($customers as $customer => $value) 
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.beds24.com/json/getProperties',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "authentication": {
                    "apiKey": "'.$value->beds24_api_key.'"
                }
                }',
                CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
                ),
            ));
            if(curl_exec($curl) === false) 
            {
                echo("api key is not valid" . 'apikey ='.$value->beds24_api_key.'<br/>');
               
               curl_close($curl);
               continue;
            }else
            {
                DB::table('tokens')->upsert([
                    'user_id'=> $id,
                    'apikey' => $value->beds24_api_key

                ],
                ['apikey']);
                curl_close($curl);
               continue;
            }
            
        }

    }

    public function testPropKey($id)
    {


        $propkeys = PropKey::where('id',$id)->first();
        $tokens = Token::all();
          
        //DB::statement('SET FOREIGN_KEY_CHECKS=0');
       

        foreach ($tokens as $token => $value) {
          
            $curl = curl_init();
            // connexion api
            // check each apikey with each propkey
            // if conexion good set table with this apikey and this propkey
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.beds24.com/json/getBookings',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                    "authentication": {
                        "apiKey": "'.$value->apikey.'",
                        "propKey": "'.$propkeys->propkey.'"
                    },
                        "includeInfoItems": true,
                        "includeInfoItemsConverted": true
                }',

                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = json_decode(curl_exec($curl),true);
            $response = (object)$response;

            if(isset($response->error))
            {
                //$error = $response->error;
                curl_close($curl);
               
            }else
            {
                
                DB::table('token_propertieskey')->insert([
                    'token_id' => $value->id,
                    'propkey_id'=> $propkeys->id,
                ]);
            }


                curl_close($curl);
        }
       


    }

    public function getMessages()
    {
        $now = Carbon::now('Europe/Paris');
        $id = Auth::user()->id;
        $user = User::where('user_id',6)->get();
        $token = Token::where('user_id',$id)->first();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('messages')->truncate();
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://beds24.com/api/v2/bookings/messages?maxAge=20',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'token:'.$token->token.''
        ),
        ));

        $messages = json_decode(curl_exec($curl),true);
        $messages = (object)$messages;
        $message_count = $messages->count;
        $messagesObj = $messages->data;
        foreach ($messagesObj as $message => $data) {
            
            DB::table('messages')->insert([
                'user_id'=> $user->id,
                'message_id'=> $data['id'],
                'booking_id' => $data['bookingId'],
                'room_id' => $data['roomId'],
                'property_id' => $data['propertyId'],
                'time' => Carbon::parse($data['time'])->format('Y-m-d h:m:s'),
                'read' => $data['read'],
                'message' => $data['message'],
                'source' => $data['source'],
            ]);
        }
        curl_close($curl);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $user->lastcall = $now;
        $user->save();

    }

    public function getProperties()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('properties')->truncate();
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        $tokens = Token::where('user_id',$id)->get();

        foreach ($tokens as $token => $value) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.beds24.com/json/getProperties',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "authentication": {
                    "apiKey": "'.$value->apikey.'"
                }
                }',
                CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
                ),
            ));
            $properties = json_decode(curl_exec($curl),true);
             $properties = (object)$properties;
            
            
            if(isset($properties->error))
            {
                
                curl_close($curl);
               
            }else{
               
               if(isset($properties->getProperties)){
                    $propertiesObj = $properties->getProperties;
               }else{
                curl_close($curl);
               }
                 
                
                
                foreach ($propertiesObj as $property => $data) {
         
                    DB::table('properties')->insert([
                        'user_id' => $id,
                        'name' => $data['name'],
                        'propId' => $data['propId'],
                        'propTypeId' => 1,
                        'ownerId' => $data['ownerId'],
                        'currency' => $data['currency'],
                        'address' => $data['address'],
                        'city' => $data['city'],
                        'state' => $data['state'],
                        'country' => $data['country'],
                        'postcode' => $data['postcode'],
                        'latitude' => $data['latitude'],
                        'longitude' => $data['longitude'],
                        'room_name' => $data['roomTypes'][0]['name'],
                        'qty' => $data['roomTypes'][0]['qty'],
                        'roomId' => $data['roomTypes'][0]['roomId'],
                        'minPrice' => $data['roomTypes'][0]['minPrice'],
                        'maxPeople' => $data['roomTypes'][0]['maxPeople'],
                        'maxAdult' => $data['roomTypes'][0]['maxAdult'],
                        'maxChildren' => $data['roomTypes'][0]['maxChildren'],
                        'unitAllocationPerGuest' => $data['roomTypes'][0]['unitAllocationPerGuest'],
                        'unitNames' => ''
                    ]);
                }
                 
              curl_close($curl);
        }
    }


    }


    public function SetPropertyKey()
    {
        $listing = new Listing();
        $listing->setConnection('mysql2');

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('properties_key')->truncate();
        
        $listings = Listing::where('id_user',6)->where('beds24_api_ok','O')->get();

        foreach ($listings as $listing => $value) {
           
           
                DB::table('properties_key')->insert([
                'prop_name' => $value->nom,
                'user_id'=> Auth::user()->id,
                'propkey'=>$value->beds24_api_key
                ]);
            
  
            
        }
    }

    public function getBookings()
    {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        $today = Carbon::now('Europe/Paris')->format('Y-m-d');
        $yesterday = Carbon::yesterday('Europe/Paris')->format('Y-m-d');
        $booking_types = ['confirmed', 'request', 'new','cancelled','black','inquiry'];
        $now = Carbon::now('Europe/Paris')->format('Y-m-d');
        $tokens_propkeys = TokenPropkey::where('user_id',$id)->get();

       DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('bookings')->truncate();
        foreach ($tokens_propkeys as $bookingkey => $value) {
            $propkey = PropKey::where('id',$value->propkey_id)->first();
            $tokenkey = Token::where('id',$value->token_id)->first();
            
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.beds24.com/json/getBookings',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                    "authentication": {
                        "apiKey": "'.$tokenkey->apikey.'",
                        "propKey": "'.$propkey->propkey.'"
                    },
                    "includeInfoItems": true,
                    "includeInfoItemsConverted": true,
                   "arrivalFrom": "'.$yesterday.'"

                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                ));

                    $bookings = json_decode(curl_exec($curl),true);
                    
                    // store bookings daily
                    $bookings = (object)$bookings;
                    if(!empty($bookings))
                    {
                        foreach ($bookings as $booking => $data) {
                            if(!empty($data['bookId']))
                            {
                                DB::table('bookings')->insert([
                                    'booking_id' => !empty($data['bookId']) ? $data['bookId'] : null,
                                    'masterId' => !empty($data['masterId']) ? $data['masterId'] : null,
                                    'property_id' => !empty($data['propId']) ? $data['propId'] : null,
                                    'room_id' => !empty($data['roomId']) ? $data['roomId'] : null,
                                    'unit_id' =>!empty($data['unitId']) ? $data['unitId'] : null,
                                    'roomQty' =>!empty($data['roomQty']) ? $data['roomQty'] : null,
                                    'offer_id' =>!empty($data['offerId']) ? $data['offerId'] : null,
                                    'status' =>!empty($data['status']) ? $data['status'] : null,
                                    'arrival' =>!empty($data['firstNight']) ? $data['firstNight'] : null,
                                    'departure' =>!empty($data['lastNight']) ? $data['lastNight'] : null,
                                    'numAdult' =>!empty($data['numAdult']) ? $data['numAdult'] : null,
                                    'numChild' =>!empty($data['numChild']) ? $data['numChild'] : null,
                                    'title' =>!empty($data['guestTitle']) ? $data['guestTitle'] : null,
                                    'firstname' =>!empty($data['guestFirstName']) ? $data['guestFirstName'] : null,
                                    'lastname' =>!empty($data['guestName']) ? $data['guestName'] : null,
                                    'email' =>!empty($data['guestEmail']) ? $data['guestEmail'] : null,
                                    'phone' =>!empty($data['guestPhone']) ? $data['guestPhone'] : null,
                                    'address' =>!empty($data['guestAddress']) ? $data['guestAddress'] : null,
                                    'city' =>!empty($data['guestCity']) ? $data['guestCity'] : null,
                                    'state' =>!empty($data['guestState']) ? $data['guestState'] : null,
                                    'postcode' =>!empty($data['guestPostcode']) ? $data['guestPostcode'] : null,
                                    'country' =>!empty($data['guestCountry']) ? $data['guestCountry'] : null,
                                    'comments' =>!empty($data['guestComments']) ? $data['guestComments'] : null,
                                    'notes' =>!empty($data['notes']) ? $data['notes'] : null,
                                    'messages' =>!empty($data['message']) ? $data['message'] : null,
                                    'statusCode' =>!empty($data['statusCode']) ? $data['statusCode'] : null,
                                    'lang' =>!empty($data['lang']) ? $data['lang'] : null,
                                    'referer' =>!empty($data['referer']) ? $data['referer'] : null,
                                    'apiSourceId' =>null,
                                    'apiSource' =>!empty($data['apiSource']) ? $data['apiSource'] : null,
                                    'apiReference' =>!empty($data['apiReference']) ? $data['apiReference'] : null,
                                    'price'=> !empty($data['price']) ? $data['price'] : null
                                ]);
                            }

                        }
                    }
            }

        $user->lastcall = $now;
        $user->save();
        curl_close($curl);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
    
    }

    public function getBookingsInvoices()
    {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        $today = Carbon::now('Europe/Paris')->format('Y-m-d');
        $token = Token::where('user_id',$id)->first();
        $now = Carbon::now('Europe/Paris');
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('bookings')->truncate();
        $curl = curl_init();
         curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://beds24.com/api/v2/bookings/invoices',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'token:'.$token->token.''
            ),
            ));

            $invoices = json_decode(curl_exec($curl),true);
  
            $invoices = (object)$invoices;
            //$bookingsObj = $bookings->data;
            dd($invoices);
    }


}
