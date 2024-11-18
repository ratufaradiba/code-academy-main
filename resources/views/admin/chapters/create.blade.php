@extends('layouts.admin')

@section('title', 'Add New Chapter')

@section('admin-content')
    <div class="container px-4 py-10 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Add New Chapter for "{{ $course->title }}"</h1>

        {{-- Success/Error Messages --}}
        @if ($errors->any())
            <div class="p-4 mb-6 text-red-800 bg-red-100 rounded">
                <ul class="pl-6 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form for Adding Chapter --}}
        <form action="{{ route('admin.courses.chapters.store', $course) }}" method="POST"
            class="p-6 bg-white rounded-lg shadow-md">
            @csrf

            {{-- Chapter Title --}}
            <div class="mb-4">
                <label for="title" class="block mb-2 font-medium text-gray-700">Chapter Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Masukkan judul chapter.." required>
            </div>


            {{-- Video URL --}}
            <div class="mb-4">
                <label for="video_url" class="block mb-2 font-medium text-gray-700">Video URL</label>
                <input type="url" name="video_url" id="video_url" value="{{ old('video_url') }}"
                    class="w-full p-2 border border-gray-300 rounded-lg"
                    placeholder="Masukkan url video embed youtube chapter.." required>
            </div>

            {{-- Submit and Cancel Buttons --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600">
                    Add Chapter
                </button>
                <a href="{{ route('admin.courses.edit', $course) }}"
                    class="ml-4 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
