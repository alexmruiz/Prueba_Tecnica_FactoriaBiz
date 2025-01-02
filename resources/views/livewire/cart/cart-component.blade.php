<div class="mt-4">
    <x-card cardTitle="Cesta de la compra">
        <!-- Herramientas del encabezado -->
        <x-slot:cardTools>
            <a href="{{ route('home') }}" class="btn btn-outline-primary float-end">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </x-slot>

        <!-- Contenido del cuerpo -->
        <div class="p-4">
            <h2 class="text-lg font-bold mb-4">Productos añadidos</h2>
            @if(empty($cartItems))
                <div class="alert alert-info" role="alert">
                    NO HAS AÑADIDO ARTÍCULOS A LA CESTA
                </div>
            @else
                <ul class="list-group mb-4">
                    @foreach ($cartItems as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">{{ $item['name'] }}</h5>
                                <small class="text-muted">Cantidad: {{ $item['quantity'] }}</small><br>
                                <small class="text-muted">Precio: ${{ number_format($item['price'], 2) }}</small>
                            </div>
                            <button 
                                wire:click="removeFromCart('{{ $item['id'] }}')" 
                                class="btn btn-sm btn-outline-danger"
                            >
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </li>
                    @endforeach
                </ul>

                <!-- Total y botón de pago -->
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="text-lg font-bold">Total: ${{ number_format($total, 2) }}</h3>
                    <button 
                        wire:click="checkout" 
                        class="btn btn-primary"
                    >
                        <i class="bi bi-credit-card"></i> Proceder al pago
                    </button>
                </div>
            @endif
        </div>

        <!-- Pie del componente -->
        <x-slot:cardFooter>
            <p class="text-muted text-center mb-0">Gracias por confiar en nosotros.</p>
        </x-slot>
    </x-card>
</div>
