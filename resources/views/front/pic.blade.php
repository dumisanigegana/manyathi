<form action="{{ route('pic') }}" method="Post" enctype="multipart/form-data"> 
    @csrf
    <!--Title-->
    <div class="flex justify-between items-center pb-3">
        <p class="text-2xl font-bold">Upload new profile picture!</p>
        <div class="cursor-pointer z-50" @click="showModal = false">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
        </div>
    </div>

    <!-- content -->
    <div class="bg-white px-4 my-4 pb-4 sm:px-4 flex flex-col "> 
        <label class="block text-gray-700 text-sm font-bold mb-2" for="Avatar">
            Profile picture
        </label>  	                    
        <input 
            type="file" name="avatar" required
            class="block my-3 w-full text-lg text-gray-800 bg-green-100 rounded-lg cursor-pointer focus:outline-none" 
            id="chooseFile"
        >
    </div>

    <!--Footer-->
    <div class="flex justify-end pt-2">
        <button type="submit" class="border-2 border-green-400 text-green-400 hover:bg-green-400 hover:text-white font-bold py-1 my-1 px-4 rounded" >Submit</button>
    </div>
</form>