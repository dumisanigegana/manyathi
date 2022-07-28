@extends('layouts.front')

@section('content')
<div class="bg-white p-3 shadow-sm rounded-sm">
    <h3 class="text-xl leading-6 text-center font-bold text-gray-900">
        Create an account.
    </h3>

   <div class="p-3">  
        <form  method="POST" action="{{ route('register_store') }}">
            @csrf
            <div class="flex  flex-wrap text-sm">
                <div class="flex flex-row w-full sm:flex-wrap"> 
                    <div class="py-2 flex-auto px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        First Name
                        </label>
                        <input required name="fname" value="{{ old('fname') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text">
                        @error('fname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="py-2 flex-auto px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-middle-name">
                        Middle Names
                        </label>
                        <input name="mnames" value="{{ old('mnames') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-middle-name" type="text">
                    </div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="py-2 flex-auto px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Last Name
                        </label>
                        <input required name="lname" value="{{ old('lname') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 py-3 px-4 leading-tight focus:outline-none focus:bg-white " id="grid-last-name" type="text">
                        @error('lname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="py-2 flex-auto px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-identity">
                        National ID 
                        </label>
                        <input required name="identity" value="{{ old('identity') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-identity" type="text" >
                        @error('identity') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex flex-row w-full"> 
                    <div class="py-2 flex-auto px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Password
                        </label>
                        <input  required class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" name="password">
                        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="py-2 flex-auto px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password_confirmation">
                        Confirm Password
                        </label>
                        <input required class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password_confirmation" type="password" name="password_confirmation">
                        @error('password_confirmation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex flex-row w-full"> 
                    <div class="py-2 flex-auto w-1/2 px-12">     
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Gender
                        </label>
                        <div class="mb-2">
                            <select name="gender" required class="block appearance-none w-full bg-gray-200 text-gray-700 py-3 px-4 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option disabled>Select...</option>
                                <option value="Male" @if(old('gender') == "Male") selected @endif>Male</option>
                                <option value="Female" @if(old('gender') == "Female") selected @endif>Female</option>
                            </select>
                            @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div> 
                    <div class="py-2 flex-auto w-1/2 px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-dob">
                        Date of Birth
                        </label>
                        <input name="dob" required value="{{ old('dob') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-dob" type="date" >
                        @error('dob') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <div class="flex flex-row w-full">
                    <div class="py-2 flex-auto w-1/2 px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                        Email
                        </label>
                        <input name="email" required value="{{ old('email') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" >
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
            {{-- Phone --}}                
                    <div class="py-2 flex-auto w-1/2 px-12">
                        <label for="price" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <label for="cell" class="sr-only">Code</label>
                                <select id="cell" required name="cell_country" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                    @foreach( $countries as $country)
                                    <option value="{{ $country->phonecode }}" @if(old('cell_country') == "{{ $country->phonecode }}") selected @endif>+ {{ $country->phonecode }}</option>
                                    @endforeach
                                </select>
                            </div>                                                        
                            <input type="tel" required name="cell" id="price" class="appearance-none block w-full bg-gray-200 text-gray-700 py-3 pl-24 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="0712123456">
                        </div>
                    </div>
                </div>
                <div class="py-2 flex-auto px-12">     
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-address">
                    Phyisical Address
                    </label>
                    <input class="required appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-address" type="text" name="address">
                    @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div> 
                <div class="flex flex-row w-full"> 
                    <div class="py-2 flex-auto w-1/2 px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        City
                        </label>
                        <input name="city" required value="{{ old('city') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" >
                        @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="py-2 flex-auto w-1/2 px-12">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                            Country
                        </label>
                        <div class="mb-2">
                            <select name="country" required class="block appearance-none w-full bg-gray-200 text-gray-700 py-3 px-4 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                @foreach($countries as $country)
                                <option value="{{ $country->nicename }}" @if(old('country') == "{{ $country->nicename }}") selected @endif>{{ $country->nicename }}</option>
                                @endforeach
                            </select>
                            @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div> 
                </div>
                
                <div class="bg-white mx-auto px-4 pb-4 sm:px-4 sm:flex">        
                    <button type="submit" class="border-2 mx-auto border-green-400 text-green-400 hover:bg-green-400 hover:text-white font-bold py-1 my-1 px-4 rounded">Submit</button> 
                </div>
            </div>
        </form>
    </div>
</div>
@endsection