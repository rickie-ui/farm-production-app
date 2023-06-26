<!DOCTYPE html>
@extends('layouts.index')

@section('content')

<div class="w-3/4 mx-auto mt-8 bg-white">
    <div class="w-3/6 mx-auto  border px-2 py-4 shadow-md rounded-md bg-gray-200">
        <div class="border-l-4 border-purple-500 px-1 my-6 font-semibold text-xl">Production information</div>
        <p class="mb-6 text-gray-400 text-sm ">Add the farmer's coffee quantity with caution for accurate result!!</p>

         @if(session('status'))
              <div class="bg-red-500 p-2 rounded-lg text-center text-white">
                {{ session('status')}}
              </div>
        @endif

        @if(session('success'))
                <div class="bg-purple-200 p-2 rounded-lg text-center text-purple-500 font-semibold">
                    {{ session('success')}}
                </div>
         @endif

        <form action="{{route('produce')}}" method="post">

            @csrf 

            <label for="account" class="block text-md font-semibold">Account Number</label>
            <input type="text" placeholder="Enter farmer's account number..." value="{{ old('account') }}" name="account" class="px-4 py-2 w-full my-2 rounded-md @error('account') border-2 border-red-500 @enderror">
             @error('account')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror

            <label for="quantity" class="block text-md font-semibold">Quantity(Kgs)</label>
            <input type="text" placeholder="Enter coffee quantity..." value="{{ old('quantity') }}" name="quantity" class="px-4 py-2 w-full my-2 rounded-md @error('quantity') border-2 border-red-500 @enderror">
             @error('quantity')
                 <div class="text-red-500 font-semibold text-sm">
                    {{ $message }}
                 </div>
             @enderror


            <p class="my-4 text-sm opacity-60 font-semibold">By selling the coffee produce to the organization, You agree to our <a href="javascript:void(0)" class="text-purple-500">Terms&Conditions</a> and <a href="javascript:void(0)" class="text-purple-500">Privacy Policy</a></p>

            <button type="submit" class="block px-4 w-full py-2 mt-2 bg-purple-500 text-white font-semibold rounded-md">Add Quantity</button>
        </form>
    </div>
</div>

@endsection