<x-app-layout>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create bank account') }}
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
            <form action="{{ route('account.store')}}" method="POST">
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
                    <label for="">Initial account balance</label>
                    <input type="number" name="balance" value={{ old('balance', '') }} >
                    <x-input-error :messages="$errors->get('balance')" class="mt-2 " />
                </div>

                {{-- <div>
                    <label for="">Active</label>
                    <select name="active">
                        <option {{ old('active', '') == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                        <option {{ old('active', '') == 'no' ? 'selected' : '' }} value="no">Not</option>
                    </select>
                </div> --}}

                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>