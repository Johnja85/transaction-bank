<x-app-layout>
    <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('My bank Account') }}
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
            <table>
                <thead>
                    <tr>
                        <th>
                            Account 
                        </th>
                        <th>
                            Description 
                        </th>
                        <th>
                            Balance 
                        </th>
                        <th>
                            Active 
                        </th>
                        <th>
                            Action 
                        </th>
                    </tr>  
                </thead>
                <tbody>  
                    @foreach ($accounts as $account)
                        <tr>
                            <td>
                                <nav>{{ $account->idaccount }}</nav>
                            </td>

                            <td>
                                <nav>{{ $account->description }}</nav>
                            </td>
                            <td>
                                <nav>{{ $account->balance }}</nav>
                            </td>
                            <td>
                                <nav>{{ $account->is_active }}</nav>
                            </td>
                            <td>
                                <a href="{{ route('account.edit', $account) }}">Edit</a>
                                {{-- <a href="{{ route('account.show', $account) }}">View</a> --}}
                                <form action="{{ route('account.destroy', $account) }}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody> 
            </table>
            {{ $accounts->links() }}
         </div>
     </div>
     {{-- <select name="account">
         <option value=""></option>
         @foreach ($accounts as $account)
             <option value="{{ $account->id }}">{{ $account->description }}</option>
         @endforeach
     </select> --}}
 </x-app-layout>