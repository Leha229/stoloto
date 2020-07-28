@extends('layouts.head')
@section('content')

</div>
</header>

@if (Session::has('info'))
  <div class="alert alert-success mt-5" role="alert">
    {{   Session::get('info') }}
  </div>
@endif


<section class="section-game" id="main" >
  <div class="section-game__title">
          <h1>Золотая Антилопа 5 из 36</h1>
          <div data-countdown="{{ $time }}" align="center"></div>
  </div>	
  <form action="{{ route('AddTicketValueTwo') }}" method='post'>
    @csrf
        <input type="number" name="valid" value="1" class="form-control valid d-none" id="validTicketNumber">
        <div class="section-game__body">	
          <div class="container">
              <div class="playground">
                  <div class="playground__game">
                      <div class="row justify-content-between">					
                          <div class="col-lg-7 col-sm-12   order-lg-1 order-sm-2">
                              <div class="game">
                                      
                              </div>
                          </div>

                          <div class="col-lg-4 col-sm-12 order-lg-2 order-sm-1">
                              <div class="prize-pool">
                                  <div class="prize-pool__title">Призовой фонд игры</div>
                                      <div class="prize-pool__list">
                                          <div class="prize-pool__item">{{ $fond[0] }}</div>
                                          <div class="prize-pool__item">{{ $fond[1] }}</div>
                                          <div class="prize-pool__item">{{ $fond[2] }}</div>
                                          <div class="prize-pool__item">{{ $fond[3] }}</div>
                                          <div class="prize-pool__item">{{ $fond[4] }}</div>
                                      </div>
                                  </div>

                                  <div class="panel-score">
                                      <p class="panel-score__discription">Стоимость одного билета 40р</p>
                                      {{--<div class="panel-score__quantity">
                                          <span class="panel-score__text">Кол-во тиражей</span><span class="panel-score__quantity-counter"><i></i>3<i></i></span>
                                      </div>--}}
                                      <div class="panel-score__number">
                                          <span class="panel-score__text">Номер тиража:</span><span class="panel-score__number-num">{{ $circulation ?? '1' }}</span>
                                      </div>
                                      <div class="panel-score__ticket">
                                          <span class="panel-score__text">Билетов:</span><span class="panel-score__ticket-num" id="numberTickets">1</span>
                                      </div>
                                      <div class="panel-score__combination">
                                          <span class="panel-score__text">Комбинаций:</span><span class="panel-score__combination-num" id="combinations">0</span>
                                      </div>
                                      <div class="panel-score__itog">
                                          <strong class="panel-score__text">Сумма</strong><strong id="sum" class="panel-score__itog-num">0</strong>
                                      </div>
                                      <div class="panel-score__icons">
                                          <div>   
                                              <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="50px" height="50px" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 60 50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
                                              <defs>
                                              <style type="text/css">
                                              <![CDATA[
                                                  .fil0 {fill:white}
                                              ]]>
                                              </style>
                                              </defs>
                                              <g id="Слой_x0020_1">
                                              <metadata id="CorelCorpID_0Corel-Layer"/>
                                              <g id="_272557192">
                                              <path class="fil0" d="M54 3l-48 0c-3,0 -5,2 -5,5l0 13c0,1 0,1 1,1l51 0c1,0 1,0 1,-1 0,-1 0,-1 -1,-1l-50 0 0 -6 50 0c1,0 1,0 1,-1 0,-1 0,-1 -1,-1l-50 0 0 -4c0,-2 1,-3 3,-3l48 0c2,0 3,1 3,3l0 33c0,2 -1,3 -3,3l-48 0c-2,0 -3,-1 -3,-3l0 -15c0,-1 0,-1 -1,-1 -1,0 -1,0 -1,1l0 15c0,3 2,5 5,5l48 0c3,0 5,-2 5,-5l0 -33c0,-3 -2,-5 -5,-5l0 0zm-44 28l8 0c1,0 1,0 1,-1 0,-1 0,-1 -1,-1l-8 0c-1,0 -1,0 -1,1 0,1 0,1 1,1zm0 6l8 0c1,0 1,0 1,-1 0,-1 0,-1 -1,-1l-8 0c-1,0 -1,0 -1,1 0,1 0,1 1,1l0 0z"/>
                                              </g>
                                              </g>
                                              </svg>

                                          </div>
                                          <div>
                                              <!-- Generated by IcoMoon.io -->
                                              <svg class="icon2" version="1.1" xmlns="http://www.w3.org/2000/svg" width="43" height="32" viewBox="0 0 43 32">
                                                  <path fill="none" stroke-linejoin="miter" stroke-linecap="butt" stroke-miterlimit="10" stroke-width="1" stroke="#fff" d="M7.936 4.865h26.52c1.228 0 2.223 0.995 2.223 2.223v18.087c0 1.228-0.995 2.223-2.223 2.223h-26.52c-1.228 0-2.223-0.995-2.223-2.223v-18.087c0-1.228 0.995-2.223 2.223-2.223z"></path>
                                                  <path d="M14.233 10.81l-0.72 3.73h-0.049l-0.98-3.73h-0.627l-0.917 3.73h-0.050l-0.789-3.73h-0.79l1.141 4.999h0.762l0.931-3.519h0.049l0.959 3.519h0.762l1.143-4.999h-0.825z"></path>
                                                  <path d="M28.893 19.209l-0.8 2.597h-0.042l-0.902-2.596h-0.776l1.353 3.527c-0.169 0.522-0.467 0.902-0.944 0.902v0.577c0.809 0 1.239-0.507 1.592-1.481l1.275-3.525z"></path>
                                                  <path d="M18.285 13.922c0-1.153-0.541-1.721-1.423-1.721-1.057 0-1.6 0.774-1.6 1.846 0 1.115 0.487 1.847 1.671 1.847 0.007 0 0.014 0 0.022 0 0.451 0 0.873-0.121 1.236-0.332l-0.012 0.006v-0.533c-0.387 0.232-0.74 0.365-1.12 0.365-0.725 0-1.071-0.373-1.071-1.22h2.297zM16 13.707c0.077-0.703 0.409-1.035 0.839-1.035 0.381 0 0.74 0.294 0.775 1.035z"></path>
                                                  <path d="M26.151 20.813c0-1.152-0.542-1.721-1.422-1.721-1.059 0-1.6 0.774-1.6 1.846 0 1.115 0.486 1.847 1.667 1.847 0.006 0 0.013 0 0.020 0 0.451 0 0.874-0.121 1.238-0.332l-0.012 0.006v-0.533c-0.386 0.23-0.739 0.365-1.119 0.365-0.725 0-1.073-0.372-1.073-1.22h2.298zM23.867 20.6c0.079-0.704 0.411-1.036 0.841-1.036 0.379 0 0.74 0.295 0.775 1.036z"></path>
                                                  <path d="M30.228 13.457l0.838-0.757 0.757 0.837-0.838 0.757-0.757-0.837z"></path>
                                                  <path d="M28.28 14.389l1.117-1.006 1.006 1.118-1.117 1.006-1.006-1.118z"></path>
                                                  <path d="M32.020 12.937l0.558-0.503 0.503 0.558-0.558 0.503-0.503-0.558z"></path>
                                                  <path d="M28.738 10.003l0.839-0.755 0.755 0.839-0.839 0.755-0.755-0.839z"></path>
                                                  <path d="M31.306 11.269l0.557-0.503 0.504 0.557-0.557 0.503-0.504-0.557z"></path>
                                                  <path d="M27.486 12.453l1.118-1.007 1.006 1.118-1.118 1.007-1.006-1.118z"></path>
                                                  <path d="M26.687 10.548l1.118-1.006 1.006 1.118-1.118 1.006-1.006-1.118z"></path>
                                                  <path d="M29.511 11.689l0.837-0.755 0.757 0.838-0.837 0.755-0.757-0.838z"></path>
                                                  <path d="M30.587 9.611l0.558-0.503 0.503 0.558-0.558 0.503-0.503-0.558z"></path>
                                                  <path d="M30.967 15.151l0.838-0.756 0.756 0.839-0.838 0.756-0.756-0.839z"></path>
                                                  <path d="M30.333 15.346l-1.092 1.007-1.841-2.053 0.513-0.451-1.295-1.449 0.516-0.452-1.311-1.445 2.044-1.84 0.65 0.711 1.097-0.979 0.653 0.671 0.432-0.387q-0.144-0.084-0.291-0.154c-0.603-0.301-1.313-0.477-2.064-0.477-2.596 0-4.701 2.105-4.701 4.701s2.105 4.701 4.701 4.701c0.853 0 1.653-0.227 2.343-0.625l-0.023 0.012c0.236-0.134 0.438-0.27 0.629-0.419l-0.011 0.009z"></path>
                                                  <path d="M20.613 12.2c-0.351 0.012-0.678 0.107-0.963 0.266l0.011-0.006v-2.009l-0.733 0.176v4.92c0.4 0.205 0.871 0.331 1.37 0.345l0.005 0c1.023 0 1.657-0.643 1.657-1.961 0.001-1.126-0.471-1.732-1.345-1.732zM20.302 15.4c-0.015 0.001-0.034 0.001-0.052 0.001-0.215 0-0.419-0.041-0.607-0.117l0.011 0.004v-2.306c0.283-0.155 0.487-0.232 0.768-0.232 0.472 0 0.8 0.289 0.8 1.183-0.003 1.141-0.398 1.467-0.92 1.467z"></path>
                                                  <path d="M21.31 19.090c-0.811 0-1.48 0.333-1.8 0.521v3.087h0.733v-2.791c0.218-0.127 0.579-0.254 0.859-0.254 0.363 0 0.636 0.099 0.636 0.655v2.39h0.733v-2.551c0.001-0.725-0.317-1.056-1.162-1.058z"></path>
                                                  <path d="M13.979 17.701l-1.507 3.94h-0.036l-1.579-3.94h-0.852v4.999h0.634v-3.54h0.063l1.439 3.54h0.451l1.438-3.625h0.063v3.625h0.761v-4.999h-0.874z"></path>
                                                  <path d="M17.235 19.092c-0.93 0-1.607 0.613-1.607 1.846 0 1.205 0.643 1.847 1.607 1.847s1.608-0.643 1.608-1.847c0-1.234-0.677-1.846-1.608-1.846zM17.235 22.292c-0.5 0-0.867-0.386-0.867-1.353 0-0.952 0.4-1.353 0.867-1.353 0.48 0 0.867 0.4 0.867 1.353 0.001 0.965-0.369 1.351-0.867 1.351z"></path>
                                              </svg>
                                          </div>
                                          <div>	
                                              <!-- Generated by IcoMoon.io -->
                                              <svg class="icon2" version="1.1" xmlns="http://www.w3.org/2000/svg" width="43" height="32" viewBox="0 0 43 32">
                                                  <title>Payment-02</title>
                                                  <path fill="none" stroke-linejoin="miter" stroke-linecap="butt" stroke-miterlimit="10" stroke-width="1" stroke="#fff" d="M8.069 4.199h26.52c1.228 0 2.223 0.995 2.223 2.223v18.087c0 1.228-0.995 2.223-2.223 2.223h-26.52c-1.228 0-2.223-0.995-2.223-2.223v-18.087c0-1.228 0.995-2.223 2.223-2.223z"></path>
                                                  <path d="M33.044 10.733c-0.037-0.211-0.215-0.339-0.473-0.341-0.079 0-0.159 0.007-0.236 0-0.152-0.016-0.192 0.035-0.191 0.155 0.007 0.592 0.005 1.184 0 1.775 0 0.309-0.304 0.627-0.667 0.708-1.128 0.248-2.255 0.499-3.384 0.745-0.115 0.026-0.248 0.041-0.383 0.041-0.002 0-0.005 0-0.007 0h0c-0.065-0.004-0.121-0.036-0.158-0.084l-0-0.001c-0.016-0.028 0.033-0.095 0.073-0.129 0.053-0.041 0.114-0.074 0.18-0.097l0.004-0.001c0.207-0.074 0.417-0.141 0.626-0.211 0.838-0.279 1.677-0.553 2.513-0.834 0.377-0.127 0.581-0.379 0.587-0.697 0.019-1.029 0.009-2.057 0.005-3.087 0-0.163-0.085-0.299-0.279-0.369-0.223-0.080-0.42-0.016-0.614 0.076q-1.775 0.846-3.555 1.692c-0.349 0.166-0.543 0.407-0.542 0.75 0.004 0.973 0 1.944 0 2.916-0 0.003-0 0.006-0 0.010 0 0.048 0.007 0.094 0.021 0.138l-0.001-0.003c0.117 0.333 0.42 0.52 0.838 0.52 0.835 0 1.671 0 2.506 0s1.661 0 2.493 0c0.011 0.001 0.025 0.001 0.038 0.001 0.168 0 0.322-0.056 0.446-0.151l-0.002 0.001c0.175-0.141 0.166-0.321 0.166-0.499q0-1.421 0-2.843c0.001-0.018 0.002-0.038 0.002-0.059 0-0.042-0.003-0.084-0.008-0.125l0.001 0.005zM29.577 10.429c0.084-0.218 0.267-0.355 0.547-0.39 0.016-0.003 0.035-0.005 0.055-0.005 0.157 0 0.288 0.112 0.318 0.261l0 0.002c0.040 0.257-0.281 0.556-0.6 0.555-0.266-0.002-0.414-0.185-0.322-0.425z"></path>
                                                  <path d="M13.761 11.247v1.238h-0.927v-1.242h-0.485v3.067h0.499v-1.376h0.915v1.373h0.493v-3.060z"></path>
                                                  <path d="M26.462 19.342c-0.145-0.725-0.697-1.166-1.577-1.239-0.347-0.027-0.7-0.005-1.074-0.005v-1.933h-0.753v5.37c0.557 0 1.095 0.032 1.626-0.009 0.795-0.059 1.4-0.376 1.687-1.025 0.165-0.375 0.169-0.769 0.091-1.16zM25.297 20.156c-0.139 0.593-0.747 0.873-1.48 0.699 0-0.659 0-1.307 0.007-1.957 0-0.043 0.075-0.113 0.129-0.123 0.733-0.156 1.222 0.088 1.349 0.699 0.022 0.099 0.034 0.213 0.034 0.33 0 0.125-0.014 0.246-0.041 0.362l0.002-0.011z"></path>
                                                  <path d="M11.168 9.595h-0.8c-0.012-0-0.027-0.001-0.041-0.001-0.348 0-0.665 0.13-0.905 0.344l0.001-0.001c-0.88 0.779-0.649 2.259 0.522 2.575l-1.195 1.8c0.167 0 0.295-0.009 0.421 0 0.017 0.003 0.036 0.005 0.056 0.005 0.118 0 0.221-0.067 0.271-0.165l0.001-0.002c0.293-0.476 0.605-0.945 0.909-1.417 0.14-0.217 0.157-0.223 0.489-0.159v1.721h0.561v-4.467c0.001-0.233 0-0.233-0.29-0.233zM10.882 12.081c-0.382-0.003-0.78 0.091-1.071-0.195-0.333-0.327-0.428-0.705-0.305-1.119 0.011-0.033 0.027-0.067 0.040-0.096 0.248-0.57 0.575-0.728 1.333-0.633z"></path>
                                                  <path d="M25.041 13.867c-0.832 0.277-1.406 0.027-1.556-0.698-0.028-0.125-0.044-0.268-0.044-0.414 0-0.253 0.048-0.496 0.134-0.719l-0.005 0.013c0.185-0.5 0.553-0.649 1.164-0.483 0.001 0 0.003 0 0.004 0 0.015 0 0.030-0.002 0.044-0.006l-0.001 0 0.192-0.241c-0.505-0.333-1.2-0.252-1.573 0.167-0.291 0.323-0.405 0.697-0.441 1.089-0.042 0.451 0.014 0.888 0.312 1.284 0.312 0.414 0.853 0.608 1.409 0.478 0.393-0.093 0.437-0.133 0.36-0.47z"></path>
                                                  <path d="M12.305 20.903v-4.733h-2.827c-0.039 0.803-0.058 1.593-0.122 2.382-0.053 0.753-0.24 1.449-0.536 2.084l0.015-0.036c-0.103 0.218-0.225 0.361-0.537 0.309-0.021 0.002-0.041 0.008-0.058 0.018l0.001-0v1.737h0.845v-1.147h3.057v1.149h0.82v-1.763zM11.389 20.897h-1.851c0.158-0.395 0.351-0.784 0.467-1.187 0.235-0.812 0.233-1.644 0.239-2.475 0-0.128 0-0.257 0-0.4h1.145c0 1.345 0 2.693 0 4.062z"></path>
                                                  <path d="M19.85 13.908c-0.143 0.041-0.281 0.092-0.425 0.121-0.4 0.081-0.689-0.008-0.842-0.261-0.179-0.297-0.171-0.615-0.16-0.948h1.517c0.033-0.499-0.028-0.966-0.344-1.391-0.277-0.373-0.758-0.433-1.139-0.126-0.14 0.113-0.257 0.249-0.346 0.403l-0.004 0.007c-0.18 0.303-0.287 0.668-0.287 1.057 0 0.091 0.006 0.18 0.017 0.268l-0.001-0.010c0.038 0.309 0.119 0.59 0.238 0.85l-0.007-0.018c0.174 0.39 0.576 0.589 1.041 0.539 0.247-0.031 0.47-0.087 0.682-0.167l-0.020 0.007c0.238-0.081 0.244-0.157 0.081-0.331zM18.675 11.661c0.171-0.212 0.453-0.206 0.604 0.017 0.169 0.247 0.19 0.519 0.183 0.806h-1.057c0.017-0.3 0.074-0.577 0.27-0.823z"></path>
                                                  <path d="M21.641 16.267c-0.033-0.039-0.075-0.099-0.116-0.101-0.249-0.010-0.499-0.006-0.775-0.006v2.207h-1.617v-2.2h-0.861v5.39h0.873v-0.211c0-0.629 0-1.255 0-1.883 0-0.346 0-0.346 0.414-0.346h1.2v2.442h0.874c0.004-0.059 0.010-0.11 0.010-0.159v-5.065c0-0.021 0.011-0.049-0.002-0.067z"></path>
                                                  <path d="M21.729 12.445c0.302-0.348 0.591-0.703 0.885-1.055 0.036-0.043 0.067-0.089 0.118-0.154-0.030 0.002-0.066 0.003-0.102 0.003s-0.071-0.001-0.107-0.003l0.005 0c-0.027-0.006-0.057-0.009-0.088-0.009-0.156 0-0.294 0.080-0.373 0.202l-0.001 0.002c-0.257 0.339-0.544 0.661-0.82 0.99-0.031 0.037-0.070 0.067-0.145 0.142v-1.319h-0.479v2.991h0.486c0-0.355-0.007-0.703 0.005-1.049 0.005-0.119 0.060-0.239 0.091-0.357 0.069 0.040 0.126 0.094 0.168 0.159l0.001 0.002c0.25 0.375 0.497 0.751 0.749 1.124 0.033 0.049 0.089 0.116 0.143 0.123 0.085 0.007 0.184 0.010 0.284 0.010 0.064 0 0.128-0.002 0.192-0.005l-0.009 0c-0.351-0.533-0.679-1.039-1.014-1.542-0.065-0.094-0.070-0.162 0.012-0.255z"></path>
                                                  <path d="M33.594 16.15c-0.141-0.005-0.203 0.035-0.253 0.143-0.339 0.745-0.685 1.486-1.029 2.229-0.151 0.325-0.307 0.649-0.459 0.975l-0.041-0.007v-3.326h-0.873v5.4h0.857q0.817-1.763 1.638-3.55v3.545h0.985v-5.404c-0.285 0-0.551 0.008-0.824-0.004z"></path>
                                                  <path d="M17.077 20.786c-0.267 0.083-0.509 0.177-0.764 0.229-0.827 0.169-1.367-0.059-1.603-0.659-0.182-0.461-0.175-0.937-0.183-1.439h2.699c-0.037-0.418-0.041-0.825-0.117-1.22-0.096-0.494-0.287-0.968-0.681-1.367-0.349-0.352-0.769-0.455-1.293-0.312-0.544 0.147-0.876 0.489-1.099 0.895-0.655 1.189-0.711 2.415-0.209 3.65 0.155 0.401 0.449 0.719 0.822 0.902l0.010 0.004c0.712 0.351 1.867 0.229 2.586-0.277-0.057-0.14-0.115-0.283-0.166-0.407zM14.933 16.963c0.127-0.179 0.297-0.325 0.581-0.312 0.241 0.009 0.447 0.146 0.553 0.346l0.002 0.004c0.247 0.424 0.288 0.879 0.286 1.35h-1.854c0.047-0.499 0.135-0.967 0.433-1.387z"></path>
                                                  <path d="M17.070 13.899v-2.657h-1.603c0 0.2 0.007 0.378 0 0.557-0.027 0.624-0.049 1.249-0.309 1.846-0.067 0.147-0.112 0.305-0.361 0.272v0.965h0.462v-0.627h1.733v0.623h0.437v-0.966zM16.564 13.899h-1.079c0.467-0.724 0.405-1.503 0.439-2.279h0.64z"></path>
                                                  <path d="M27.267 16.162c0 1.807 0 3.6 0 5.395h0.8v-4.853h2.433v-0.543z"></path>
                                              </svg>

                                          </div>
                                          <div>         
                                              <svg class="icon2" version="1.1" xmlns="http://www.w3.org/2000/svg" width="43" height="32" viewBox="0 0 43 32">
                                                  <title>Payment-03</title>
                                                  <path fill="none" stroke-linejoin="miter" stroke-linecap="butt" stroke-miterlimit="10" stroke-width="1" stroke="#fff" d="M7.936 4.732h26.52c1.228 0 2.223 0.995 2.223 2.223v18.087c0 1.228-0.995 2.223-2.223 2.223h-26.52c-1.228 0-2.223-0.995-2.223-2.223v-18.087c0-1.228 0.995-2.223 2.223-2.223z"></path>
                                                  <path d="M23.918 12.91c-0.062-0.311-0.221-0.578-0.443-0.775l-0.001-0.001c-0.077-0.075-0.165-0.14-0.261-0.191l-0.006-0.003c-0.162-0.093-0.356-0.149-0.563-0.149-0.013 0-0.026 0-0.038 0.001l0.002-0c0.092-0.047 0.229-0.049 0.37-0.047 0.119 0.017 0.225 0.043 0.327 0.078l-0.013-0.004c0.084 0.046 0.167 0.092 0.249 0.139 0.203-0.607 0.125-1.437-0.101-1.971-0.212-0.55-0.538-1.015-0.952-1.384l-0.004-0.003c-0.416-0.393-0.941-0.675-1.525-0.796l-0.021-0.004c-0.146-0.030-0.314-0.047-0.486-0.047-0.188 0-0.372 0.020-0.549 0.059l0.017-0.003c-0.301 0.081-0.563 0.211-0.793 0.384l0.006-0.004c-0.207 0.184-0.409 0.375-0.546 0.629-0.039 0.053-0.075 0.114-0.107 0.178l-0.003 0.008c-0.029 0.067-0.061 0.133-0.093 0.2-0.050 0.127-0.095 0.279-0.126 0.435l-0.003 0.018c-0.043 0.188-0.067 0.405-0.067 0.627 0 0.148 0.011 0.293 0.032 0.436l-0.002-0.016c0.044 0.343 0.132 0.653 0.258 0.944l-0.009-0.022c0.067 0.13 0.129 0.267 0.203 0.389 0.083 0.131 0.162 0.243 0.247 0.35l-0.006-0.008c0.183 0.204 0.386 0.384 0.609 0.539l0.011 0.007c0.494 0.339 1.099 0.553 1.751 0.582l0.007 0c0.015-0.031-0.021-0.091-0.028-0.129s-0.015-0.096-0.028-0.139c-0.006-0.047-0.009-0.102-0.009-0.157s0.003-0.11 0.010-0.163l-0.001 0.006c0.029 0.007 0.029 0.045 0.047 0.067s0.021 0.046 0.046 0.055c0.027 0.050 0.055 0.092 0.085 0.132l-0.002-0.003c0.070 0.072 0.124 0.159 0.213 0.213 0.152 0.125 0.326 0.231 0.514 0.31l0.014 0.005c0.183 0.097 0.43 0.133 0.675 0.167s0.485 0.076 0.712 0.133c0.226 0.066 0.423 0.151 0.606 0.256l-0.013-0.007c0.1 0.056 0.184 0.111 0.265 0.171l-0.006-0.004c0.046 0.028 0.085 0.058 0.121 0.093l-0-0c0.049 0.019 0.070 0.067 0.12 0.083 0.147 0.133 0.28 0.276 0.402 0.427l0.006 0.007c0.055 0.077 0.107 0.164 0.152 0.256l0.005 0.011c0.034 0.037 0.044 0.098 0.074 0.139 0 0.053 0.053 0.115 0.009 0.157-0.067 0.010-0.055-0.063-0.083-0.093-0.025-0.032-0.047-0.068-0.065-0.107l-0.001-0.003c-0.109-0.114-0.205-0.239-0.324-0.343-0.11-0.103-0.231-0.197-0.36-0.281l-0.010-0.006c-0.259-0.183-0.562-0.326-0.888-0.412l-0.020-0.004c-0.27-0.077-0.581-0.122-0.901-0.122-0.096 0-0.191 0.004-0.286 0.012l0.012-0.001c-0.203 0.022-0.388 0.065-0.564 0.125l0.018-0.005c-0.154 0.036-0.346 0.069-0.542 0.090l-0.023 0.002c-0.757 0.047-1.6-0.133-2.165-0.407-0.309-0.141-0.575-0.312-0.813-0.516l0.005 0.004c-0.126-0.1-0.238-0.206-0.34-0.321l-0.002-0.003c-0.102-0.112-0.194-0.236-0.272-0.369l-0.006-0.010c-0.099-0.123-0.158-0.287-0.241-0.426-0.055-0.165-0.133-0.307-0.167-0.49-0.054-0.162-0.094-0.351-0.111-0.546l-0.001-0.009c0-0.056-0.028-0.163-0.027-0.25 0-0.008 0.010-0.015 0.009-0.028-0.005-0.079-0.023-0.2 0-0.267 0.002-0.208 0.026-0.409 0.070-0.602l-0.004 0.019c0.038-0.2 0.086-0.374 0.146-0.542l-0.008 0.024c0.055-0.167 0.128-0.316 0.194-0.472 0.045-0.067 0.079-0.144 0.121-0.213s0.088-0.127 0.121-0.204c0.035-0.020 0.041-0.067 0.073-0.092 0.015-0.041 0.053-0.059 0.067-0.102 0.030-0.026 0.054-0.057 0.073-0.091l0.001-0.002c0.030-0.025 0.055-0.056 0.073-0.091l0.001-0.002c0.11-0.109 0.209-0.229 0.323-0.333s0.243-0.2 0.361-0.305c0.075-0.036 0.129-0.093 0.203-0.133 0.057-0.051 0.139-0.077 0.195-0.129 0.154-0.067 0.285-0.159 0.453-0.213 0.132-0.062 0.292-0.122 0.456-0.17l0.025-0.006c0.311-0.089 0.668-0.14 1.037-0.14 0.042 0 0.084 0.001 0.125 0.002l-0.006-0c0.016 0 0.024-0.016 0.028 0 0.737 0.013 1.418 0.243 1.984 0.628l-0.013-0.008c0.513 0.347 0.921 0.812 1.191 1.358l0.009 0.020c0.223 0.457 0.354 0.995 0.354 1.564 0 0.209-0.018 0.414-0.052 0.614l0.003-0.021c-0.070 0.374-0.177 0.707-0.32 1.020l0.011-0.027c-0.081 0.166-0.158 0.303-0.242 0.434l0.011-0.018c-0.040 0.074-0.083 0.137-0.131 0.196l0.002-0.002c-0.018 0.036-0.041 0.066-0.067 0.093l0-0c-0.012 0.017-0.024 0.033-0.038 0.047l0-0c-0.004 0.008-0.008 0.017-0.019 0.019 0.005 0.015-0.006 0.018-0.007 0.008z"></path>
                                                  <path d="M23.623 13.151c-0.109-0.043-0.127-0.175-0.176-0.277-0.006-0.019-0.009-0.042-0.009-0.065s0.003-0.046 0.010-0.067l-0 0.002c0.007 0 0.009-0.009 0.019-0.009 0.027-0.017 0.053 0.005 0.092 0.019 0.052 0.065 0.091 0.142 0.111 0.227l0.001 0.004c0.002 0.073 0.007 0.149-0.046 0.167z"></path>
                                                  <path d="M22.809 12.993c0-0.011 0.009-0.005 0.009 0 0.164 0.021 0.239 0.133 0.25 0.305-0.009 0.087-0.073 0.158-0.156 0.176l-0.001 0c-0.221 0.004-0.347-0.2-0.267-0.407 0.043-0.036 0.074-0.085 0.165-0.074z"></path>
                                                  <path d="M14.845 22.943c0.067 0.256 0.193 0.476 0.361 0.655l-0.001-0.001c0.155 0.183 0.342 0.334 0.553 0.446l0.010 0.005c0.201 0.13 0.432 0.237 0.678 0.31l0.019 0.005c0.117 0.051 0.254 0.091 0.397 0.112l0.009 0.001c0.107 0.059 0.241 0.091 0.249 0.248-0.006 0.189-0.133 0.258-0.293 0.293-0.161-0.034-0.361-0.029-0.497-0.091-0.341-0.041-0.615-0.15-0.901-0.247-0.545-0.214-1.011-0.52-1.401-0.903l0.001 0.001c-0.079-0.133-0.186-0.234-0.27-0.361s-0.14-0.28-0.226-0.405c-0.667-0.089-1.127-0.391-1.533-0.745-0.394-0.433-0.673-0.977-0.786-1.58l-0.003-0.020c-0.142-0.646-0.099-1.451 0.067-2.074 0.369-1.208 1.147-2.009 2.615-2.119 0.388 0.002 0.76 0.068 1.106 0.189l-0.024-0.007c0.341 0.136 0.633 0.326 0.88 0.564l-0.001-0.001c0.017 0.012 0.032 0.027 0.044 0.044l0 0.001c0.051 0.077 0.178 0.179 0.248 0.271 0.013 0.017 0.008 0.047 0.023 0.067 0.027 0.037 0.067 0.055 0.090 0.090 0.015 0.023 0.010 0.047 0.023 0.067s0.041 0.067 0.067 0.113c0.010 0.017 0.038 0.032 0.044 0.045 0.039 0.074 0.056 0.165 0.091 0.248s0.085 0.163 0.113 0.247c0.082 0.253 0.145 0.551 0.178 0.859l0.002 0.020c0.088 0.908-0.092 1.719-0.428 2.322-0.159 0.311-0.369 0.573-0.622 0.786l-0.004 0.003c-0.237 0.238-0.563 0.385-0.878 0.543zM13.763 17.262c-0.197 0.015-0.315 0.107-0.474 0.158-0.105 0.097-0.236 0.169-0.315 0.293-0.133 0.072-0.165 0.24-0.27 0.337-0.091 0.212-0.169 0.461-0.222 0.72l-0.004 0.025c-0.054 0.269-0.086 0.581-0.090 0.899l-0 0.003c-0.005 0.775 0.16 1.547 0.473 2.006 0.182 0.225 0.408 0.407 0.665 0.535l0.012 0.005c0.157 0.015 0.281 0.067 0.451 0.067 0.094-0.034 0.255 0 0.315-0.067 0.139 0.011 0.173-0.083 0.293-0.091 0.063-0.066 0.138-0.119 0.222-0.156l0.004-0.002c0.081-0.092 0.16-0.185 0.248-0.27 0.045-0.067 0.067-0.156 0.133-0.204 0.392-0.749 0.437-2.125 0.18-3-0.089-0.301-0.22-0.563-0.389-0.796l0.005 0.008c-0.166-0.171-0.36-0.314-0.574-0.423l-0.012-0.006c-0.181-0.037-0.35-0.086-0.586-0.067-0.013 0-0.027 0-0.023 0.021z"></path>
                                                  <path d="M18.519 16.631c0.354 0.014 0.766-0.029 1.081 0.023 0.071 0.111 0.043 0.238 0.045 0.36 0.025 1.654 0 3.426 0 5.117 0 0.133 0.003 0.273 0 0.406-0.003 0.113 0.025 0.235-0.045 0.339-0.159 0.039-0.382 0.023-0.586 0.023s-0.423 0.028-0.563-0.046c-0.038-2-0.038-4.155 0-6.153 0.012-0.032 0.036-0.056 0.067-0.068l0.001-0z"></path>
                                                  <path d="M21.225 16.631h1.059c0.095 0.13 0.125 0.326 0.158 0.519 0.318 1.214 0.634 2.431 0.923 3.673 0.067 0.009 0.047-0.073 0.067-0.113 0.031-0.029 0.015-0.107 0.045-0.133 0.013-0.101 0.073-0.153 0.067-0.271 0.080-0.152 0.104-0.362 0.179-0.519 0.093-0.365 0.213-0.705 0.317-1.059 0.099-0.367 0.235-0.697 0.316-1.083 0.149-0.308 0.184-0.733 0.361-1.014h0.449c0.167 0.301 0.223 0.711 0.367 1.034 0.090 0.367 0.219 0.697 0.315 1.059 0.223 0.701 0.452 1.397 0.654 2.119 0.090-0.133 0.091-0.36 0.157-0.519 0.036-0.201 0.082-0.375 0.141-0.543l-0.007 0.025c0.175-0.713 0.338-1.435 0.542-2.119 0.076-0.359 0.149-0.723 0.267-1.036 0.139-0.018 0.299-0.028 0.462-0.028s0.323 0.010 0.481 0.030l-0.019-0.002c0.023 0.267-0.101 0.552-0.179 0.788-0.043 0.29-0.15 0.511-0.204 0.789-0.161 0.508-0.285 1.053-0.451 1.555-0.127 0.541-0.298 1.040-0.429 1.579-0.086 0.25-0.15 0.525-0.225 0.788-0.088 0.243-0.118 0.544-0.249 0.744h-0.63c-0.161-0.283-0.218-0.667-0.361-0.969-0.314-0.995-0.667-1.951-0.969-2.953-0.107 0.111-0.104 0.333-0.18 0.473-0.054 0.205-0.108 0.37-0.17 0.531l0.012-0.035c-0.085 0.344-0.218 0.639-0.293 0.992-0.101 0.255-0.209 0.585-0.299 0.923l-0.016 0.069c-0.133 0.295-0.18 0.676-0.338 0.947-0.167 0.050-0.427 0.009-0.631 0.022-0.159-0.179-0.175-0.503-0.272-0.744-0.075-0.253-0.128-0.533-0.225-0.767-0.12-0.549-0.304-1.034-0.429-1.577-0.163-0.504-0.302-1.035-0.451-1.555-0.081-0.249-0.145-0.517-0.225-0.766-0.038-0.271-0.221-0.515-0.158-0.812 0.019-0.019 0.042-0.034 0.068-0.042l0.001-0z"></path>
                                                  <path d="M30.129 16.631c0.353 0.014 0.765-0.029 1.082 0.023 0.077 0.237 0.045 0.489 0.045 0.743v4.733c0 0.257 0.033 0.507-0.045 0.745-0.181 0.019-0.392 0.030-0.605 0.030-0.104 0-0.208-0.003-0.311-0.008l0.015 0.001c-0.086-0.005-0.191 0.020-0.248-0.046-0.077-0.234-0.045-0.486-0.045-0.744v-4.687c0-0.285-0.027-0.557 0.045-0.745 0.018-0.020 0.041-0.036 0.066-0.044l0.001-0z"></path>
                                              </svg>
                                          </div>
                                      </div>
                                      <div class="panel-score__btns">
                                          <button type="submit" class="btn-orange" style="width: 100%; border: none">Оплата</button>
                                          <a href="#" class="btn-orange-revers mt-3" style="width: 100%">Добавить в корзину</a>
                                      </div>
                                  </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </form>
