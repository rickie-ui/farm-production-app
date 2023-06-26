@extends('layouts.index')

@section('content')

 <div class="w-3/4 mx-auto mt-8">
 <div class="flex justify-between items-center">
        <div class="font-semibold shadow-sm p-8 rounded-md bg-gray-100 text-purple-500">Hello, {{auth()->user()->fullName}}! <p class="text-purple-300">Have you reviewed the sales today? Check the reports below  to know more!.</p></div>
        <div>
        
     <ul class="flex justify-between items-center p-8 rounded-md shadow-sm border-b-2">
          <li class="border-r-2 border-gray-300 p-2 pr-10 first-line:text-gray-400 first-line:text-xs first-line:uppercase">
            <a href="javascript:void(0)" class="font-semibold whitespace-nowrap">         
            <span>Farmers(Total) <br><i class="fa fa-users text-purple-500 text-md pr-2"></i> {{ number_format($farmerCount) }}</span>                                                                                                                                                                                                                                     
          </a></li> 

          <li class="border-r-2 border-gray-300 p-2 pr-10 first-line:text-gray-400 first-line:text-xs first-line:uppercase">
            <a href="javascript:void(0)" class="font-semibold whitespace-nowrap">        
           <span>Coffee(Kgs) <br> <i class="fa fa-line-chart text-purple-500 text-md pr-2"></i> {{ number_format( $sum) }}</span>
          </a></li> 
        </ul>
        </div>
    </div>

    {{-- farmer information --}}


       <h4 class="text-xl font-semibold  font-mono">Farmer's Information</h4>


     <table class="display" id="overview">
                  <thead>
                    <tr>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Farmer Name</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Mobile</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Location</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Account Number</th>                  
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Register Date</th>
                     <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                         
                     @foreach($clients as $client) 
                    <tr class="text-gray-500 text-sm font-semibold h-full">
                       <td >
                          {{$client->fullName}}                 
                      </td>

                      <td >
                        {{$client->phone}}
                      </td>

                      <td >
                         {{$client->location}}
                      </td>

                      <td >
                         {{$client->account}}
                      </td>

                      <td >
                          {{date('d M, Y', strtotime($client->created_at))}}
                      </td>

                      <td class="flex items-center space-x-5">

                            <div><a href="/farmer/{{$client->id}}/profile" class="text-teal-500 text-xs hover:opacity-70">
                                  <i class="fa fa-edit" title="Edit"></i> Edit
                            </a></div>

        

                           <form method="POST" action="/farmer/{{$client->id}}/manage" class="text-red-500 text-xs hover:opacity-70">
                                @csrf
                                @method("DELETE")
                                <button type="submit"><i class="fa fa-trash"title="delete"></i> Delete</button>
                            </form>

                      </td>
                    </tr>
                    @endforeach


                          
                    
                  </tbody>
                </table> 

                {{-- Total coffee production --}}

    <h4 class="text-xl font-semibold my-6 font-mono">Total Coffee Production</h4>


     <table class="display" id="produce">
                  <thead>
                    <tr>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Farmer Name</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Account Number</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Amount(Kgs)</th>
                      <th class="uppercase text-stone-400 text-xs font-semibold opacity-70">Date(Sale)</th>                  
                    </tr>
                  </thead>
                  <tbody>
                      
                      @foreach($farmers as $farmer) 
                    <tr>
                       <td>
                        <p class="text-gray-500 font-semibold text-sm">{{$farmer->fullName}}</p>                   
                      </td>

                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$farmer->account}}</p>
                      </td>

                      <td>
                         <p class="text-gray-500 text-sm font-semibold mb-0">{{$farmer->quantity ?? 'N/A'}}</p>
                      </td>
                      

                      <td>
                          <span class="text-gray-500 text-sm font-semibold">
                          {{date('d M, Y h:i A', strtotime($farmer->created_at))}}
                          </span>
                      </td>

                    </tr>
                    @endforeach
                
                  </tbody>
                </table>

              <div class="h-4"></div>


 </div>


@endsection