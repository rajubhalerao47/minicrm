<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <a href="{{ url('/companies') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Comanpies') }}</a>
            <a href="{{ url('/employee') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Employees') }}</a>

           <button type="button" id="new_employee_add" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled" wire:target="photo"> Add</button>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <form action="{{asset('')}}update_employee" method="POST">
             @csrf

             
              @foreach($single_employeee as $old_employee)
             <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                   <p><strong>Update Employee Details</strong></p><br/>
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
                    <div class="col-span-6 sm:col-span-4">
                      <label class="block font-medium text-sm text-gray-700" for="name">
                        First name
                      </label>
                      <input type="hidden" name="emp_id" value="{{$old_employee->emp_id}}">
                      <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="name" id="name" type="text" wire:model.defer="state.name" autocomplete="name" value="{{$old_employee->name}}">
                    </div>
                      <div class="col-span-6 sm:col-span-4">
                      <label class="block font-medium text-sm text-gray-700" for="name">
                        Last name
                      </label>
                      <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="last" id="last" type="text" wire:model.defer="state.last" autocomplete="last" value="{{$old_employee->last}}">
                    </div>

                    <!-- Email -->
                    <div class="col-span-6 sm:col-span-4">
                      <label class="block font-medium text-sm text-gray-700" for="email">
                        Email
                      </label>
                      <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="email" id="email" type="email" wire:model.defer="state.email" value="{{$old_employee->email}}">
                    </div>
                     <!-- Phone -->
                    <div class="col-span-6 sm:col-span-4">
                      <label class="block font-medium text-sm text-gray-700" for="email">
                        Phone
                      </label>
                      <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="phone" id="phone" type="text" wire:model.defer="state.phone" maxlength="10" value="{{$old_employee->phone}}">
                    </div>
                     <div class="col-span-6 sm:col-span-4">
                      
                      <label class="block font-medium text-sm text-gray-700" for="email">
                        Company
                      </label><!-- 
                      <input type="hidden" id="company_name" name="company_name" value="{{$old_employee->company_name}}"> -->
                      <select name="com_id" id="com_id" class="vs__search">
                         @foreach($company_detail as $com_list)
                        @if($old_employee->com_id == $com_list->com_id)
                          <option value="{{$com_list->com_id}}" selected>{{$com_list->name}}</option>
                         @else
                           <option value="{{$com_list->com_id}}">{{$com_list->name}}</option>
                         @endif  
                          @endforeach
                      </select>
                      <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                    </div>
                  </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                  <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Update</button>
                </div>
              
            </div>
            @endforeach

          </form>
        </div>
    </div>
</x-app-layout>
  </style>
 <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script>
    $( document ).ready(function() {
  // Handler for .ready() called.
       $('#new_employee_add').on('click', function () {
          window.location.replace("newemployee");
      });
       $('#com_id').on('click', function(){
         var com_id = $('#com_id').val();
          $.ajax({
             type:"GET",
             data:{"com_id":com_id},
             url:"{{ route('company_details') }}",
             success:function(result){
              $('#company_name').val(result);
             }
          });
          
       });
});  </script>
