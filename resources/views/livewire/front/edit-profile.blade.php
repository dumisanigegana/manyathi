<x-modal>
    <x-slot name="title">
        Edit your details.
    </x-slot>

    <x-slot name="content">
        <div class="bg-white p-3 my-auto shadow-sm rounded-sm w-4/5">
            <div class="grid md:grid-cols-2 text-sm flex flex-col">
                <div class="grid grid-cols-2 w-full"> 
                    <div class="px-4 py-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
                    </div>
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
                <button class="border-2 mx-auto border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-white font-bold py-1 my-1 px-4 rounded">Edit your details</button> 
            </div>             
        </div>
    </x-slot>

    <x-slot name="buttons">
        Buttons submit
    </x-slot>
</x-modal>
