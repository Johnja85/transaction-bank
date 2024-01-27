<x-app-layout>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit bank account') }}
        </h2>
   </x-slot>
    {{-- @include('') --}}
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
        
    @endif --}}
    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
            <form action="{{ route('account.update', $account->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="">Bank account</label>
                    <input class="field left" readonly="readonly" type="text" name="idaccount" value="{{ $account->idaccount }}">
                    <x-input-error :messages="$errors->get('idaccount')" class="mt-2 " />
                </div>

                <div>
                    <label for="">Description account</label>
                    <input type="text" name="description" value="{{ $account->description }}">
                    <x-input-error :messages="$errors->get('description')" class="mt-2 " />
                </div>

                <div>
                    <label for="">Initial account balance</label>
                    <input class="field left" readonly="readonly" type="number" name="balance"  value="{{ $account->balance }}">
                    <x-input-error :messages="$errors->get('balance')" class="mt-2 " />
                </div>

                <div>
                    <label for="is_active">Active</label>
                    <select name="is_active">
                        <option value= "1" {{ $account->is_active == true ? 'selected' : ''}} >True</option>
                        <option value="0" {{ $account->is_active == false ? 'selected' : ''}} >False</option>
                    </select>
                </div>

                <button type="submit">Update</button>
            </form>
            <a href="{{ route('account.index') }}">Go Back</a>
        </div>
    </div>
</x-app-layout>