<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\OneGameModels;
use App\Models\TwoGameModels;
use App\Models\ThreeGameModels;
use App\Models\FourGameModels;
use App\Models\FiveGameModels;
use App\Models\SixGameModels;
use App\Models\OneGameWinModels;
use App\Models\TwoGameWinModels;
use App\Models\ThreeGameWinModels;
use App\Models\FourGameWinModels;
use App\Models\FiveGameWinModels;
use App\Models\SixGameWinModels;
use App\Models\FondModels;
use Illuminate\Http\Request;
use DB;

class AddTicketController extends Controller
{
    public function onegame(Request $request) {

        $aer = 0;
        for ($i = 1; $i <= $request->input('valid'); $i++) {
            
            $aer++;
            $value1 = '';
            $value2 = '';
            $price = 0;
            $price1 = 0;
            $price2 = 0;

            for ($j = 1; $j <= 20; $j++) {
                $value1 = $value1 . strval($request->input('ticket' . $i . '_fieldOne' . $j));
                $value2 = $value2 . strval($request->input('ticket' . $i . '_fieldTwo' . $j)); 
            }
    
            $arr1 = [];
            $arr2 = [];

            $arr1 = str_split($value1, 2);
            $arr2 = str_split($value2, 2);

            $arr11 = array_diff($arr1, array(" "));
            $arr22 = array_diff($arr2, array(" "));

            
           
            $count = DB::table('onegamewin')->max('circulation');
            
            if (count($arr11) > 3 && count($arr22) > 3 ) {
                if (Auth::check()) {
                    $mas = [0, 0, 0, 0, 1, 5, 15, 35, 70, 126];

                    for ($ii = 1; $ii <= 7; $ii++) {
                        if (count($arr11) == $ii) {
                            $price1 = 100 * $mas[$ii];
                        }
                        if (count($arr22) == $ii) {
                            $price2 = 100 * $mas[$ii];
                        }
                    } 

                    if (count($arr11) == count($arr22)) {
                        $price = ($price1 * ($price1 / 100)) + ($price2 * ($price2 / 100));
                    }
                    else {
                        $price = ($price1 * 2) * ($price2 / 100);
                    }
                    if (Auth::user()->money() >= $price) {
                        OneGameModels::insert(array(
                            'user_id'  => Auth::user()->getId(),
                            'circulation' => $count + 1,
                            'ticketOne' => implode($arr11),
                            'ticketTwo' => implode($arr22),
                            'price' => $price / 2
                        ));

                        $model = User::where('id', '=', Auth::user()->getId())->first();
                    
                        $money = strval(intval(Auth::user()->money()) - intval($price));
                        $model->money = $money;
                        
                        $model->save();
                    } 
                    else {
                        return redirect()->back()->with('info', 'У вас недостаточно средств!');
                    }
                } 
                else {
                    return redirect()->back()->with('info', 'Войдите в аккаунт!');
                }
            }
            else {
                
                return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
            }
        }
        return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
    }

