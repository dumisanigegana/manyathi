@extends('layouts.front')
@section('content')
<div class="md:flex no-wrap md:-mx-2 pt-8 object-contain ">
    <!-- Left Side Avatar and Phases -->
    <div class="w-full md:w-3/12 md:mx-2 mt-3">
        <!-- Profile Card -->
        <div class="bg-white p-3 border-t-4 border-green-400"  x-data="{ 'showModal': false }" @keydown.escape="showModal = false" >
            <div class="image overflow-hidden"  @click="showModal = true">
                @if ($subscriber->avatar)
                <img class="h-auto w-full mx-auto"
                    src="{{ $subscriber->avatar }}" alt="Profile Picture"
                    >
                @else
                <img class="h-auto w-full mx-auto"
                    src="{{URL::asset('/img/avatar.jpg')}}" alt="Profile Picture"
                    >                
                @endif
            </div>
             <!--Overlay-->
            <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
                <!--Dialog-->
                <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-10" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    @include('front.pic')
                </div>
                <!--/Dialog -->
            </div><!-- /Overlay -->
            <h1 class="text-gray-900 font-bold text-xl text-center leading-8 my-1">{{ $subscriber->user->fullname }}{{-- $subscriber->subphase->phase->name --}}</h1>
            
            <ul
                class="bg-gray-100 text-gray-800 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                {{-- <li class="flex items-center py-3 w-full">
                    <span class="font-bold">Status: </span>
                    <span class="ml-auto"><span
                            class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                </li> --}}
                <li class="flex items-center py-3">
                    <span class="font-bold">Phase: </span>
                    <span class="ml-auto"> {{ $subscriber->subphase->phase->name }}</span>
                </li>
                <li class="flex items-center py-3">
                    <span class="font-bold">Reference #: </span>
                    <span class="ml-auto"> {{ $subscriber->account }} </span>
                </li>
                <li class="flex items-center py-3">
                    <span class="font-bold">Upliner Number: </span>
                    <span class="ml-auto"> {{ $subscriber->referee->account }} </span>
                </li>
                <li class="flex items-center py-3">
                    <span class="font-bold">Desciples: </span>
                    <span class="ml-auto" x-data="{ 'showDesc': false }" @keydown.escape="showDesc = false" >
                        @if($subscriber->desciples->count() > 2)
                        <button class="bg-green-500 py-1 px-6 rounded text-white text-sm" @click="showDesc = true">
                            {{ $subscriber->desciples->count() }}
                        </button>
                        @else
                        None
                        @endif
                          <!--Overlay-->
                        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showDesc" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showDesc }">
                            <!--Dialog-->
                            <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showDesc" @click.away="showDesc = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-10" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                                @include('front.desciples')
                            </div>
                            <!--/Dialog -->
                        </div><!-- /Overlay -->
                    </span>                    
                </li>
            </ul>
        </div>
        <!-- End of profile card -->
        <div class="my-4"></div>
        
    </div>
    <!-- Right Side -->
    <div class="w-full md:w-9/12 mx-2 mt-3">
        <!-- Profile tab -->
        <!-- About Section -->
        <div class="bg-white p-3 shadow-sm rounded-sm">
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                <span clas="text-green-500">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </span>
                <span class="tracking-wide">About</span>
            </div>
            <div class="text-gray-700">
                <div class="grid md:grid-cols-2 text-sm">
                    <div class="grid grid-cols-2 w-full"> 
                        <div class="px-4 py-2 font-semibold">For Name</div>
                        <div class="px-4 py-2">{{ $subscriber->user->fname }} {{ $subscriber->user->mnames }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Last Name</div>
                        <div class="px-4 py-2">{{ $subscriber->user->lname }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Gender</div>
                        <div class="px-4 py-2">{{ $subscriber->gender }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Contact No.</div>
                        <div class="px-4 py-2">{{ $subscriber->cell }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold"> Address</div>
                        <div class="px-4 py-2">{{ $subscriber->address }}</div>
                    </div>                                                
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Permanant Address</div>
                        <div class="px-4 py-2">{{ $subscriber->city }} {{ $subscriber->country }}</div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Email.</div>
                        <div class="px-4 py-2">
                            <a class="text-blue-800">{{ $subscriber->user->email }}</a>
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="px-4 py-2 font-semibold">Date of birth</div>
                        <div class="px-4 py-2">{{ $subscriber->birth }}</div>
                    </div>                    
                </div>
                <!-- modal div -->
                <div class="flex items-center mx-auto my-1">
                    <!-- Button (blue), duh! -->
                    <button type="button" class="border-2 mx-auto border-green-400 text-green-400 hover:bg-green-400 hover:text-white font-bold py-1 my-1 px-4 rounded">
                        <a  href="{{ url('/update') }}" >Edit your details </a></button> 
                    {{-- <button @click="open = true" class="border-2 mx-auto border-green-400 text-green-400 hover:bg-green-400 hover:text-white font-bold py-1 my-1 px-4 rounded">Edit your details</button>  --}}
                        <!--Overlay-->
                </div>              
            </div>                
        </div>
        <!-- End of about section -->

        <div class="my-4"></div>

        <!-- Desciples Section -->
        <div class="bg-white p-3 shadow-sm rounded-sm">

            <div class="w-full">
                <div>
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </span>
                        <span class="tracking-wide"> Activities {{ $subscriber->subphase->phase->name }}</span>
                    </div>
                    @cannot('admin_access')
                    <table class="table-fixed w-full ">  
                        <thead>
                            <td class="font-bold text-blue-500">Activity</td>
                            <td class="text-yellow-600">Status</td>
                            <td class="text-yellow-600">Action</td>
                        </thead>        
                        <tbody>                            
                            @foreach($phase->subphases as $subphase)
                            <tr>
                            <td class="font-bold text-blue-500">{{ $subphase->name}}</td>
                            <td class="uppercase text-yellow-600">{{ $subphase->description}}</td>
                            <td class="uppercase text-yellow-600">
                                {{-- {{ $subscriber->acheivements }} --}}
                                 @if($subscriber->hasAction($subphase->id)) True
                                @else false @endif 
                            </td>
                            </tr>                            
                            @endforeach
                        </tbody> 
                        </table>
                        @endcannot					
                    </div>
                </div>
            </div>
            <!-- End of Experience and education grid -->
        </div>
        <!-- End of profile tab -->
    </div>
</div>
@endsection