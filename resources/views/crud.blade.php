<x-app-layout>
<style>
    .description-container {
        max-height: 50px; /* Adjust the height as needed */
        overflow-y: auto;
        width: 150px; /* Optional: set a width if you want to control the size */
        white-space: normal;
    }
</style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <!-- Books Management -->
                <div class="mb-8">
                    <h4 class="text-md font-semibold mb-2">Manage Books</h4>
                    <!-- Button to Open Add Book Form -->
<div class="mb-4">
    <button id="open-add-book-form" class="bg-green-500 text-white py-2 px-4 rounded">Add New Book</button>
</div>

<!-- Add Book Form (Initially Hidden) -->
<div id="add-book-form" class="hidden mb-8">
    <h4 class="text-md font-semibold mb-2">Add New Book</h4>
    <form method="POST" action="{{ route('books.storeAdmin') }}">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
            <input type="text" id="author" name="author" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" class="mt-1 block w-full"></textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" id="price" name="price" step="0.01" class="mt-1 block w-full" max="99999" required>
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="number" id="stock" name="stock" class="mt-1 block w-full" max="99999999999" required>
        </div>
        <div class="mb-4">
            <label for="trending" class="inline-flex items-center">
                <!-- <input type="hidden" name="trending" value="0"> -->
                <input type="checkbox" id="trending" name="trending" class="form-checkbox" value="0">
                <span class="ml-2">Trending</span>
            </label>
        </div>
        <div class="mb-4">
            <label for="classic" class="inline-flex items-center">
                <!-- <input type="hidden" name="classic" value="0"> -->
                <input type="checkbox" id="classic" name="classic" class="form-checkbox" value="0">
                <span class="ml-2">Classic</span>
            </label>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Add Book</button>
    </form>
</div>

                    <!-- Display Books -->
                    <table class="min-w-full divide-y divide-gray-200 mb-6">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trending</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classic</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($books as $book)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $book->title }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $book->author }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                <div class="description-container">
                                {{ $book->description }}
                                </div>
                            </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $book->price }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $book->stock }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $book->trending ? 'Yes' : 'No' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $book->classic ? 'Yes' : 'No' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <!-- Edit Button -->
                                    <button class="bg-blue-500 text-white py-1 px-3 rounded" onclick="toggleEditForm({{ $book->id }})">Edit</button>
                                     <!-- Delete Button -->
                                <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display:inline;" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded">Delete</button>
                                </form>
                                </td>
                            </tr>
                            <tr id="edit-form-{{ $book->id }}" style="display:none;">
                                <td colspan="8">
                                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $book->id }}">
                                        <div class="mb-4">
                                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                            <input type="text" id="title" name="title" value="{{ $book->title }}" class="mt-1 block w-full">
                                        </div>
                                        <div class="mb-4">
                                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                                            <input type="text" id="author" name="author" value="{{ $book->author }}" class="mt-1 block w-full">
                                        </div>
                                        <div class="mb-4">
                                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                            <textarea id="description" name="description" class="mt-1 block w-full">{{ $book->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                            <input type="number" id="price" name="price" value="{{ $book->price }}" step="0.01" class="mt-1 block w-full">
                                        </div>
                                        <div class="mb-4">
                                            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                                            <input type="number" id="stock" name="stock" value="{{ $book->stock }}" class="mt-1 block w-full">
                                        </div>
                                        <div class="mb-4">
                                            <label for="trending" class="inline-flex items-center">
                                                <input type="hidden" name="trending" value="0"> <!-- Always sends a value -->
                                                <input type="checkbox" id="trending" name="trending" value="1" {{ $book->trending ? 'checked' : '' }} class="form-checkbox">
                                                <span class="ml-2">Trending</span>
                                            </label>
                                        </div>

                                        <div class="mb-4">
                                            <label for="classic" class="inline-flex items-center">
                                                <input type="hidden" name="classic" value="0"> <!-- Always sends a value -->
                                                <input type="checkbox" id="classic" name="classic" value="1" {{ $book->classic ? 'checked' : '' }} class="form-checkbox">
                                                <span class="ml-2">Classic</span>
                                            </label>
                                        </div>
                                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Book</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Users Management -->
                <div>
                    <h4 class="text-md font-semibold mb-2">Manage Users</h4>
                    <!-- Button to Open Add User Form -->
<div class="mb-4">
    <button id="open-add-user-form" class="bg-green-500 text-white py-2 px-4 rounded">Add New User</button>
</div>

<!-- Add User Form (Initially Hidden) -->
<div id="add-user-form" class="hidden mb-8">
    <h4 class="text-md font-semibold mb-2">Add New User</h4>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <input type="text" id="role" name="role" class="mt-1 block w-full" required>
        </div>

        <p>Defualt Password: password</p>
        
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Add User</button>
    </form>
</div>

                    <!-- Display Users -->
                    <table class="min-w-full divide-y divide-gray-200 mb-6">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $user->role }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <!-- Edit Button -->
                                    <button class="bg-blue-500 text-white py-1 px-3 rounded" onclick="toggleEditUserForm({{ $user->id }})">Edit</button>
                                
                                 <!-- Delete Button -->
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline;" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded">Delete</button>
                                </form>
                                </td>
                            </tr>
                            <tr id="edit-user-form-{{ $user->id }}" style="display:none;">
                                <td colspan="4">
                                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="mb-4">
                                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="mt-1 block w-full">
                                        </div>
                                        <div class="mb-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="mt-1 block w-full">
                                        </div>
                                        <div class="mb-4">
                                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                            <input type="text" id="role" name="role" value="{{ $user->role }}" class="mt-1 block w-full">
                                        </div>
                                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update User</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleEditForm(id) {
            const form = document.getElementById(`edit-form-${id}`);
            form.style.display = form.style.display === 'none' ? 'table-row' : 'none';
        }

        function toggleEditUserForm(id) {
            const form = document.getElementById(`edit-user-form-${id}`);
            form.style.display = form.style.display === 'none' ? 'table-row' : 'none';
        }

        function confirmDelete() {
        return confirm('Are you sure you want to delete this item? This action cannot be undone.');
    }
    document.addEventListener('DOMContentLoaded', (event) => {
        // Get the buttons and forms
        const addBookButton = document.getElementById('open-add-book-form');
        const addBookForm = document.getElementById('add-book-form');
        
        const addUserButton = document.getElementById('open-add-user-form');
        const addUserForm = document.getElementById('add-user-form');
        
        // Toggle form visibility
        addBookButton.addEventListener('click', () => {
            if (addBookForm.classList.contains('hidden')) {
                addBookForm.classList.remove('hidden');
            } else {
                addBookForm.classList.add('hidden');
            }
        });

        addUserButton.addEventListener('click', () => {
            if (addUserForm.classList.contains('hidden')) {
                addUserForm.classList.remove('hidden');
            } else {
                addUserForm.classList.add('hidden');
            }
        });
    });
    </script>
</x-app-layout>
