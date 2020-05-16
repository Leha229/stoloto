<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\OneGameModels;
use App\Models\TwoGameModels;
use App\Models\ThreeGameModels;
use App\Models\FourGameModels;
use Illuminate\Http\Request;

class AddTicketController extends Controller
{
    public function onegame(Request $request) {

        $value1 = '';
        $value2 = '';

        for ($i = 1; $i <= 1; $i++) {
            for ($j = 1; $j <= 20; $j++) {
                $value1 = $value1 . ' ' . strval($request->input('ticket' . $i . '_fieldOne' . $j));
                $value2 = $value2 . ' ' . strval($request->input('ticket' . $i . '_fieldTwo' . $j)); 
            }
        }

        $arr1 = [];
        $arr2 = [];

        $arr1 = str_split($value1);
        $arr2 = str_split($value2);

        $arr11 = array_diff($arr1, array(" "));
        $arr22 = array_diff($arr2, array(" "));
        
        if (count($arr11) > 3 && count($arr22) > 3) {
            if (Auth::check()) {
                OneGameModels::insert(array(
                    'user_id'  => Auth::user()->getId(),
                    'circulation' => 1,
                    'ticketOne' => implode($arr11),
                    'ticketTwo' => implode($arr22)
                ));
                return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
            }
            return redirect()->back()->with('info', 'Войдите в аккаунт!');
        }
        else {
            return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
        }
    }

    public function twogame(Request $request) {

        $value1 = '';
        $value2 = '';

        for ($i = 1; $i <= 1; $i++) {
            for ($j = 1; $j <= 36; $j++) {
                $value1 = $value1 . ' ' . strval($request->input('ticket' . $i . '_fieldOne' . $j)); 
            }
            for ($jj = 1; $jj <= 4; $jj++) {
                $value2 = $value2 . ' ' . strval($request->input('ticket' . $i . '_fieldTwo' . $jj));
            }
        }

        $arr1 = [];
        $arr2 = [];

        $arr1 = str_split($value1);
        $arr2 = str_split($value2);

        $arr11 = array_diff($arr1, array(" "));
        $arr22 = array_diff($arr2, array(" "));
        
        if (count($arr11) > 4 && count($arr22) > 0) {
            if (Auth::check()) {
                TwoGameModels::insert(array(
                    'user_id'  => Auth::user()->getId(),
                    'circulation' => 1,
                    'ticketOne' => implode($arr11),
                    'ticketTwo' => implode($arr22)
                ));
                return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
            }
            return redirect()->back()->with('info', 'Войдите в аккаунт!');
        }
        else {
            return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
        }
    }

    public function threegame(Request $request) {

        $value1 = '';

        for ($i = 1; $i <= 1; $i++) {
            for ($j = 1; $j <= 49; $j++) {
                $value1 = $value1 . ' ' . strval($request->input('ticket' . $i . '_fieldOne' . $j)); 
            }
        }

        $arr1 = [];

        $arr1 = str_split($value1);

        $arr11 = array_diff($arr1, array(" "));
        
        if (count($arr11) > 6 && count($arr11) < 15) {
            if (Auth::check()) {
                ThreeGameModels::insert(array(
                    'user_id'  => Auth::user()->getId(),
                    'circulation' => 1,
                    'ticketOne' => implode($arr11)
                ));
                return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
            }
            return redirect()->back()->with('info', 'Войдите в аккаунт!');
        }
        else {
            return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
        }
    }


    public function fourgame(Request $request) {

        $value1 = '';

        for ($i = 1; $i <= 1; $i++) {
            for ($j = 1; $j <= 45; $j++) {
                $value1 = $value1 . ' ' . strval($request->input('ticket' . $i . '_fieldOne' . $j)); 
            }
        }

        $arr1 = [];

        $arr1 = str_split($value1);

        $arr11 = array_diff($arr1, array(" "));
        
        if (count($arr11) > 5 && count($arr11) < 14) {
            if (Auth::check()) {
                FourGameModels::insert(array(
                    'user_id'  => Auth::user()->getId(),
                    'circulation' => 1,
                    'ticketOne' => implode($arr11)
                ));
                return redirect()->back()->with('info', 'Вы успешно отправили билет, ждите розыгрыша!');
            }
            return redirect()->back()->with('info', 'Войдите в аккаунт!');
        }
        else {
            return redirect()->back()->with('info', 'Вы не выбрали номера билетов!');
        }
    }


}
