<x-app-layout>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create third-party bank account') }}
        </h2>
   </x-slot>
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
        
    @endif --}}
    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
            <form action="{{ route('third_account.store')}}" method="POST">
                @csrf
                <div>
                    <label for="">Bank account</label>
                    <input type="text" name="idaccount" value={{ old('idaccount', '') }}>
                    <x-input-error :messages="$errors->get('idaccount')" class="mt-2 " />
                </div>

                <div>
                    <label for="">Description account</label>
                    <input type="text" name="description" value={{ old('description', '') }}>
                    <x-input-error :messages="$errors->get('description')" class="mt-2 " />
                </div>

                <div>
                    <label for="">Third-party name</label>
                    <input type="text" name="name_third" value={{ old('name_third', '') }} >
                    <x-input-error :messages="$errors->get('name_third')" class="mt-2 " />
                </div>

                {{-- <div>
                    <label for="">Active</label>
                    <select name="active">
                        <option {{ old(true, '') == true ? 'selected' : '' }} value= "true" >True</option>
                        <option {{ old(true, '') == false ? 'selected' : '' }} value="False">False</option>
                    </select>
                </div> --}}

                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>