    public function twogame(Request $request) {
        $mon = 0;
        for ($i = 1; $i <= intval($request->input('valid')); $i++) {
            
            $value1 = '';
            $value2 = '';
            $price = 0;
            $price1 = 0;

            for ($j = 1; $j <= 36; $j++) {
                $value1 = $value1 . strval($request->input('ticket' . $i . '_fieldOne' . $j)); 
            }
            for ($jj = 1; $jj <= 4; $jj++) {
                $value2 = $value2 . strval($request->input('ticket' . $i . '_fieldTwo' . $jj));
            }
        

            $arr1 = [];
            $arr2 = [];

            $arr1 = str_split($value1,2);
            $arr2 = str_split($value2,2);

            $arr11 = array_diff($arr1, array(" "));
            $arr22 = array_diff($arr2, array(" "));

            $count = DB::table('twogamewin')->max('circulation');
            
            if (count($arr11) > 4 && count($arr22) > 0) {
                if (Auth::check()) { 

                    $mas = [0, 0, 0, 0, 0, 1, 6, 21, 56, 126, 252, 462];

                    for ($ii = 1; $ii <= 11; $ii++) {
                        if (count($arr11) == $ii) {
                            $price1 = 40 * $mas[$ii];
                        }
                    } 

                    $price = $price1 * count($arr22);

                    if (Auth::user()->money() >= $price) {
                        $mon = $mon + $price;
                        TwoGameModels::insert(array(
                            'user_id'  => Auth::user()->getId(),
                            'circulation' => $count + 1,
                            'ticketOne' => implode($arr11),
                            'ticketTwo' => implode($arr22),
                            'price' => $price / 2
                        ));

                        if (FondModels::count('id') == 0) {
                            FondModels::insert(array(
                                'fond' => $price / 2
                            ));
                        }
                        else {
                            $fondModels = FondModels::where('id', '=', 1)->first();
                            $fondModels->fond = $fondModels->fond + $price / 2;
                            $fondModels->save();
                        }
                    }
                    else {
                        return redirect()->back()->with('info', 'У вас недостаточно средств!');
                    }
                }
                else {
                    return redirect()->back()->with('info', 'Войдите в аккаунт!');
                }
            }
            else {
                return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
            }
        }

        $model = User::where('id', '=', Auth::user()->getId())->first();
                    
        $money = strval(intval(Auth::user()->money()) - intval($mon));
        $model->money = $money;
                        
        $model->save();

        return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
    }


    public function threegame(Request $request) {

        for ($i = 1; $i <= $request->input('valid'); $i++) {
            $value1 = '';
            $price = 0;
            $price1 = 0;

            for ($j = 1; $j <= 49; $j++) {
                $value1 = $value1  . strval($request->input('ticket' . $i . '_fieldOne' . $j)); 
            }

            $arr1 = [];

            $arr1 = str_split($value1,2);

            $arr11 = array_diff($arr1, array(" "));

            $count = DB::table('threegamewin')->max('circulation');
            
            if (count($arr11) > 6 && count($arr11) < 15) {
                if (Auth::check()) {

                    $mas = [0, 0, 0, 0, 0, 0, 0, 1, 8, 36, 120, 330, 792, 1716, 3432, 6435, 11440];

                    for ($ii = 1; $i <= 14; $ii++) {
                        if (count($arr11) == $ii) {
                            $price1 = 25 * $mas[$ii];
                        }
                    } 

                    $price = $price1;

                    if (Auth::user()->money() >= $price) {
                        ThreeGameModels::insert(array(
                            'user_id'  => Auth::user()->getId(),
                            'circulation' => $count + 1,
                            'ticketOne' => implode($arr11),
                            'price' => $price / 2
                        )); 

                        $model = User::where('id', '=', Auth::user()->getId())->first();
                    
                        $money = strval(intval(Auth::user()->money()) - intval($price));
                        $model->money = $money;
                        
                        $model->save();
                    }
                    else {
                        return redirect()->back()->with('info', 'У вас недостаточно средств!');
                    }
                } 
                else {
                    return redirect()->back()->with('info', 'Войдите в аккаунт!'); 
                }
            }
            else {
                return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
            }
        }
        return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
    }


    public function fourgame(Request $request) {

        for ($i = 1; $i <= $request->input('valid'); $i++) {

            $value1 = '';
            $price = 0;
            $price1 = 0;

            for ($j = 1; $j <= 45; $j++) {
                $value1 = $value1 . strval($request->input('ticket' . $i . '_fieldOne' . $j)); 
            }
        
            $arr1 = [];

            $arr1 = str_split($value1,2);

            $arr11 = array_diff($arr1, array(" "));

            $count = DB::table('fourgamewin')->max('circulation');
            
            if (count($arr11) > 5 && count($arr11) < 14) {
                if (Auth::check()) {

                    $mas = [0,0,0,0,0,0,1,7,28,84,210,462,924,1716];

                    for ($ii = 1; $ii <= 14; $ii++) {
                        if (count($arr11) == $ii) {
                            $price1 = 100 * $mas[$ii];
                        }
                    } 

                    $price = $price1;

                    if (Auth::user()->money() >= $price) {
                        FourGameModels::insert(array(
                            'user_id'  => Auth::user()->getId(),
                            'circulation' => $count + 1,
                            'ticketOne' => implode($arr11),
                            'price' => $price / 2
                        ));

                        $model = User::where('id', '=', Auth::user()->getId())->first();
                    
                        $money = strval(intval(Auth::user()->money()) - intval($price));
                        $model->money = $money;
                        
                        $model->save();
                    }
                    else {
                        return redirect()->back()->with('info', 'У вас недостаточно средств!');
                    }
                } else {
                    return redirect()->back()->with('info', 'Войдите в аккаунт!');
                }
            }
            else {
                return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
            }
        }
        return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
    }


