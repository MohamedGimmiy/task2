<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item name</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (session()->has('cart'))

                        @foreach (session()->get('cart') as $key => $value)
                            <tr>
                            <th scope="row">{{ $key}}</th>
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['qty'] }}</td>
                            <td>{{ $value['price']}}</td>
                            <td>{{ $value['total'] }}</td>
                            <td>
                                <form action="{{ url('/remove_from_cart') }}">
                                    <input type="hidden" name="id" value="{{ $key }}">
                                    <button type="submit" class="btn btn-danger btn-outline-danger">X</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>

                  </table>
                </div>
                @if (session()->has('cart'))
                    <form action="{{ url('/submitOrder') }}" method="POST">
                        @csrf
                        <button class="mt-5 btn btn-success">Submit Order</button>
                    </form>
                @endif
        </div>
    </div>
</x-app-layout>
