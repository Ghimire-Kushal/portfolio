@extends('layouts.frontend')

@section('content')

<div class="bg-gray-100 py-12 px-4 min-h-screen">

    <div class="max-w-4xl mx-auto">

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8">

            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-800">
                    Add New Project
                </h1>

                <p class="text-gray-500 mt-2">
                    Create and manage your portfolio projects.
                </p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-700">
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('admin.projects.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf

                <!-- Title -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Project Title
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           required
                           placeholder="Enter project title"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300
                                  focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                                  outline-none transition duration-200">
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Description
                    </label>

                    <textarea name="description"
                              rows="5"
                              required
                              placeholder="Write project description..."
                              class="w-full px-4 py-3 rounded-lg border border-gray-300
                                     focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                                     outline-none transition duration-200 resize-none">{{ old('description') }}</textarea>
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        Project Image
                    </label>

                    <input type="file"
                           name="image"
                           required
                           accept="image/*"
                           class="block w-full text-sm text-gray-600
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0
                                  file:bg-indigo-50 file:text-indigo-700
                                  hover:file:bg-indigo-100">
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center pt-6 border-t border-gray-100">

                    <a href="{{ route('admin.projects.index') }}"
                       class="text-gray-500 hover:text-gray-700 text-sm transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-6 py-3 bg-indigo-600 text-white rounded-lg
                                   shadow-md hover:bg-indigo-700
                                   transition duration-200">
                        Save Project
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection