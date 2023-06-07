<x-app-layout>
    @section('title', "Transaction List")
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          @include('components.alert')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl bg-clip-border">
                      <div class="table-responsive">
                        <table class="table table-flush text-gray-900 pt-5" datatable id="ProductTable">
                          <thead class="text-xs text-gray-700 uppercase bg-gray-200 rounded-lg">
                            <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Total Harga</th>
                              <th>Status</th>
                              <th>AKSI</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($transactions as $transaction)
                            <tr>
                              <td class="font-normal leading-normal text-sm">{{$loop->iteration}}</td>
                              <td class="font-normal leading-normal text-sm">{{$transaction->User->name}}</td>
                              <td class="font-normal leading-normal text-sm">Rp. {{$transaction->total_price}}</td>
                              <td class="font-normal leading-normal text-sm">{{$transaction->status}}</td>
                              <td class="font-normal leading-normal text-sm">
                                {{-- Edit --}}
                                  <a href="{{route('admin.transaction.show', $transaction)}}"
                                    type="button"
                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center"
                                  >Detail
                                  </a>
                                {{-- Edit --}}
                                {{-- Delete --}}
                                <a href="{{route('admin.transaction.edit', $transaction)}}"
                                    type="button"
                                    class="text-white bg-gray-600 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-7 py-2.5 text-center"
                                >Edit
                                </a>
                                {{-- Delete --}}
                              </td>
                            </tr>
                            @empty
                                <tr>
                                <td colspan="3" class="text-center">Tidak ada apapun disini.</td>
                                <td class="hidden"></td>
                                <td class="hidden"></td>
                              </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <!-- DataTable CDN -->
    <link href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet"/>
    @endpush

    @push('scripts')
    <!-- DataTable CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#ProductTable');
    </script>
    @endpush
</x-app-layout>