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
        <title>All SubSubCategory</title>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
            <h3 class=" text-primary mb-4 text-center" style='font-weight:bold; font-size:20px;'>ALL PRODUCT LIST</h3>
            <table id="subsubcategoryTable" class="table table-bordered rounded table-sm">
                <thead>
                    <tr>
                        <th class="bg-dark bg-gradient text-white">ID</th>
                        <th class="bg-dark bg-gradient text-white">CATEGORY_NAME</th>
                        <th class="bg-dark bg-gradient text-white">SUB_CATEGORY_NAME</th>
                        {{-- <th class="bg-dark bg-gradient text-white">SUB_SUB_CATEGORY_NAME</th> --}}
                        {{-- <th class="bg-dark bg-gradient text-white">BRAND</th> --}}
                        <th class="bg-dark bg-gradient text-white">NAME</th>
                        <th class="bg-dark bg-gradient text-white">IMAGE</th>
                        <th class="bg-dark bg-gradient text-white">SALE_PRICE</th>
                        <th class="bg-dark bg-gradient text-white">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                        <tr style="border: 0.1px solid #d6d2d2;">
                            <td style="border: 0.1px solid #d6d2d2;">{{ ++$sl }}</td>
                            <td style="border: 0.1px solid #d6d2d2;">{{ $product->category->name }}</td>

                            <td style="border: 0.1px solid #d6d2d2;">{{ $product->subcategory->name ?? '' }}</td>
                            {{-- <td style="border: 0.1px solid #d6d2d2; border: 0.1px solid #d6d2d2;max-width: 40px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; ">{{ $product->subsubcategory->name ?? '' }}</td> --}}
                            {{-- <td style="border: 0.1px solid #d6d2d2;">{{ $product->brand->name ?? ''}}</td> --}}

                            <td style="border: 0.1px solid #d6d2d2;">{{ $product->name }}</td>
                            <td style="border: 0.1px solid #d6d2d2;">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                    style="width: 60px; height: 60px;">
                            </td>
                            <td style="border: 0.1px solid #d6d2d2;max-width: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $product->sale_price }}</td>
                            {{-- <td style="border: 0.1px solid #d6d2d2;">{{ $product->meta_title }}</td> --}}

                            <td style="border: 0.1px solid #d6d2d2;">
                                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a data-modal-target="crud-modal-2_{{ $product->id }}"
                                        data-modal-toggle="crud-modal-2_{{ $product->id }}"
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
                {{ $products->links('pagination::bootstrap-4') }}
            </div>

            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add subsubcategory
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
                        Create New Product
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
                <form class="p-4 md:p-5" action="{{ route('product.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">

                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category_Name</label>
                            <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="" selected>Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="sub_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub_Category_Name</label>
                            <select id="sub_category_id" name="sub_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected>Select Sub_Category</option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" data-category="{{ $subcategory->category_id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="sub_sub_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub_Sub_Category_Name</label>
                            <select id="sub_sub_category_id" name="sub_sub_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected>Select Sub_Sub_Category</option>
                                @foreach ($subsubcategories as $subsubcategory)
                                <option value="{{ $subsubcategory->id }}" data-subcategory="{{ $subsubcategory->sub_category_id }}">{{ $subsubcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="col-span-2 sm:col-span-1">
                            <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand_Name</label>
                            <select id="brand_id" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                <option value="" selected="">Select Brand</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id }}">{{$brand->name }}</option>
                            @endforeach
                            </select>
                            @if ($errors->has("brand_id"))
                            <p class="text-danger">{{ $errors->first("brand_id") }}</p>
                        @endif
                        </div>
                        <div class="col-span-1">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type product name" required="">
                                @if ($errors->has("name"))
                                <p class="text-danger">{{ $errors->first("name") }}</p>
                            @endif
                        </div>
                        <div class="col-span-1">
                            <label for="sale_price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sale_Price</label>
                            <input type="number" name="sale_price" id="sale_price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type sale_price" >
                                @if ($errors->has("sale_price"))
                                <p class="text-danger">{{ $errors->first("sale_price") }}</p>
                            @endif
                        </div>

                        <div class="col-span-1">
                            <label for="is_best_seller" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Best Seller</label>
                            <select name="is_best_seller" id="is_best_seller"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="0" {{ old('is_best_seller') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('is_best_seller') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                            @if ($errors->has("is_best_seller"))
                            <p class="text-danger">{{ $errors->first("is_best_seller") }}</p>
                            @endif
                        </div>

                        <div class="col-span-1">
                            <label for="sale_end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sale End Date</label>
                            <input type="date" name="sale_end_date" id="sale_end_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Select sale end date">
                            @if ($errors->has("sale_end_date"))
                            <p class="text-danger">{{ $errors->first("sale_end_date") }}</p>
                            @endif
                        </div>


                        <div class="col-span-1">
                            <label for="regular_price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Regular_Price</label>
                            <input type="number" name="regular_price" id="regular_price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type regular_price" >
                                @if ($errors->has("regular_price"))
                                <p class="text-danger">{{ $errors->first("regular_price") }}</p>
                            @endif
                        </div>
                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="summernote" rows="4" name="description"
                                class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write description"></textarea>
                            @if ($errors->has("description"))
                                <p class="text-danger">{{ $errors->first("description") }}</p>
                            @endif
                        </div>
                        <div class="col-span-1">
                            <label for="discount"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                            <input type="text" name="discount" id="discount"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type product discount" >
                                @if ($errors->has("discount"))
                                <p class="text-danger">{{ $errors->first("discount") }}</p>
                            @endif
                        </div>
                        <div class="col-span-1">
                            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
                            <input type="number" name="rating" id="rating" step="0.1" min="1" max="5"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $product->rating ?? '' }}" placeholder="Type rating">
                                @if ($errors->has("rating"))
                                <p class="text-danger">{{ $errors->first("rating") }}</p>
                            @endif
                        </div>
                        <div class="col-span-2">
                            <label for="topbar_description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topbar_Description</label>
                            <textarea id="summernote" rows="4" name="topbar_description"
                                class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write topbar_description"></textarea>
                                @if ($errors->has("topbar_description"))
                                <p class="text-danger">{{ $errors->first("topbar_description") }}</p>
                            @endif
                        </div>
                        <div class="col-span-2">
                            <label for="bottom_description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bottom_Description</label>
                            <textarea id="summernote" rows="4" name="bottom_description"
                                class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write bottom_description"></textarea>
                                @if ($errors->has("bottom_description"))
                                <p class="text-danger">{{ $errors->first("bottom_description") }}</p>
                            @endif
                        </div>

                        <div class="col-span-2">
                            <label for="image"
                                class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
                            <input type="file" id="image" name="image"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="image" >
                                @if ($errors->has("image"))
                                <p class="text-danger">{{ $errors->first("image") }}</p>
                            @endif
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
                        Add New Product
                    </button>
                </form>
            </div>
        </div>
    </div>


    {{-- Modal 2 --}}

    @foreach ($products as $product)
        <div id="crud-modal-2_{{ $product->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full" style="max-width: 35rem;">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit New SubSubCategory
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal-2_{{ $product->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category_Name</label>
                                <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" selected="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sub_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub_Category_Name</label>
                                <select id="sub_category_id" name="sub_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                    <option value="" selected="">Select Sub_Category</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->sub_category_id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="sub_sub_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub_Sub_Category_Name</label>
                                <select id="sub_sub_category_id" name="sub_sub_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" selected="">Select Sub_Sub_Category</option>
                                    @foreach ($subsubcategories as $subsubcategory)
                                    <option value="{{ $subsubcategory->id }}" {{ $subsubcategory->id == $product->sub_sub_category_id ? 'selected' : '' }}>{{ $subsubcategory->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand_Name</label>
                                <select id="brand_id" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" selected="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                        {{$brand->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $product->name }}"
                                    placeholder="Type product name" required="">
                            </div>

                            <div class="col-span-1">
                                <label for="sale_price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SALE_PRICE</label>
                                <input type="number" name="sale_price" id="sale_price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $product->sale_price }}"
                                    placeholder="Type sale_price" >
                            </div>

                            <div class="col-span-1">
                                <label for="regular_price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Regular_Price</label>
                                <input type="number" name="regular_price" id="regular_price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type regular_price" value="{{ $product->regular_price }}">
                                    @if ($errors->has("regular_price"))
                                    <p class="text-danger">{{ $errors->first("regular_price") }}</p>
                                @endif
                            </div>

                            <div class="col-span-1">
                                <label for="is_best_seller" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Best Seller</label>
                                <select name="is_best_seller" id="is_best_seller"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="0" {{ old('is_best_seller', $product->is_best_seller) == '0' ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ old('is_best_seller', $product->is_best_seller) == '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                                @if ($errors->has("is_best_seller"))
                                <p class="text-danger">{{ $errors->first("is_best_seller") }}</p>
                                @endif
                            </div>


                            <div class="col-span-1">
                                <label for="sale_end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sale End Date</label>
                                <input type="date" name="sale_end_date" id="sale_end_date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Select sale end date" value="{{ old('sale_end_date', $product->sale_end_date) }}">
                                @if ($errors->has("sale_end_date"))
                                <p class="text-danger">{{ $errors->first("sale_end_date") }}</p>
                                @endif
                            </div>




                            <div class="col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="summernote" rows="4" name="description"
                                    class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write description"> {{ $product->description }}</textarea>
                            </div>
                            <div class="col-span-1">
                                <label for="discount"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                                <input type="text" name="discount" id="discount" value="{{$product->discount}}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product discount" >
                                    @if ($errors->has("discount"))
                                    <p class="text-danger">{{ $errors->first("discount") }}</p>
                                @endif
                            </div>
                            <div class="col-span-1">
                                <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
                                <input type="number" name="rating" id="rating" step="0.1" min="1" max="5"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ old('rating', $product->rating ?? '') }}" placeholder="Type rating"
                                    >
                            </div>
                            <div class="col-span-2">
                                <label for="topbar_description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topbar_Description</label>
                                <textarea id="summernote" rows="4" name="topbar_description"
                                    class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write topbar_description">{{ $product->topbar_description }}</textarea>
                            </div>
                            <div class="col-span-2">
                                <label for="bottom_description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bottom_Description</label>
                                <textarea id="summernote" rows="4" name="bottom_description"
                                    class="summernote block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write bottom_description">{{ $product->bottom_description }}</textarea>
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
                                        src="{{ asset($product->image) }}" alt="{{ $product->name }}">
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
                            Edit New Product
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
            $('#subsubcategoryTable').DataTable({
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


<script>
   document.addEventListener('DOMContentLoaded', function() {
    function filterSubCategories() {
        const selectedCategory = document.getElementById('category').value;
        const subCategorySelect = document.getElementById('sub_category_id');
        const subCategoryOptions = subCategorySelect.querySelectorAll('option');

        subCategoryOptions.forEach(option => {
            if (option.value === "" || option.dataset.category == selectedCategory) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        });

        subCategorySelect.value = '';
        filterSubSubCategories();
    }

    function filterSubSubCategories() {
        const selectedSubCategory = document.getElementById('sub_category_id').value;
        const subSubCategorySelect = document.getElementById('sub_sub_category_id');
        const subSubCategoryOptions = subSubCategorySelect.querySelectorAll('option');

        subSubCategoryOptions.forEach(option => {
            if (option.value === "" || option.dataset.subcategory == selectedSubCategory) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        });

        subSubCategorySelect.value = '';
    }

    document.getElementById('category').addEventListener('change', filterSubCategories);
    document.getElementById('sub_category_id').addEventListener('change', filterSubSubCategories);

    // Initialize the dropdowns
    filterSubCategories();
});

    </script>

@endsection
