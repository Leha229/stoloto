<?php

use Illuminate\Support\Facades\Route;
use App\Models\OneGameModels;
use App\Models\OneGameTimerModels;
use App\Models\TwoGameModels;
use App\Models\ThreeGameModels;
use App\Models\FourGameModels;
use App\Models\FiveGameModels;
use App\Models\SixGameModels;

Route::get('/', function () {
  $fond = strval((intval(OneGameModels::sum('price')) 
          + intval(TwoGameModels::sum('price'))
          + intval(ThreeGameModels::sum('price'))
          + intval(FourGameModels::sum('price'))
          + intval(FiveGameModels::sum('price'))
          + intval(SixGameModels::sum('price')))/2);

  $pre = "";
  $max1 = 6;
  $count = strlen($fond);
  $max1 = intval($max1) - intval($count);
  for ($i = 1; $i<=$max1; $i++)
    $pre = $pre . "0";

  $fond = $pre . $fond;

  return view('home', ['fond' => $fond]);
})->name('home');

Route::get('/reg', function (){
  return view('reg');
})->name('reg');

Route::get('/login', function (){
  return view('login');
})->name('login');

Route::get('/lk', 'LKController@index')->name('lk');

Route::post('/login-submit', 'LoginController@submit')->name('login-submit');
Route::post('/reg-submit', 'RegController@submit')->name('reg-submit');
Route::get('/logout', 'LKController@logout')->name('logout');


//добавление значения билетов пользователей
Route::post('/AddTicketValueOne', 'AddTicketController@onegame')->name('AddTicketValueOne');
Route::post('/AddTicketValueTwo', 'AddTicketController@twogame')->name('AddTicketValueTwo');
Route::post('/AddTicketValueThree', 'AddTicketController@threegame')->name('AddTicketValueThree');
Route::post('/AddTicketValueFour', 'AddTicketController@fourgame')->name('AddTicketValueFour');
Route::post('/AddTicketValueFive', 'AddTicketController@fivegame')->name('AddTicketValueFive');
Route::post('/AddTicketValueSix', 'AddTicketController@sixgame')->name('AddTicketValueSix');

//добавление значения выиграшных билетов
Route::post('/AddWinTicketValueOne', 'AddWinTicketController@onegamewin')->name('AddWinTicketValueOne');
Route::post('/AddWinTicketValueTwo', 'AddWinTicketController@twogamewin')->name('AddWinTicketValueTwo');
Route::post('/AddWinTicketValueThree', 'AddWinTicketController@threegamewin')->name('AddWinTicketValueThree');
Route::post('/AddWinTicketValueFour', 'AddWinTicketController@fourgamewin')->name('AddWinTicketValueFour');
Route::post('/AddWinTicketValueFive', 'AddWinTicketController@fivegamewin')->name('AddWinTicketValueFive');
Route::post('/AddWinTicketValueSix', 'AddWinTicketController@sixgamewin')->name('AddWinTicketValueSix');

//Проверка билетов
Route::post('/ValidTicket', 'ValidTicketController@valid')->name('ValidTicketGame');
Route::post('/WinnerOne', 'AdminController@goWinnerOneGame')->name('WinnerOneGame');
Route::post('/WinnerTwo', 'AdminController@goWinnerTwoGame')->name('WinnerTwoGame');
Route::post('/WinnerThree', 'AdminController@goWinnerThreeGame')->name('WinnerThreeGame');
Route::post('/WinnerFour', 'AdminController@goWinnerFourGame')->name('WinnerFourGame');
Route::post('/WinnerFive', 'AdminController@goWinnerFiveGame')->name('WinnerFiveGame');
Route::post('/WinnerSix', 'AdminController@goWinnerSixGame')->name('WinnerSixGame');

Route::post('/AddTimerOneGame', 'AddTimerController@onegame')->name('TimerOneGame');

Route::get('/refill', 'LKController@refill')->name('refill');

Route::get('/admin', function (){
  return view('admin-panel');
})->name('admin');

Route::get('/ticket', function (){
  return view('ticket_sms');
})->name('ticket');

Route::get('/broadcast', function (){
  return view('broadcast');
})->name('broadcast');

Route::get('/valid', function (){
  return view('valid_ticket');
})->name('valid_ticket');

Route::get('/four-of-twenty', function (){
  $fond = OneGameModels::sum('price');
  $circulation = OneGameModels::max('circulation');
  if (OneGameTimerModels::max('time')) {
    $time = OneGameTimerModels::max('time');
    return view('games.one-game', ['fond' => $fond], ['circulation' => $circulation], ['time' => $time]);
  }
  return view('games.one-game', ['fond' => $fond], ['circulation' => $circulation]);
})->name('one-game');

Route::get('/five-of-threety-six', function (){
  $fond = TwoGameModels::sum('price');
  $circulation = TwoGameModels::max('circulation');
  return view('games.two-game', ['fond' => $fond], ['circulation' => $circulation]);
})->name('two-game');

Route::get('/seven-of-fourty-nine', function (){
  $fond = ThreeGameModels::sum('price');
  $circulation = ThreeGameModels::max('circulation');
  return view('games.three-game', ['fond' => $fond], ['circulation' => $circulation]);
})->name('three-game');

Route::get('/six-of-fourty-five', function (){
  $fond = FourGameModels::sum('price');
  $circulation = FourGameModels::max('circulation');
  return view('games.four-game', ['fond' => $fond], ['circulation' => $circulation]);
})->name('four-game');

Route::get('/twenteen-of-twenty-four', function (){
  $fond = FiveGameModels::sum('price');
  $circulation = FiveGameModels::max('circulation');
  return view('games.five-game', ['fond' => $fond], ['circulation' => $circulation]);
})->name('five-game');

Route::get('/rapido', function (){
  $fond = SixGameModels::sum('price');
  $circulation = SixGameModels::max('circulation');
  return view('games.six-game', ['fond' => $fond], ['circulation' => $circulation]);
})->name('six-game');

Route::get('/speed-game', function (){
  return view('games.speed-game');
})->name('speed-game');

Route::get('/moment-game', function (){
  return view('games.speed-game');
})->name('moment-game');

