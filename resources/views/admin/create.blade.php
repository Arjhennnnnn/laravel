<x-layout>
    <div class="row mt-5">
        <div class="col-4 py-3 offset-4 bg-secondary rounded-2">
        <h1 class="text-white text-center mb-3">Create New Post</h1>
        <form action="/admin/store" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>
            <select class="form-select form-select-lg mb-3 mt-2" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ ucwords($category->name) }}</option>
                @endforeach
            </select>

            <x-form.submit-button>Add Post</x-form.submit-button>


        </form>
    
        
            <a href="/"><button type="button" class="btn btn-danger w-100 mt-2">Back</button></a>
     
        </div>
    </div>
</x-layout>
