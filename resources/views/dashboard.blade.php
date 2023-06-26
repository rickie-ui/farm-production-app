@extends('layouts.index')

@section('content')
 <div class="w-3/4 mx-auto mt-8">
    <div class="flex justify-between items-center">
        <div class="font-semibold">Hi, Welcome back! <p class="text-gray-300">Your performance summary this week</p></div>
        <div>
        
     <ul class="flex justify-between items-center">
          <li class="border-r-2 border-gray-300 p-2 pr-10 first-line:text-gray-400 first-line:text-xs first-line:uppercase">
            <a href="javascript:void(0)" class="font-semibold">         
            <span>Start date <br> {{date('d/m/Y', strtotime(auth()->user()->created_at))}}</span>
          </a></li> 

          <li class="border-r-2 border-gray-300 p-2 pr-10 first-line:text-gray-400 first-line:text-xs first-line:uppercase">
            <a href="javascript:void(0)" class="font-semibold">        
           <span>Update date <br> {{date('d/m/Y', strtotime(auth()->user()->updated_at))}}</span>
          </a></li> 

          <li class="border-r-2 border-gray-300 p-2 pr-4 whitespace-nowrap first-line:text-gray-400 first-line:text-xs first-line:uppercase ">
            <a href="javascript:void(0)" class=" font-semibold">
            <span>Overview <br> All categories</span>
          </a></li>
        </ul>
        </div>

    </div>

    <h4 class="text-2xl font-semibold my-10 font-mono">Overview Dashboard</h4>



     <table class="display" id="overview">
                  <thead>
                    <tr>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Farmer Name</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Mobile</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Location</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Coffee Breed</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Account Number</th>                  
                    </tr>
                  </thead>
                  <tbody>

                     @foreach($farmers as $farmer)                          
                    <tr>
                       <td>
                        <a href="#" class="text-gray-500 font-semibold text-sm">{{$farmer->fullName}}</a>                   
                      </td>
                      <td>
                        <p class="text-gray-500 text-sm font-semibold mb-0">{{"+254". $farmer->phone}}</p>
                      </td>

                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$farmer->location}}</p>
                      </td>
                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$farmer->coffee}}</p>
                      </td>
                     
                      <td>
                        <p class="text-gray-500 text-sm font-semibold mb-0">{{$farmer->account}}</p>
                      </td>

                    </tr>

                    @endforeach
                          
                    
                  </tbody>
                </table> 

                
    
 </div>
@endsection