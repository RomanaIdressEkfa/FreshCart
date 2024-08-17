@extends('backend.master')
@section('content_page')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rGObF6jz9ATKxIep9tiCxS/Z9fNfexbBH8qO2ms2hJSg9uBoFv06C6uKfr5ccFQ8" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        {{-- for excel sheet ,pdf,bla bla --}}
        <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet" />
        {{-- for excel sheet ,pdf,bla bla end --}}
        <title>All SubCategory</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        {{-- for summernote --}}
        <!-- include libraries(jQuery, bootstrap) -->
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">



    </head>
    <style>
        .pagination {
            display: flex;
            justify-content: flex-end;
        }

        .pagination a {
            margin-left: 5px;
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .pagination a:hover {
            background-color: #f0f0f0;
        }
    </style>

    <body>
        <div class="container-fluid border border-light shadow p-4 rounded">
            <h3 class=" text-primary mb-4 text-center" style='font-weight:bold; font-size:20px;'>ALL SUBCATEGORY LIST</h3>
            <table id="subcategoryTable" class="table table-bordered rounded table-sm">
                <thead>
                    <tr>
                        <th class="bg-dark bg-gradient text-white">ID</th>
                        <th class="bg-dark bg-gradient text-white">CATEGORY_NAME</th>
                        <th class="bg-dark bg-gradient text-white">NAME</th>
                        <th class="bg-dark bg-gradient text-white">IMAGE</th>
                        <th class="bg-dark bg-gradient text-white">HEADING</th>
                        <th class="bg-dark bg-gradient text-white">TOPBAR_DESCRIPTION</th>
                        <th class="bg-dark bg-gradient text-white">BOTTOM_DESCRIPTION</th>
                        {{-- <th class="bg-dark bg-gradient text-white">META TITLE</th> --}}
                        <th class="bg-dark bg-gradient text-white">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $subcategory)
                        <tr style="border: 0.1px solid #d6d2d2;">
                            <td style="border: 0.1px solid #d6d2d2;">{{ ++$sl }}</td>
                            <td style="border: 0.1px solid #d6d2d2;">{{ $subcategory->category->name }}</td>
                            <td style="border: 0.1px solid #d6d2d2;">{{ $subcategory->name }}</td>
                            <td style="border: 0.1px solid #d6d2d2;">
                                <img src="{{ asset($subcategory->image) }}" alt="{{ $subcategory->name }}"
                                    style="width: 60px; height: 60px;">
                            </td>
                            <td style="border: 0.1px solid #d6d2d2;">{{ $subcategory->heading }}</td>
                            <td style="border: 0.1px solid #d6d2d2; max-width: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{!! $subcategory->topbar_description!!}</td>
                            <td style="border: 0.1px solid #d6d2d2; max-width: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{!! $subcategory->bottom_description !!}</td>
                            {{-- <td style="border: 0.1px solid #d6d2d2;">{{ $subcategory->meta_title }}</td> --}}

                            <td style="border: 0.1px solid #d6d2d2;">
                                <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a data-modal-target="crud-modal-2_{{ $subcategory->id }}"
                                        data-modal-toggle="crud-modal-2_{{ $subcategory->id }}"
                                        class="btn btn-primary btn-sm text-white"><i
                                            class="fa-solid fa-pen-to-square"></i>Edit</a>
                                    <button onclick="return confirm('Are you sure to delete?')"
                                        class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i>Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- //for pagination --}}
            <br>
            <div class="pagination">
                {{ $subcategories->links('pagination::bootstrap-4') }}
            </div>

            {{-- <a href="" class="btn btn-success mb-3 ">Add subcategory</a> --}}
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add SubCategory
            </button>


        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-e5STZUs8i4MKQE6P/wxBXzquZq1TsLFtrGBsH75qbyIbbV9EP5C7nyFOy2u7b3jF" crossorigin="anonymous">
        </script>
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>

    </html>


    <!-- Modal toggle -->
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full" style="max-width: 40rem;">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New subcategory
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('subcategory.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="subcategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category_Name</label>
                            <select id="subcategory" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                <option value="" selected="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type product name" required="">
                        </div>
                        <div class="col-span-1">
                            <label for="heading"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Heading</label>
                            <input type="text" name="heading" id="heading"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type heading" >
                        </div>
                        <div class="col-span-1">
                            <label for="meta_title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta_Title</label>
                            <input type="text" name="meta_title" id="meta_title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type meta_title" >
                        </div>
                        {{-- <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                          <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                      </div> --}}

                        <div class="col-span-2">
                            <label for="topbar_description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tobar_Description</label>
                            <textarea id="summernote" rows="4" name="topbar_description"
                                class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write topbar_description"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label for="bottom_description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bottom_Description</label>
                            <textarea id="summernote" rows="4" name="bottom_description"
                                class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write bottom_description"></textarea>
                        </div>

                        <div class="col-span-2">
                            <label for="image"
                                class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
                            <input type="file" id="image" name="image"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="image" >
                        </div>

                        <div class="col-span-2" id='imagePreviewDiv' style='display:none'>
                            {{-- uploaded image preview --}}

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uploaded
                                Image:</label>
                            <img id="imagePreview"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                src="#" alt="Image Preview" style="display: none;width:80px;">
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new SubCategory
                    </button>
                </form>
            </div>
        </div>
    </div>


    {{-- Modal 2 --}}


    @foreach ($subcategories as $subcategory)
        <div id="crud-modal-2_{{ $subcategory->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full" style="max-width: 35rem;">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit New subcategory
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal-2_{{ $subcategory->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('subcategory.update', $subcategory->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="subcategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category_Name</label>
                                <select id="subcategory" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                    <option value="" selected="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $subcategory->name }}"
                                    placeholder="Type product name" required="">
                            </div>
                            <div class="col-span-1">
                                <label for="heading"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Heading</label>
                                <input type="text" name="heading" id="heading"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $subcategory->heading }}"
                                    placeholder="Type heading">
                            </div>
                            <div class="col-span-1">
                                <label for="meta_title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta_Title</label>
                                <input type="text" name="meta_title" id="meta_title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $subcategory->meta_title }}"
                                    placeholder="Type meta_title" >
                            </div>

                            <div class="col-span-2">
                                <label for="topbar_description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tobar_Description</label>
                                <textarea id="summernote" rows="4" name="topbar_description"
                                    class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write topbar_description">{!! $subcategory->topbar_description !!}</textarea>
                            </div>
                            <div class="col-span-2">
                                <label for="bottom_description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bottom_Description</label>
                                <textarea id="summernote" rows="4" name="bottom_description"
                                    class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write bottom_description">{!! $subcategory->bottom_description !!}</textarea>
                            </div>


                            <div class="col-span-2">
                                <label for="image"
                                    class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Image:</label>
                                <input type="file" id="image2" name="image"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="image">
                            </div>

                            <div>
                                <div class="col-span-2" id='currentImageDiv'>
                                    <label for="image"
                                        class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Current
                                        Image:</label>
                                    <img class="border border-1 rounded" style="width:80px;"
                                        src="{{ asset($subcategory->image) }}" alt="{{ $subcategory->name }}">
                                </div>

                                <div class="col-span-2" id='imagePreviewDiv' style='display:none'>
                                    {{-- uploaded image preview --}}
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uploaded
                                        Image:</label>
                                    <img id="imagePreview"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        src="#" alt="Image Preview" style="display: none;width:100px;">
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Edit new SubCategory
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach



    <script>
        document.getElementById('image').addEventListener('change', function() {
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                    document.getElementById('imagePreviewDiv').style.display = 'block';
                    document.getElementById('currentImageDiv').style.display = 'none';
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>

    {{-- for excel sheet ,pdf,bla bla --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-e5STZUs8i4MKQE6P/wxBXzquZq1TsLFtrGBsH75qbyIbbV9EP5C7nyFOy2u7b3jF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#subcategoryTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                paging: false, // Disable pagination
                searching: true,
                ordering: true,
                info: false,
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    {{-- for excel sheet ,pdf,bla bla end --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-e5STZUs8i4MKQE6P/wxBXzquZq1TsLFtrGBsH75qbyIbbV9EP5C7nyFOy2u7b3jF" crossorigin="anonymous">
    </script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
       <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

       <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
       <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 150
            });
            });
       </script>

@endsection
