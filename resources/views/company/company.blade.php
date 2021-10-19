<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <a href="{{ url('/companies') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Comanpies') }}</a>
            <a href="{{ url('/employee') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Employees') }}</a>

           <button type="button" id="new_company_add" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled" wire:target="photo">Add</button>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-6 font-mono">
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">Logo</th>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">Website</th>
               <th class="px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
        @foreach($company_detail as $comapany)
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full" src="{{asset('/storage/'.$comapany->logo)}}" alt="" loading="lazy" />
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{$comapany->name}}</span>
            </td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{$comapany->email}}</span> 
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{$comapany->website}}</span>
            </td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                   <button type="button" id="edit_company_{{$comapany->com_id}}" value="{{$comapany->com_id}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white">Edit</button>
                   <button type="button" id="delete_company_{{$comapany->com_id}}" value="{{$comapany->com_id}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white">Delete</button>
              </span>
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"></span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
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

      $('button[id^="edit_company_"]').on('click', function() {  
        
          var com_id = this.value;
            window.location.replace("editcompany/"+com_id);
          });

       $('button[id^="delete_company_"]').on('click', function() {  
        
          var com_id = this.value;
          if (confirm("Are you sure?")) {
           window.location.replace("delete_company/"+com_id);
          }
          return false;
           
          });

        
      

});  
</script>
