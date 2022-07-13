@extends('layouts.front')
@section('content')
<div class="md:flex no-wrap md:-mx-2 pt-8 object-contain ">
        <!-- Left Side -->
        <div class="w-full md:w-3/12 md:mx-2 mt-3">
            <!-- Profile Card -->
            <div class="bg-white p-3 border-t-4 border-green-400">
                <div class="image overflow-hidden">
                    <img class="h-auto w-full mx-auto"
                        src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                        alt="">
                </div>
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
                            <div class="px-4 py-2">{{ $subscriber->code }} {{ $subscriber->cell }}</div>
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
                    <div class="flex items-center mx-auto my-1">
                    <button class="border-2 mx-auto border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-white font-bold py-1 my-1 px-4 rounded" onclick="Livewire.emit('openModal', 'front.edit-profile')">Edit your details</button> 
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
                            <span class="tracking-wide">Desciples</span>
                        </div>
                        <div class="list-inside flex flex-wrap p-4">
                            @foreach($subscriber->desciples as $desciple)
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col space-x-3 mt-1 items-center">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row space-x-5 items-center">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span class="bg-green-300 w-5 h-5 items-center text-xs text-gray-800 text-sm font-semibold inline-flex p-1.5 rounded-full mr-2">
                                           {{ $desciple->desciples->count() }}
                                          </span> 
                                    </div>
                                </div>
                            </div>
                            @endforeach  
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3 w-full">
                                        <span  class="text-gray-800 text-left">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right mr-2">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                                <div class="flex flex-col items-center space-x-3 mt-1">
                                    <img class="h-16 w-16 rounded-full mx-auto"
                                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                        alt="">
                                    <div class="flex flex-row items-center space-x-3">
                                        <span  class="text-gray-800">{{ $desciple->user->fullname }}</span>
                                        <span  class="text-green-500 text-xs text-right">{{-- $desciple->desciples->count --}} 3 desciples</span>
                                    </div>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
                <!-- End of Experience and education grid -->
            </div>
            <!-- End of profile tab -->
        </div>
</div>
@endsection