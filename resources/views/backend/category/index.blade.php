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
        <title>All Category</title>

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
        <div class="container border border-light shadow p-4 rounded">
            <h3 class=" text-primary mb-4 text-center" style='font-weight:bold; font-size:20px;'>ALL CATEGORY LIST</h3>
            <table id="categoryTable" class="table table-bordered rounded table-sm">
                <thead>
                    <tr>
                        <th class="bg-dark bg-gradient text-white">ID</th>
                        <th class="bg-dark bg-gradient text-white">NAME</th>
                        <th class="bg-dark bg-gradient text-white">IMAGE</th>
                        <th class="bg-dark bg-gradient text-white">DESCRIPTION</th>
                        <th class="bg-dark bg-gradient text-white">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr style="border: 0.1px solid #d6d2d2;">
                            <td style="border: 0.1px solid #d6d2d2;">{{ ++$sl }}</td>
                            <td style="border: 0.1px solid #d6d2d2;">{{ $category->name }}</td>

                               {{--=======================For image or SVG========================= --}}
                            <td style="border: 0.1px solid #d6d2d2;">
                                @if (strpos($category->image, '<svg') !== false)
                                    {!! $category->image !!}
                                @else
                                    <img style="width: 60px; height: 60px;" src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                                @endif

                            </td>

                              {{--========== Only for image======= --}}
                            {{-- <td style="border: 0.1px solid #d6d2d2;">
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                                    style="width: 60px; height: 60px;">
                            </td> --}}


                            <td style="border: 0.1px solid #d6d2d2;">{!! $category->description !!}</td>

                            <td style="border: 0.1px solid #d6d2d2;">
                                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a data-modal-target="crud-modal-2_{{ $category->id }}"
                                        data-modal-toggle="crud-modal-2_{{ $category->id }}"
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
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>

            {{-- <a href="" class="btn btn-success mb-3 ">Add Category</a> --}}
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add Category
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
        <div class="relative p-4 w-full max-w-md max-h-full" style="max-width: 35rem;">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New Category
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
                <form class="p-4 md:p-5" action="{{ route('category.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type product name" required="">
                        </div>

                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="summernote" rows="4" name="description"
                                class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write product description here"></textarea>
                        </div>


                    {{--=======================For image or SVG========================= --}}

                        <div class="col-span-2">
                            <label for="image" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
                            <input type="file" id="image" name="image"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="image" onchange="toggleFields('image')">
                        </div>

                        <div class="col-span-2">
                            <label for="svg_code" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Or Paste SVG Code</label>
                            <textarea id="svg_code" name="svg_code" rows="4"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Enter SVG code" onchange="toggleFields('svg_code')"></textarea>
                        </div>




                    {{--======================= Only for image========================= --}}

                        {{-- <div class="col-span-2">
                            <label for="image"
                                class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
                            <input type="file" id="image" name="image"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="image">
                        </div>

                        <div class="col-span-2" id='imagePreviewDiv' style='display:none'>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uploaded
                                Image:</label>
                            <img id="imagePreview"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                src="#" alt="Image Preview" style="display: none;width:80px;">
                        </div> --}}
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new Category
                    </button>
                </form>
            </div>
        </div>
    </div>


    {{-- Modal 2 --}}


    @foreach ($categories as $category)
        <div id="crud-modal-2_{{ $category->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full" style="max-width: 35rem;">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit New Category
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal-2_{{ $category->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" value="{{ $category->name }}" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product name" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="summernote" name="description" rows="4"
                                    class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write product description here">{{ $category->description }}</textarea>
                            </div>

                            {{-- <div class="col-span-2">
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
                                        src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                                </div>

                                <div class="col-span-2" id='imagePreviewDiv' style='display:none'>

                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uploaded
                                        Image:</label>
                                    <img id="imagePreview"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        src="#" alt="Image Preview" style="display: none;width:100px;">
                                </div>
                            </div> --}}

                            <!-- Image Upload Field -->
    <div class="col-span-2">
        <label for="image" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
        <input type="file" id="image" name="image"
            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="image" onchange="toggleFields('image')">
    </div>

    <!-- SVG Code Field -->
    <div class="col-span-2">
        <label for="svg_code" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Or Paste SVG Code</label>
        <textarea id="svg_code" name="svg_code" rows="4"
            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="Enter SVG code" onchange="toggleFields('svg_code')">{{ old('svg_code', $category->svg_code) }}</textarea>
    </div>

    <!-- Current Image Display -->
    <div class="col-span-2" id='currentImageDiv'>
        <label for="current_image" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Current Image:</label>
        @if($category->image)
            <img class="border border-1 rounded" style="width:80px;" src="{{ asset($category->image) }}" alt="{{ $category->name }}">
        @else
            <p>No image uploaded.</p>
        @endif
    </div>

    <!-- Image Preview After Upload -->
    <div class="col-span-2" id='imagePreviewDiv' style='display:none'>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uploaded Image Preview:</label>
        <img id="imagePreview"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            src="#" alt="Image Preview" style="width:100px;">
    </div>




                            {{-- <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select category</option>
                            <option value="TV">TV/Monitors</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div> --}}

                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Edit new Category
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
            $('#categoryTable').DataTable({
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
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
     <script>
      $(document).ready(function() {
          $('.summernote').summernote({
              height: 150
          });
          });
     </script>

    {{--=======================For image or SVG========================= --}}
       <!-- JavaScript for Toggling Fields and Image Preview -->
<script>
    function toggleFields(fieldType) {
        if (fieldType === 'image') {
            document.getElementById('svg_code').disabled = document.getElementById('image').files.length > 0;
        } else if (fieldType === 'svg_code') {
            document.getElementById('image').disabled = document.getElementById('svg_code').value.trim() !== '';
        }

        // Show image preview if image is selected
        if (fieldType === 'image') {
            var input = document.getElementById('image');
            var preview = document.getElementById('imagePreview');
            var previewDiv = document.getElementById('imagePreviewDiv');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    previewDiv.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
                previewDiv.style.display = 'none';
            }
        }
    }
    </script>
    {{--=======================For image or SVG End========================= --}}
@endsection
