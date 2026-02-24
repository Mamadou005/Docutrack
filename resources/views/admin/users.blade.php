<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-indigo-900">Gestion des Utilisateurs</h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm border border-gray-100 sm:rounded-[2.5rem] overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50/50">
                    <tr>
                        <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase">Nom</th>
                        <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase">Email</th>
                        <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase text-center">Rôle Actuel</th>
                        <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                    @foreach($users as $user)
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="px-6 py-5 font-bold text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-5 text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-5 text-center">
                                <span class="px-3 py-1 text-xs font-black uppercase rounded-full {{ $user->isAdmin() ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                    {{ $user->role }}
                                </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <form action="{{ route('admin.users.updateRole', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-xs font-black rounded-xl hover:bg-indigo-700 transition shadow-md">
                                    Changer en {{ $user->isAdmin() ? 'Utilisateur' : 'Admin' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