</section>


{{--<main id="main" class="card mt-5">
  <div class="alert alert-success text-center" style="width:100%;" role="alert">
    <div data-countdown="{{ $time }}"></div>
</div>
<div class="alert alert-warning text-center" role="alert">
        Призовой фонт этой игры <span>{{ $fond ?? '0' }}</span> рублей!
    </div>
  <div class="container">

  </div>
  <div class="two-game">
        <div class="container text-center">
          <div class="row mt-150">
            <p class="head-game" style="color: black">
              <img  class="head-game-img" src="img/5iz.png" width="150px" alt="">
              <h2>Купить билет лотереи «ЗОЛОТАЯ АНТИЛОПА «5 из 36»</h2>
            </p>
          </div>
  
          <form action="{{ route('AddTicketValueTwo') }}" method='post' style="display: flex; justify-content-space-between; width: 100%;">
          @csrf
          <input type="number" name="valid" value="1" class="form-control valid d-none" id="validTicketNumber">
            <div class="container content-4_20">
              <div class="row">
                <div class="col-12 col-md-12 col-lg-8">
                  <div class="game"></div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                  <div class="card panel-score box">
                      <img src="" alt="">
                      <div class="future-draw"></div>
                      <p class="inpt1">Номер тиража: {{ $circulation ?? '1' }}</p>
                      <p class="inpt1">Кол-во тиражей<select name="12" id="12">
                          <option value="1">1</option> 
                          <option value="2">2</option> 
                          <option value="3">3</option>
                      </select></p>
                  
                      <p class="inpt1">Билетов <span id="numberTickets">1</span></p>
                      <p class="inpt1">Комбинаций <span id="combinations">0</span></p>
                      <p class="inpt2">Сумма <strong id="sum">0</strong></p>
                      <button type="submit" class="btn btn-dark">Оплатить</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
  </div>
</main>

@if(Auth::check())
    @if(Auth::user()->isAdmin())
    <div class="content-4_20">
        <form action="{{ route('AddWinTicketValueTwo') }}" method="post" >
        @csrf
            <h1>Добавить выигрышный билет</h1>
            <label>Поле 1</label>
            <input type="number" class="form-control" name="TicketTwoFieldOne" placeholder="Введите номера билетов"><br>
            <label>Поле 2</label>
            <input type="number" class="form-control" name="TicketTwoFieldTwo" placeholder="Введите номера билетов"><br>
            <input type="submit" class="btn btn-dark" value="Добавить">
        </form>
    </div>
    @endif
@endif()

</div>
</header>--}}
@endsection
