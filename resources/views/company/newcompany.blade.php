<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <a href="{{ url('/companies') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Comanpies') }}</a>
            <a href="{{ url('/employee') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Employees') }}</a>

           <button type="button" id="new_company_add" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Add</button>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <form action="addcompany" method="POST" enctype="multipart/form-data">
             @csrf

            
             <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                  <p><strong>New Company Details</strong></p><br/>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li style="color:red;">{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                   @if (session('error'))
                     <p style="color:red;"><strong>{{ session('error') }}</strong></p>
                   @endif
                  <div class="grid grid-cols-6 gap-6">
                    <!-- Profile Photo -->
                    <div class="col-span-6 sm:col-span-4">
                      <label class="block font-medium text-sm text-gray-700" for="name">
                        Logo
                      </label>
                      <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="logo" id="logo" type="file" wire:model.defer="state.logo" autocomplete="logo">
                    </div>

                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4">
                      <label class="block font-medium text-sm text-gray-700" for="name">
                        Name
                      </label>
                      <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="name" id="name" type="text" wire:model.defer="state.name" autocomplete="name">
                    </div>

                    <!-- Email -->
                    <div class="col-span-6 sm:col-span-4">
                      <label class="block font-medium text-sm text-gray-700" for="email">
                        Email
                      </label>
                      <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="email" id="email" type="email" wire:model.defer="state.email">
                    </div>
                     <div class="col-span-6 sm:col-span-4">
                      <label class="block font-medium text-sm text-gray-700" for="email">
                        Website
                      </label>
                      <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="website" id="website" type="text" wire:model.defer="state.website">
                    </div>
                  </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                  <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Save</button>
                </div>
              
            </div>

          </form>
        </div>
    </div>
</x-app-layout>
  </style>
 <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script>
    $( document ).ready(function() {
  // Handler for .ready() called.
      $('#new_company_add').on('click', function () {
          window.location.replace("newcompany");
      });
});  </script>
