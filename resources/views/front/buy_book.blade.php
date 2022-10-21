<form action="{{ route('buy_book') }}" method="Post"> 
    @csrf
    <!--Title-->
    <div class="flex justify-between items-center pb-3">
        <p class="text-2xl font-bold">Fiil in and Submit</p>
        <div class="cursor-pointer z-50" @click="showModal = false">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
        </div>
    </div>

    <!-- content -->
    <div class="bg-white px-4 my-4 pb-4 sm:px-4 flex flex-col "> 
        <label class="block text-gray-700 text-sm font-bold mb-2" for="Avatar">
            Full name
        </label>  	                    
        <input 
            type="text" name="fullname" required
            class="block my-3 w-full text-lg text-gray-800 bg-green-100 rounded-lg cursor-pointer focus:outline-none"             
        >

        <label class="block text-gray-700 text-sm font-bold mb-2" for="Avatar">
            Email
        </label>  	                    
        <input 
            type="email" name="email" required
            class="block my-3 w-full text-lg text-gray-800 bg-green-100 rounded-lg cursor-pointer focus:outline-none"             
        >

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
        <input type="hidden" name="amount" value="5">
        <input type="hidden" name="purpose" value="Phase one book">
        <input type="hidden" name="credit" value="0">
    </div>

    <!--Footer-->
    <div class="flex justify-end pt-2">
        <button type="submit" class="border-2 border-green-400 text-green-400 hover:bg-green-400 hover:text-white font-bold py-1 my-1 px-4 rounded" >Submit</button>
    </div>
</form>