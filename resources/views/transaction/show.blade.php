<x-app-layout>
    @section('title', "Transaction Show")
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-5">
                                {{ __('Detail Transaction') }}
                            </h2>
                        </header>
                    
                        <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                            <div class="p-6 bg-white border-b border-gray-200">
                               <table class="table-auto w-full">
                                    <tbody>
                                        <tr>
                                            <th class="border px-6 py-4 text-right">Name</th>
                                            <td class="border px-6 py-4">{{ $transaction->User->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="border px-6 py-4 text-right">Email</th>
                                            <td class="border px-6 py-4">{{ $transaction->User->email }}</td>
                                        </tr>
                                        <tr>
                                            <th class="border px-6 py-4 text-right">Address</th>
                                            <td class="border px-6 py-4">{{ $transaction->address }}</td>
                                        </tr>
                                        <tr>
                                            <th class="border px-6 py-4 text-right">Payment</th>
                                            <td class="border px-6 py-4">{{ $transaction->payment }}</td>
                                        </tr>
                                        <tr>
                                            <th class="border px-6 py-4 text-right">Total Price</th>
                                            <td class="border px-6 py-4">{{ number_format($transaction->total_price) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="border px-6 py-4 text-right">Shipping Price</th>
                                            <td class="border px-6 py-4">{{ number_format($transaction->shipping_price) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="border px-6 py-4 text-right">Status</th>
                                            <td class="border px-6 py-4">{{ $transaction->status }}</td>
                                        </tr>
                                        <tr>
                                            <th class="border px-6 py-4 text-right">Detail Transaction</th>
                                            <td class="border px-6 py-4">                                                
                                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                    <table class="w-full text-sm text-left text-gray-400">
                                                        <thead class="text-xs uppercase bg-gray-600 text-gray-400">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-4">
                                                                    Product name
                                                                </th>
                                                                <th scope="col" class="px-6 py-4">
                                                                    Harga
                                                                </th>
                                                                <th scope="col" class="px-6 py-4">
                                                                    Quantity
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="border-b bg-gray-800 border-gray-700">
                                                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                                                    {{$items->Product->name}}
                                                                </th>
                                                                <td class="px-6 py-4">
                                                                    {{$items->Product->price}}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    {{$items->quantity}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                               </table>
                           </div>
                       </div>
                    </section>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>