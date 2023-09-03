<div>
    <div class="container lg:ml-64 lg:pl-4 lg:flex lg:flex-col lg:w-75% mt-5 mx-2">
        <div class="lg:flex gap-4 items-stretch">
            <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%]">
                <div class="flex justify-center items-center space-x-5 h-full">
                    <div>
                        <h2 class="text-4xl font-bold text-gray-600">{{ Arr::get($seller, 'data.name') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="lg:ml-64 lg:pl-4 lg:flex lg:flex-col lg:w-75% mt-5 mx-2">
        <div class="lg:flex gap-2 items-stretch">
            <form class="bg-white p-8 rounded-md shadow-md" wire:submit.prevent="saveSale">
                <div class="mb-4">
                    <h4 class="text-center text-2xl font-bold text-gray-600">Add sale</h2>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="value">Value</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="number" step=".01" id="value" name="value" placeholder="Separated by dot - Ex 80.00" wire:model="value">
                    @error('value')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <button
                    class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                    type="submit">Register Sale
                </button>
            </form>
        </div>
    </div>

    <div class="lg:ml-64 lg:pl-4 lg:flex lg:flex-col lg:w-75% mt-5 mx-2">
        <div class="lg:flex gap-4 items-stretch">
            <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%]">
                <div class="flex justify-center items-center space-x-5 h-full">
                    <div>
                        <p>Total Commission</p>
                        <h2 class="text-4xl font-bold text-gray-600">$ {{Arr::get($seller, 'data.commission_formatted')}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-md my-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left border-b-2 w-full">
                            <h2 class="text-ml font-bold text-gray-600">Sales</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($sales)
                        @foreach ($sales as $sale)
                            <tr class="border-b w-full">
                                <td class="px-4 py-2 text-left align-top w-1/2">
                                    <div>
                                        <h2>Value: $ {{ $sale['value_formatted'] }}</h2>
                                        <p>date: {{ $sale['sale_date'] }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-right text-cyan-500 w-1/2">
                                    <p><span>Commission: $ {{$sale['commission_formatted']}}</span></p>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>