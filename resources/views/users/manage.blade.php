@extends('layouts.index')

@section('content')

<div class="w-3/4 mx-auto mt-8 bg-white">
    <div class="w-3/6 mx-auto  border px-2 py-4 shadow-md rounded-md bg-gray-200">
        <div class="border-l-4 border-purple-500 px-1 my-6 font-semibold text-xl">Personal information</div>
        <p class="my-2 text-gray-400 text-sm">Create an account and enjoy exclusive benefits of the platform!</p>

        @if(session('success'))
                <div class=" bg-purple-200 p-2 rounded-lg text-center text-purple-500 font-semibold">
                    {{ session('success')}}
                </div>
         @endif

        <form action="{{ route('manage')}}" method="post">

            @csrf

            <label for="fullName" class="block text-md font-semibold">Full Name</label>
            <input type="text" placeholder="Enter Full Name..." value="{{ old('fullName') }}" name="fullName" class="px-4 py-2 w-full my-2  rounded-md @error('fullName') border-2 border-red-500 @enderror">
             @error('fullName')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror


            <label for="phone" class="block text-md font-semibold">Phone Number</label>
            <input type="text" placeholder="Enter farmer's number..." value="{{ old('phone') }}" name="phone" class="px-4 py-2 w-full my-2 rounded-md @error('phone') border-2 border-red-500 @enderror">
            @error('phone')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror
            


            <label for="location" class="block text-md font-semibold">Location</label>
            <input type="text" placeholder="Enter location..." value="{{ old('location') }}" name="location" class="px-4 py-2 w-full my-2 rounded-md @error('location') border-2 border-red-500 @enderror">
             @error('location')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror


            <label for="coffee" class="block text-md font-semibold">Select an option</label>
            <select name="coffee" class="px-4 py-2 w-full my-2 rounded-md @error('coffee') border-2 border-red-500 @enderror">
                      <option selected>Choose  coffee type</option>
                      <option value="Arabica">Arabica</option>
                      <option value="Robusta">Robusta</option>
                      <option value="Excelsa">Excelsa</option>
                      <option value="Liberica">Liberica</option>
            </select>
              @error('coffee')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror

            <p class="my-4 text-sm opacity-50 font-semibold">By joining the organization, You agree to our <a href="javascript:void(0)" class="text-purple-500">Terms&Conditions</a> and <a href="javascript:void(0)" class="text-purple-500">Privacy Policy</a></p>

            <button type="submit" class="block px-4 w-full py-2 mt-2 bg-purple-500 text-white font-semibold rounded-md">Create Account</button>
        </form>
    </div>
</div>

@endsection