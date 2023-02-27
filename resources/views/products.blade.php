<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ url('/create_product') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name">
                  @error('name')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="price">
                    @error('price')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                  <div class="form-group">
                    <input type="text" name="category_name" class="form-control" id="exampleInputPassword1" placeholder="category_name">
                    @error('category_name')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <button type="add" class="btn btn-success">Add</button>
              </form>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Cart</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <form action="{{ url('add_to_cart') }}" method="POST">
                                    @csrf
                                    <th scope="row">{{ $key+1}}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <input type="hidden" name="name" value="{{ $product->name }}" id="">
                                    <td>
                                        <input type="number" name="qty" id="" min="1" value="1">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-outline-success">Add</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
