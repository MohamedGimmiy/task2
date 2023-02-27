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
                        <th scope="col"># Order Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Client products</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('Y-m-d')  }}</td>
                                <td>
                                    @foreach ($order->cart as $item)
                                        <ul>
                                            <li>Item Name: {{ $item['name'] }}</li>
                                            <li>Price: {{ $item['price'] }}</li>
                                            <li>Quantity: {{ $item['qty'] }}</li>
                                            <li>Total: {{ $item['total'] }}</li>
                                        </ul>
                                        <hr>
                                    @endforeach
                                </td>
                                <td>Total: {{ $order->getTotal() }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
