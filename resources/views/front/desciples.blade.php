<div class="pb-3">
    <p class="text-2xl text-center font-bold">These are your disciples</p>    
</div>

<!-- content -->
<div class="bg-white px-4 my-4 pb-4 sm:px-4 flex flex-col "> 
    <div class="w-full">    
        <div class="list-inside flex flex-wrap p-4">
        <!-- if exit statement -->
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
        {{-- <div class="text-center basis-1/4 border-r-8 mb-4 border-white bg-gray-100 flex-item">
                <div class="flex flex-col items-center space-x-3 mt-1">
                    <img class="h-16 w-16 rounded-full mx-auto"
                        src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                        alt="">
                    <div class="flex flex-row items-center space-x-3 w-full">
                        <span  class="text-gray-800 text-left">{{ $desciple->user->fullname }}</span>
                        <span  class="text-green-500 text-xs text-right mr-2"> 3 desciples</span>
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
                        <span  class="text-green-500 text-xs text-right"> 3 desciples</span>
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
                        <span  class="text-green-500 text-xs text-right"> 3 desciples</span>
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
                        <span  class="text-green-500 text-xs text-right"> 3 desciples</span>
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
                        <span  class="text-green-500 text-xs text-right"> 3 desciples</span>
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
                        <span  class="text-green-500 text-xs text-right"> 3 desciples</span>
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
                        <span  class="text-green-500 text-xs text-right">3 desciples</span>
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
                        <span  class="text-green-500 text-xs text-right">3 desciples</span>
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
                        <span  class="text-green-500 text-xs text-right">3 desciples</span>
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
                        <span  class="text-green-500 text-xs text-right">3 desciples</span>
                    </div>
                </div>
            </div>                          
        --}}
        </div>
    </div>
</div>

   