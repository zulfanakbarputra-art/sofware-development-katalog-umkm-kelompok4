{{-- Satu kartu = satu form: product_id, size_id, quantity --}}
<form @class(['card h-100 bg-white border-0 rounded-4 overflow-hidden shadow-sm', 'sold-out' => ! $product->canBeOrdered()])
      method="POST" action="{{ route('order') }}" target="_blank" data-product-card autocomplete="off">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">

    {{-- Fieldset menonaktifkan semua tombol di dalamnya sekaligus saat produk habis --}}
    <fieldset class="d-flex flex-column flex-sm-row flex-grow-1" @disabled(! $product->canBeOrdered())>

        <div class="col-sm-5 d-flex p-2">
            <div class="position-relative flex-grow-1 bg-body-tertiary rounded-3 overflow-hidden">
                <div class="ratio ratio-16x9 d-sm-none"></div>
                @if ($product->photo)
                    <img class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
                         src="{{ asset('storage/'.$product->photo) }}" alt="{{ $product->name }}" loading="lazy">
                @else
                    <span class="position-absolute top-50 start-50 translate-middle small text-body-secondary">Foto produk</span>
                @endif
            </div>
        </div>

        <div class="col-sm-7 d-flex flex-column py-4 px-3 pe-sm-4">
            <div class="d-flex flex-column gap-2">
                <div>
                    <h3 class="fs-5 fw-bold mb-0">{{ $product->name }}</h3>
                    <small class="fw-semibold {{ $product->isAvailable() ? 'text-success' : 'text-body-secondary' }}">
                        {{ $product->statusLabel() }}
                    </small>
                </div>

                <p class="text-body-secondary mb-0">{{ $product->description }}</p>

                <div>
                    <div class="small fw-medium text-body-secondary mb-2">Ukuran</div>
                    <div class="row row-cols-2 g-2">
                        @foreach ($product->sizes as $size)
                            <div class="col">
                                <input id="size-{{ $size->id }}" class="btn-check" type="radio" name="size_id"
                                       value="{{ $size->id }}" data-price="{{ $size->formattedPrice() }}"
                                       @checked($loop->first && $product->canBeOrdered())>
                                <label class="btn btn-option btn-sm w-100 fw-semibold" for="size-{{ $size->id }}">{{ $size->size }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 border-top mt-2 pt-3">
                    <strong class="font-heading fs-5" data-price-text>{{ $product->defaultSize()?->formattedPrice() ?? '-' }}</strong>
                    <div class="d-flex align-items-center gap-1">
                        <button class="btn quantity-button d-inline-flex align-items-center justify-content-center rounded-circle"
                                type="button" data-quantity-change="-1" aria-label="Kurangi jumlah">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                            </svg>
                        </button>
                        <input class="quantity-input form-control-plaintext p-0 text-center fw-semibold"
                               type="text" name="quantity" value="1" readonly aria-label="Jumlah">
                        <button class="btn quantity-button d-inline-flex align-items-center justify-content-center rounded-circle"
                                type="button" data-quantity-change="1" aria-label="Tambah jumlah">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Tombol pesan selalu di dasar kartu --}}
            <div class="mt-auto pt-3">
                @if ($product->canBeOrdered())
                    <button class="btn btn-warning w-100 py-2 fw-semibold" type="submit">Pesan via WhatsApp</button>
                @else
                    <button class="btn btn-option btn-sm w-100 py-2 fw-semibold text-body-secondary" type="button" disabled>Produk Habis</button>
                @endif
            </div>
        </div>

    </fieldset>
</form>