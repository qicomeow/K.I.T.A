<style>
    .item-detail-page {
        max-width: 1000px;
        margin: 40px auto;
        padding: 20px;
        color: #24352b;
    }

    .back-link {
        display: inline-block;
        margin-bottom: 24px;
        color: #287747;
        text-decoration: none;
        font-weight: 600;
    }

    .detail-card {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 32px;
        padding: 28px;
        background: #ffffff;
        border: 1px solid #e5ece6;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .detail-image {
        width: 100%;
        height: 360px;
        object-fit: cover;
        border-radius: 14px;
        background: #f0f5f0;
    }

    .detail-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 360px;
        border-radius: 14px;
        background: #edf5ed;
        font-size: 70px;
    }

    .detail-type {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        background: #e5f5e9;
        color: #287747;
        font-size: 13px;
        font-weight: 700;
    }

    .detail-title {
        margin: 18px 0 12px;
        font-size: 30px;
        line-height: 1.3;
    }

    .detail-price {
        margin: 16px 0;
        color: #287747;
        font-size: 25px;
        font-weight: 700;
    }

    .detail-info {
        margin-top: 22px;
        padding-top: 18px;
        border-top: 1px solid #e5ece6;
    }

    .detail-info p {
        margin: 12px 0;
        line-height: 1.6;
    }

    .detail-label {
        color: #718075;
        font-size: 13px;
    }

    .detail-value {
        font-weight: 600;
    }

    .detail-description {
        margin-top: 24px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    .detail-button {
        display: inline-block;
        margin-top: 24px;
        padding: 12px 20px;
        border-radius: 10px;
        background: #287747;
        color: #ffffff;
        text-decoration: none;
        font-weight: 600;
    }

    .detail-button:hover {
        background: #1e6038;
        color: #ffffff;
    }

    .borrow-booking-form {
        margin-top: 28px;
        padding: 22px;
        background: #f7fbf7;
        border: 1px solid #e5ece6;
        border-radius: 14px;
    }

    .borrow-booking-form h3 {
        margin: 0 0 16px;
        color: #24352b;
        font-size: 20px;
    }

    .borrow-form-group {
        margin-bottom: 16px;
    }

    .borrow-form-group label {
        display: block;
        margin-bottom: 7px;
        color: #24352b;
        font-size: 14px;
        font-weight: 600;
    }

    .borrow-form-group input,
    .borrow-form-group textarea {
        box-sizing: border-box;
        width: 100%;
        padding: 11px 12px;
        border: 1px solid #d5e3d8;
        border-radius: 9px;
        background: #ffffff;
        color: #24352b;
        font: inherit;
    }

    .borrow-form-group textarea {
        min-height: 90px;
        resize: vertical;
    }

    .borrow-submit-button {
        width: 100%;
        padding: 13px 18px;
        border: none;
        border-radius: 10px;
        background: #287747;
        color: #ffffff;
        font: inherit;
        font-weight: 600;
        cursor: pointer;
    }

    .borrow-submit-button:hover {
        background: #1e6038;
    }

    .borrow-alert {
        margin-top: 18px;
        padding: 12px 14px;
        border-radius: 9px;
        font-size: 14px;
    }

    .borrow-alert-success {
        background: #e5f5e9;
        color: #23663c;
    }

    .borrow-alert-error {
        background: #fff0ee;
        color: #a12b23;
    }

    @media (max-width: 700px) {
        .detail-card {
            grid-template-columns: 1fr;
            padding: 18px;
            gap: 22px;
        }

        .detail-image,
        .detail-placeholder {
            height: 260px;
        }

        .detail-title {
            font-size: 25px;
        }
    }
</style>

<div class="item-detail-page">
    <a
        href="{{ request('from') === 'my-items'
            ? route('community.my-items')
            : route('community.index') }}"
        class="back-link">
        ← {{ request('from') === 'my-items'
            ? 'Back to My Items'
            : 'Back to Community Items' }}
    </a>

    <div class="detail-card">
        <div>
            @if ($item->image_path)
                <img
                    src="{{ asset('storage/' . $item->image_path) }}"
                    alt="{{ $item->name }}"
                    class="detail-image"
                >
            @else
                <div class="detail-placeholder">🌿</div>
            @endif
        </div>

        <div>
            @php
                $typeLabels = [
                    'give_away' => 'Give Away',
                    'borrow' => 'Borrow',
                    'sell' => 'For Sale',
                ];
            @endphp

            <span class="detail-type">
                {{ $typeLabels[$item->type] ?? ucfirst($item->type) }}
            </span>

            <h1 class="detail-title">{{ $item->name }}</h1>

            @if ($item->type === 'sell' && $item->price !== null)
                <p class="detail-price">
                    RM {{ number_format((float) $item->price, 2) }}
                </p>
            @endif

            <div class="detail-info">
                <p>
                    <span class="detail-label">Category</span><br>
                    <span class="detail-value">{{ $item->category }}</span>
                </p>

                <p>
                    <span class="detail-label">Location</span><br>
                    <span class="detail-value">{{ $item->location }}</span>
                </p>

                <p>
                    <span class="detail-label">Shared by</span><br>
                    <span class="detail-value">
                        {{ $item->user->name ?? 'Community Member' }}
                    </span>
                </p>

                <p>
                    <span class="detail-label">Status</span><br>
                    <span class="detail-value">
                        {{ ucfirst($item->status) }}
                    </span>
                </p>
            </div>

            <div class="detail-description">
                <h3>About this item</h3>
                <p>{{ $item->description ?: 'No description provided.' }}</p>
            </div>

            
            @if ($item->type === 'borrow')

                @if (session('success'))
                    <div class="borrow-alert borrow-alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="borrow-alert borrow-alert-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if ($item->status === 'available')

                    @auth
                        @if (auth()->id() !== $item->user_id)

                            <form
                                action="{{ route('borrow.store', $item->id) }}"
                                method="POST"
                                class="borrow-booking-form"
                            >
                                @csrf

                                <h3>Request to Borrow</h3>

                                <div class="borrow-form-group">
                                    <label for="start_date">
                                        Start Date
                                    </label>

                                    <input
                                        type="date"
                                        id="start_date"
                                        name="start_date"
                                        min="{{ now()->toDateString() }}"
                                        value="{{ old('start_date') }}"
                                        required
                                    >
                                </div>

                                <div class="borrow-form-group">
                                    <label for="end_date">
                                        Return Date
                                    </label>

                                    <input
                                        type="date"
                                        id="end_date"
                                        name="end_date"
                                        min="{{ now()->toDateString() }}"
                                        value="{{ old('end_date') }}"
                                        required
                                    >
                                </div>

                                <div class="borrow-form-group">
                                    <label for="message">
                                        Message to Owner (Optional)
                                    </label>

                                    <textarea
                                        id="message"
                                        name="message"
                                        maxlength="1000"
                                        placeholder="Write a message to the owner..."
                                    >{{ old('message') }}</textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="borrow-submit-button"
                                >
                                    Send Booking Request
                                </button>
                            </form>

                        @endif
                    @else
                        <div class="borrow-booking-form">
                            <h3>Want to borrow this item?</h3>

                            <p>Please login to send a booking request.</p>

                            <a href="{{ route('login') }}" class="detail-button">
                                Login to Borrow
                            </a>
                        </div>
                    @endauth

                    @else
                        <div class="borrow-alert borrow-alert-error">
                            This item is currently unavailable for borrowing.
                        </div>
                    @endif

            @endif

            <a
                href="{{ request('from') === 'my-items'
                    ? route('community.my-items')
                    : route('community.index') }}"
                class="detail-button">
                {{ request('from') === 'my-items'
                    ? 'Back to My Items'
                    : 'Back to All Items' }}
            </a>
        </div>
    </div>
</div>