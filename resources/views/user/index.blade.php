<x-app-layout>
    @section('title', "User List")
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          @include('components.alert')
          <a
            href="{{route('admin.user.create')}}"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
          >+ New User
          </a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl bg-clip-border">
                      <div class="table-responsive">
                        <table class="table table-flush text-gray-900 pt-5" datatable id="ProductTable">
                          <thead class="text-xs text-gray-700 uppercase bg-gray-200 rounded-lg">
                            <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Roles</th>
                              <th>Email</th>
                              <th>AKSI</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($users as $user)
                            <tr>
                              <td class="font-normal leading-normal text-sm">{{$loop->iteration}}</td>
                              <td class="font-normal leading-normal text-sm">{{$user->name}}</td>
                              <td class="font-normal leading-normal text-sm">{{$user->roles}}</td>
                              <td class="font-normal leading-normal text-sm">{{$user->email}}</td>
                              <td class="font-normal leading-normal text-sm">
                                {{-- Edit --}}
                                  <a href="{{route('admin.user.edit', $user)}}"
                                    type="button"
                                    class="text-white bg-gray-600 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-7 py-2.5 text-center"
                                  >Edit
                                  </a>
                                {{-- Edit --}}
                                {{-- Delete --}}
                                  <form method="POST" action="{{route('admin.user.destroy', $user)}}" class="inline-block">
                                    @csrf
                                    @method('delete')
                                    <button
                                      type="submit"
                                      class="text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center"
                                    >Hapus
                                    </button>
                                  </form>
                                {{-- Delete --}}
                              </td>
                            </tr>
                            @empty
                                <tr>
                                <td colspan="5" class="text-center">Tidak ada apapun disini.</td>
                                <td class="hidden"></td>
                                <td class="hidden"></td>
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