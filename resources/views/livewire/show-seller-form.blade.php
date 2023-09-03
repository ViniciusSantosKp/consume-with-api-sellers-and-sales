<div>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Registration Seller</h1>
        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" action="" method="post" wire:submit.prevent="saveSeller">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                type="text" id="name" name="name" placeholder="Seller Name" wire:model="newSeller.name">
                @error('newSeller.name')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                type="email" id="email" name="email" placeholder="seller@example.com" wire:model="newSeller.email">
                @error('newSeller.email')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button
                class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit">Register
            </button>
        </form>
    </div>

    <div class="lg:ml-64 lg:pl-4 lg:flex lg:flex-col lg:w-75% mt-5 mx-2">
        <div class="bg-white rounded-lg p-4 shadow-md my-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left border-b-2 w-full">
                            <h2 class="text-ml font-bold text-gray-600">Sellers</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($sellers)
                        @foreach ($sellers as $seller)
                            <tr class="border-b grid grid-flow-col gap-x-2">
                                <td class="px-4 py-2 text-left align-top w-1/2">
                                    <div>
                                        <h2>{{$seller['name']}}</h2>
                                        <p class="text-xs">{{$seller['email']}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-right text-cyan-500">
                                    <a href="{{route('seller-sales', $seller['id'])}}">
                                        <p class="text-xs"><span>add sale | more...</span></p>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>