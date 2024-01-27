<x-app-layout>
    <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Account Transaction') }}
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
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <div>
                    <label for="">Origin Account</label>
                    <select name="account" id="account">
                        <option value=""></option>
                        @foreach ( $originAccounts as $originAccount )
                            <option value="{{ $originAccount->idaccount }}" >{{ $originAccount->idaccount }} {{ $originAccount->description }}</option>
                        @endforeach 
                    </select>
                    <x-input-error :messages="$errors->get('account')" class="mt-2 " />   
                </div>

                <div>
                    <label for="">Destionation Third Account</label>
                    <select name="destination_account" id="destination_account">
                        <option value=""></option>
                        @foreach ( $thirdsAcounts as $thirdsAcount )
                            <option value="{{ $thirdsAcount->idaccount }}" >{{ $thirdsAcount->idaccount }} {{$thirdsAcount->description }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('destination_account')" class="mt-2 " />
                </div>

                <div>
                    <label for="">Value transfer</label>
                    <input class="field left" type="number" name="value" value={{ old('value', '') }}>
                    <x-input-error :messages="$errors->get('value')" class="mt-2 " />
                </div>

                <div>
                    <label for="">Observation transaction</label>
                    <input class="field left" type="text" name="observation" value={{ old('observation', '') }}>
                    <x-input-error :messages="$errors->get('observation')" class="mt-2 " />
                </div>
                <div>
                    <input class="form-group hidden" type="text" name="type" value='third'>
                </div>
                <button type="submit">Transfer</button>
            </form>
        </div>
    </div>
     {{-- <div class="py-12">
         <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <table>
                    <thead>
                        <tr>
                            <th>
                                Origin Account 
                            </th>
                            <th>
                                Destionation Account
                            </th>
                            <th>
                                Value transfer
                            </th>
                        </tr>  
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="account" id="account">
                                    <option value=""></option>
                                    @foreach ( $accounts as $account )
                                        <option value="{{ $account->id }}" >{{ $account->idaccount }} {{$account->description }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="destination_account" id="destination_account">
                                    <option value=""></option>
                                    @foreach ( $accounts as $account )
                                        <option value="{{ $account->id }}" >{{ $account->idaccount }} {{$account->description }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                    <input class="field left" type="number" name="value" value={{ old('value', '') }}>
                                    <x-input-error :messages="$errors->get('value')" class="mt-2 " />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="value">Observation transaction</label>
                                <input class="field left" type="text" name="observation" value={{ old('observation', '') }}>
                                <x-input-error :messages="$errors->get('observation')" class="mt-2 " />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit">Transfer</button>
            </form>
         </div>
     </div> --}}
</x-app-layout>


{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtener referencias a los elementos del formulario
        var originAccountSelect = document.getElementById('account');
        var destinationAccountSelect = document.getElementById('destination_account');

        
        // Manejar el cambio en la cuenta de origen
        console.log(originAccountSelect);
        console.log(destinationAccountSelect);
        var accountSelects = [];
        originAccountSelect.addEventListener('change', function () {
            var originAccountIndex = originAccountSelect.selectedIndex;
            var accountSelect = originAccountSelect.options[originAccountIndex].value;

            destinationAccountSelect.options[accountSelect].disabled = true;

            // Mantener un estado de las cuentas seleccionadas
            if (accountSelects.includes(accountSelect)) {
                accountSelects.pop(); // Eliminar la cuenta si ya está en la lista
            } else {
                accountSelects.push(accountSelect); // Agregar la cuenta a la lista
            }
            
        //     // Realizar solicitud AJAX
        //     var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        //     var formData = new FormData(document.querySelector('form'));

        //     // Agregar el token CSRF al encabezado de la solicitud
        //     formData.append('_token', csrfToken);

        //     // Realizar la solicitud AJAX con la biblioteca Fetch
        //     fetch('{{ route("transaction.store") }}', {
        //         method: 'POST',
        //         body: formData,
        //     })
        //     .then(response => response.json())
        //     .then(data => console.log(data))
        //     .catch(error => console.error('Error:', error));
        });
    });
</script> --}}