    public function fivegame(Request $request) {
        $aer = 0;
        for ($i = 1; $i <= $request->input('valid'); $i++) {
            $aer++;
            $value1 = '';
            $price = 0;
            $price1 = 0;

            for ($j = 1; $j <= 24; $j++) {
                $value1 = $value1 . strval($request->input('ticket' . $i . '_fieldOne' . $j)); 
            }

            $arr1 = [];

            $arr1 = str_split($value1,2);

            $arr11 = array_diff($arr1, array(" "));

            $count = DB::table('fivegamewin')->max('circulation');
            
            if (count($arr11) > 11) {
                if (Auth::check()) {

                    $price = 60 * $request->input('factor');

                    if (Auth::user()->money() >= $price) {
                        FiveGameModels::insert(array(
                            'user_id'  => Auth::user()->getId(),
                            'circulation' => $count + 1,
                            'ticketOne' => implode($arr11),
                            'price' => $price / 2
                        ));

                        $model = User::where('id', '=', Auth::user()->getId())->first();
                    
                        $money = strval(intval(Auth::user()->money()) - intval($price));
                        $model->money = $money;
                        
                        $model->save();
                    }
                    else {
                        return redirect()->back()->with('info', 'У вас недостаточно средств!');
                    }
                } else {
                    return redirect()->back()->with('info', 'Войдите в аккаунт!');
                }
            }
            else {
                return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
            }
        }
        return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
    }

    public function sixgame(Request $request) {

        for ($i = 1; $i <= $request->input('valid'); $i++) {
            $value1 = '';
            $value2 = '';
            $price = 1;

            for ($j = 1; $j <= 20; $j++) {
                $value1 = $value1 . strval($request->input('ticket' . $i . '_fieldOne' . $j)); 
            }
            for ($jj = 1; $jj <= 4; $jj++) {
                $value2 = $value2 . strval($request->input('ticket' . $i . '_fieldTwo' . $jj));
            }
        

            $arr1 = [];
            $arr2 = [];

            $arr1 = str_split($value1,2);
            $arr2 = str_split($value2,2);

            $arr11 = array_diff($arr1, array(" "));
            $arr22 = array_diff($arr2, array(" "));

            $count = DB::table('sixgamewin')->max('circulation');
            
            if (count($arr11) > 7 && count($arr11) < 9 && count($arr22) > 0) {
                if (Auth::check()) {

                    $price = (60 * count($arr22)) * $request->input('factor');

                    if (Auth::user()->money() >= $price) {
                        SixGameModels::insert(array(
                            'user_id'  => Auth::user()->getId(),
                            'circulation' => $count + 1,
                            'ticketOne' => implode($arr11),
                            'ticketTwo' => implode($arr22),
                            'price' => $price / 2
                        ));

                        $model = User::where('id', '=', Auth::user()->getId())->first();
                    
                        $money = strval(intval(Auth::user()->money()) - intval($price));
                        $model->money = $money;
                        
                        $model->save();
                    }
                    else {
                        return redirect()->back()->with('info', 'У вас недостаточно средств!');
                    }
                } else {
                    return redirect()->back()->with('info', 'Войдите в аккаунт!');
                }
            }
            else {
                return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
            }
        }
        return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
    }
    
}


