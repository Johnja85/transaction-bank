<x-app-layout>
    <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('My bank Account') }}
         </h2>
    </x-slot>
     <div class="py-12">
         <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
            <table>
                <thead>
                    <tr>
                        <th>
                            Origin Account 
                        </th>
                        <th>
                            Destination Account
                        </th>
                        <th>
                            Value Transaction 
                        </th>
                        <th>
                            Observation 
                        </th>
                        <th>
                            Action 
                        </th>
                    </tr>  
                </thead>
                <tbody>  
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>
                                <nav>{{ $transaction->account }}</nav>
                            </td>

                            <td>
                                <nav>{{ $transaction->destination_account }}</nav>
                            </td>
                            <td>
                                <nav>{{ $transaction->value }}</nav>
                            </td>
                            <td>
                                <nav>{{ $transaction->observation }}</nav>
                            </td>
                            <td>
                                <a href="{{ route('transaction.edit', $transaction) }}">Edit</a>
                                {{-- <a href="{{ route('account.show', $account) }}">View</a> --}}
                                <form action="{{ route('transaction.destroy', $transaction) }}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody> 
            </table>
            {{ $transactions->links() }}
         </div>
     </div>
     {{-- <select name="account">
         <option value=""></option>
         @foreach ($accounts as $account)
             <option value="{{ $account->id }}">{{ $account->description }}</option>
         @endforeach
     </select> --}}
 </x-app-layout>