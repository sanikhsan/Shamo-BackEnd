<x-app-layout>
    @section('title', "Update Transaction")
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
                                 </tbody>
                            </table>
                        </div>
                        <form action="{{route('admin.transaction.update', $transaction)}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="p-6 bg-white border-b border-gray-200">
                                <x-input-label for="status" :value="__('Status Transaction')" />
                                <select id="status" name="status" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="{{ $transaction->status }}">{{ $transaction->status }}</option>
                                    <option value="" disabled>-----------</option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="SUCCESS">SUCCESS</option>
                                    <option value="CANCELLED">CANCELLED</option>
                                    <option value="FAILED">FAILED</option>
                                    <option value="SHIPPING">SHIPPING</option>
                                    <option value="SHIPPED">SHIPPED</option>
                                </select>
                                <div class="flex items-center gap-4 mt-2">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>
                            </div>
                        </form>
                    </section>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>