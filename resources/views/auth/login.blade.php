<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="flex justify-between items-center w-full">
    <div class="md:w-2/6 h-auto  w-full p-4 mx-auto md:mt-40 bg-gray-100 rounded-sm shadow-md">

        <h4 class="font-bold mb-8 text-2xl">Sign In</h4>

        @if(session('status'))
              <div class="bg-red-500 p-2 rounded-lg text-center text-white">
                {{ session('status')}}
              </div>
        @endif

        <form action="{{route('login')}}" method="post">

            @csrf

            <label for="email" class="block text-md font-semibold">Email</label>
            <input type="text" placeholder="Enter your email..." value="{{ old('email') }}" name="email" class="px-4 py-2 w-full my-2 rounded-md  @error('email') border-2 border-red-500 @enderror">
             @error('email')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror


            <label for="password" class="block text-md font-semibold">Password</label>
            <input type="password" placeholder="Enter password..." name="password" class="px-4 py-2 w-full my-2 rounded-md  @error('password') border-2 border-red-500 @enderror">
             @error('password')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror
        

            <button type="submit" class="block px-4 w-full py-2 mt-2 bg-purple-500 text-white font-semibold rounded-md">Log In</button>
            
                  <p class="text-center my-2">Don't have an account? <a href="{{route('register')}}" class="text-purple-500">Register</a> </p>
            
        </form>
    </div>
</body>
</html>