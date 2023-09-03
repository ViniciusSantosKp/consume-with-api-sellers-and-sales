<div>
    <div class="lg:ml-64 lg:pl-4 lg:flex lg:flex-col lg:w-75% mt-5 mx-2">
        <div class="lg:flex gap-4 items-stretch">
            <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%]">
                <div class="flex justify-center items-center space-x-5 h-full">
                    <div>
                        <p>Total Sales</p>
                        <h2 class="text-4xl font-bold text-gray-600">{{ $sales_total }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-md my-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left border-b-2 w-full">
                            <h2 class="text-ml font-bold text-gray-600">Vendas</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($sales)
                        @foreach ($sales as $sale)
                            <tr class="border-b w-full">
                                <td class="px-4 py-2 text-left align-top w-1/2">
                                    <div>
                                        <h2>{{ $sale['sale_date']}}</h2>
                                        <p>{{ $sale['name']}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-right text-cyan-500 w-1/2">
                                    <p><span>Value: {{ $sale['value_formatted']}}</span></p>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>