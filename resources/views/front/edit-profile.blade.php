@extends('layouts.front')
@section('content')
<div class="md:flex no-wrap md:-mx-2 pt-8 object-contain ">
<!-- Left Side -->
<div class="w-full md:w-3/12 md:mx-2 mt-3">
    <!-- Profile Card -->
    <div class="bg-white p-3 border-t-4 border-green-400" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
        <div class="image overflow-hidden" @click="showModal = true">
            @if ($subscriber->avatar)
            <img class="h-auto w-full mx-auto"
                src="{{ $subscriber->avatar }}" alt="Profile Picture"
                >
            @else
            <img class="h-auto w-full mx-auto"
                src="{{URL::asset('/img/avatar.png')}}" alt="Profile Picture"
                >                
            @endif
            
        </div>
        <!--Overlay-->
		<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
			<!--Dialog-->
			<div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
				@include('front.pic')
			</div>
			<!--/Dialog -->
		</div><!-- /Overlay -->
        <h1 class="text-gray-900 font-bold text-xl text-center leading-8 my-1">{{ $subscriber->user->fullname }}</h1>
        
        <ul
            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
            <li class="flex items-center py-3 w-full">
                <span>Status</span>
                <span class="ml-auto"><span
                        class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
            </li>
            <li class="flex items-center py-3">
                <span>Phase </span>
                <span class="ml-auto"> {{ $subscriber->subphase->phase->name }} {{ $subscriber->subphase->name }} </span>
            </li>
            <li class="flex items-center py-3">
                <span>Reference Number </span>
                <span class="ml-auto"> {{ $subscriber->account }} </span>
            </li>
            <li class="flex items-center py-3">
                <span>Upliner Number </span>
                <span class="ml-auto"> {{ $subscriber->referee->user->fullname }} {{ $subscriber->referee->account }} </span>
            </li>
        </ul>
    </div>
    <!-- End of profile card -->
    <div class="my-4"></div>
    
</div>
<div class="w-full md:w-9/12 mx-2 mt-3">
    <!-- Profile tab -->
    <!-- About Section -->
    <div class="bg-white p-3 shadow-sm rounded-sm">

            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Edit your details.
            </h3>

            <div class="bg-white p-3 my-auto shadow-sm rounded-sm">  
                <form action="{{ route('prof_update') }}" method="Post" enctype="multipart/form-data"> 
                    @csrf
                    @method('Put')       
                    <div class="flex flex-wrap text-sm flex flex-col">
                        <div class="flex flex-row w-full"> 
                            <div class="px-4 py-2 w-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="fname"> 
                                    First name
                                </label>
                                @error('fname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="fname" type="text" value="{{ old('fname', $subscriber->user->fname) }}">
                            </div>
                            <div class="px-4 py-2 w-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="mnames">
                                    Middle names
                                </label>
                                @error('mnames') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="mnames" type="text" value="{{ old('mnames', $subscriber->user->mnames) }}">
                            </div>
                        </div>
                        <div class="flex flex-row w-full"> 
                            <div class="px-4 py-2 w-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="sname">
                                    Surname
                                </label>
                                @error('lname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="lname" type="text" value="{{ old('lname', $subscriber->user->lname) }}">
                            </div>
                            <div class="px-4 py-2 w-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="Country">
                                    Country
                                </label>
                                @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <select name="country" class="shadow block appearance-none border rounded w-full py-2 pl-3 pr-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option disabled>Select... </option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country}}" @if(old('country') == $subscriber->country) selected @endif>{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        
                        </div>
                        <div class="flex flex-row w-full"> 
                            <div class="px-4 py-2 w-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                    Physical Address
                                </label>
                                @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="address" type="text" value="{{ old('address', $subscriber->address) }}">
                            </div> 
                            <div class="px-4 py-2 w-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="cell">
                                    City
                                </label>
                                @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="city" type="text" value="{{ old('city', $subscriber->city) }}">
                            </div>                  
                        </div>
                        
                        <div class="flex flex-row w-full"> 
                            <div class="px-4 py-2 w-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                    Birthday
                                </label>
                                @php $bdate = date('Y-m-d', strtotime($subscriber->dob)) @endphp
                                @error('dob') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="dob" type="date" value="{{ old('dob', $bdate) }}">
                            </div>   
                            <div class="px-4 py-2 w-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="cell">
                                    Mobile contact
                                </label>
                                @error('cell') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="cell" type="text" placeholder="Cell" value="{{ old('cell', $subscriber->cell) }}">
                            </div>
                            <div class="px-4 py-2 w-full">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="Gender">
                                    Gender
                                </label>
                                @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                <select name="gender" class="shadow block appearance-none border rounded w-full py-2 pl-3 pr-8 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option disabled>Select... </option>
                                    <option value="Male" @if(old('geder') == "Male") selected @endif>Male </option>
                                    <option value="Female" @if(old('geder') == "Female") selected @endif>Female </option>
                                </select>
                            </div> 
                        </div>                    
                    </div>
                    <div class="bg-white px-4 my-4 pb-4 sm:px-4 flex flex-col "> 
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Avatar">
                            Profile picture
                        </label>  
                        @error('avatar') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        <input 
                            type="file" name="avatar" 
                            class="block mb-5 w-full text-lg text-gray-800 bg-purple-100 rounded-lg border border-green-600 cursor-pointer focus:outline-none" 
                            id="chooseFile"
                        >
                    </div>
                    <div class="bg-white px-4 pb-4 sm:px-4 sm:flex">        
                        <button type="submit" class="border-2 mx-auto border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-white font-bold py-1 my-1 px-4 rounded">Submit</button> 
                    </div>
                </form>
                </div>            
            </div>
        </div>                      
    </div>
</div>
@endsection