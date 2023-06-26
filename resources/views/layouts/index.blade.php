<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- JQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      {{-- Data tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    {{-- custom js --}}
    <script src="{{asset('custom.js')}}"></script>
    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      @vite('resources/css/app.css')
    <title>Index</title>

</head>
<body>

  {{-- Navigation --}}

  <nav class="flex justify-around items-center shadow-md h-12">
       <div class="text-3xl font-semibold text-purple-600 font-mono">StarFarm</div>
       <div>
        <ul class="flex justify-between items-center">
          <li><a href="{{route('dashboard')}}" class="px-4 font-semibold  hover:text-purple-500  focus:text-purple-500  p-2  {{ (request()->is('/')) ? 'text-purple-500 border-b-2 border-purple-500' : '' }}">
            <i class="fa fa-line-chart px-1"></i>
            Dashboard
          </a></li>       
          <li><a href="{{route('report')}}" class="px-4 font-semibold hover:text-purple-500 focus:text-purple-500  p-2  {{ (request()->segment(2) == 'report') ? 'text-purple-500 border-b-2 border-purple-500' : '' }}">
            <i class="fa fa-file-text-o px-1"></i>
            Report
          </a></li> 

          <li onclick="showMenu()" ondblclick="hideMenu()">
                <a href="javascript:void(0)" class="px-4 font-semibold hover:text-purple-500  focus:text-purple-500  p-2  {{ (request()->segment(2) == 'farmer') ? 'text-purple-500 border-b-2 border-purple-500' : '' }}">
                   Management
                    <i class="fa fa-caret-down px-1"></i>
                </a>

                <div  class="hidden absolute bg-gray-200 shadow-md z-10  mt-3 ml-4" id="menu">
                         <a href="{{route('manage')}}" class="block px-6 py-1 font-semibold transition duration-700 font-mono border-b-2 border-purple-500  hover:text-purple-500 hover:bg-white">Add Farmer</a>
                         <a href="{{route('produce')}}" class="block px-6 py-1 font-semibold transition duration-700 font-mono hover:text-purple-500 hover:bg-white">Add Production</a>
                </div>
        
        
        
        
           </li>
        </ul>
       </div>

       <div>

        <ul class="flex justify-between items-center">
          <li><a href="javascript:void(0)" class="px-2 font-semibold hover:text-purple-500">
              <i class="fa fa-bell-o px-1 text-xl "></i>
           </a></li>

          <li><a href="javascript:void(0)" class="px-2 font-semibold hover:text-purple-500">
              <i class="fa fa-user  text-xl "></i>
            {{auth()->user()->fullName}}
          </a></li> 

          <li>
             <form action="{{ route('logout') }}" method="post">

                 @csrf

                 <button type="submit" class=" font-bold px-2 hover:text-purple-500">
                  <i class="fa fa-sign-out text-xl"></i>
                </button>
             </form>
        </li>
        </ul> 
        
       </div>
  </nav>
    
  @yield('content')
  
</body>
</html>