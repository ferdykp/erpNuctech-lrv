@extends('layout.master')

@section('content')
    <div class="max-w-6xl p-6 m-5 mx-auto bg-white shadow-lg rounded-xl">

        {{-- TITLE --}}
        <h1 class="mb-6 text-3xl font-semibold text-gray-800">Dashboard</h1>

        {{-- FILTER BAR --}}
        <form id="filterForm" onkeydown="return event.key !== 'Enter';">
            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-4">

                {{-- Search --}}
                <div class="flex flex-col">
                    <label class="mb-1 text-sm text-gray-600">Search</label>
                    <input type="text" id="searchInput" name="search" placeholder="Search Here ..."
                        value="{{ request('search') }}" autocomplete="off"
                        class="px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200" />
                </div>

                {{-- Sort --}}
                <div class="flex flex-col">
                    <label class="mb-1 text-sm text-gray-600">Sort</label>
                    <select name="sort" class="px-3 py-2 border rounded-lg filter-input">
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Newest</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>

                {{-- Date Range --}}
                <div class="p-4 border rounded-xl bg-gray-50 md:col-span-2">
                    <h3 class="mb-3 text-sm font-semibold text-gray-700">Data Range Filter</h3>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                        <div class="flex flex-col">
                            <label class="mb-1 text-sm text-gray-600">From</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}"
                                class="px-3 py-2 border rounded-lg filter-input">
                        </div>

                        <div class="flex flex-col">
                            <label class="mb-1 text-sm text-gray-600">Until</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                class="px-3 py-2 border rounded-lg filter-input">
                        </div>

                        <div class="flex flex-col">
                            <button type="submit"
                                class="w-full py-2 my-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Submit
                            </button>
                            <button type="submit" id="refreshButton"
                                class="w-full py-2 text-black bg-gray-400 rounded-lg hover:bg-gray-300">
                                Refresh
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </form>


        {{-- TABLE --}}
        <div id="tableContainer">
            @include('weituodan.table')
        </div>

        {{-- PAGINATION --}}
        {{-- <div class="mt-6">
            <div class="p-2">
                {{ $data->links() }}
            </div>
        </div> --}}

    </div>
@endsection
