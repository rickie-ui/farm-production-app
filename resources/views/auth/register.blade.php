<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body class="flex justify-between items-center w-full">
    <div class="md:w-2/6 h-auto  w-full p-4 mx-auto md:mt-20 bg-gray-100 rounded-sm">

        <h4 class="font-extrabold mb-2 text-2xl">Sign Up</h4>
        <p class="my-2 text-gray-400 text-md">Create an account and enjoy exclusive benefits of the platform!</p>
        <form action="{{ route('register')}}" method="post">

            @csrf

            <label for="fullName" class="block text-md font-semibold">Full Name</label>
            <input type="text" placeholder="Enter Full Name..." value="{{ old('fullName') }}" name="fullName" class="px-4 py-2 w-full my-2  rounded-md @error('fullName') border-2 border-red-500 @enderror">
             @error('fullName')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror

            <label for="email" class="block text-md font-semibold">Email</label>
            <input type="text" placeholder="Enter your email..." value="{{ old('email') }}" name="email" class="px-4 py-2 w-full my-2 rounded-md @error('email') border-2 border-red-500 @enderror">
            @error('email')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror


            <label for="password" class="block text-md font-semibold">Password</label>
            <input type="password" placeholder="Enter password..."  name="password" class="px-4 py-2 w-full my-2 rounded-md @error('password') border-2 border-red-500 @enderror">
            @error('password')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror

            <label for="password_confirmation" class="block text-md font-semibold">Repeat Password</label>
            <input type="password" placeholder="Enter password again..."  name="password_confirmation" class="px-4 py-2 w-full my-2 rounded-md @error('password_confirmation') border-2 border-red-500 @enderror">
            @error('password_confirmation')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror


            <p class="my-4 text-sm font-semibold opacity-50">By signing up, You agree to our <a href="javascript:void(0)" class="text-purple-500">Terms&Conditions</a> and <a href="javascript:void(0)" class="text-purple-500">Privacy Policy</a></p>

            <button type="submit" class="block px-4 w-full py-2 mt-2 bg-purple-500 text-white font-semibold rounded-md">Create Account</button>
            <p class="text-center my-2">Already have an account? <a href="{{route('login')}}" class="text-purple-500">Login</a> </p>
        </form>
    </div>
</body>
</html>