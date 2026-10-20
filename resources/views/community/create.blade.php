<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Item | NeighbourLink</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #F7F6F0;
            color: #34483B;
        }

        header {
            background: #FFFFFF;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid #E6E8DF;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #52765B;
            text-decoration: none;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        nav a {
            color: #34483B;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: #719477;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .page-heading p {
            color: #687568;
            line-height: 1.6;
        }

        .form-card {
            background: #FFFFFF;
            padding: 30px;
            border-radius: 18px;
            border: 1px solid #E8E9E2;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .required {
            color: #C64B42;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #D8DDD3;
            border-radius: 8px;
            background: #FFFFFF;
            color: #34483B;
            font-family: inherit;
            font-size: 14px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #719477;
            box-shadow: 0 0 0 3px rgba(113, 148, 119, 0.15);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .help-text {
            margin-top: 7px;
            color: #7B857A;
            font-size: 12px;
            line-height: 1.5;
        }

        .error {
            color: #B42318;
            font-size: 13px;
            margin-top: 7px;
        }

        .alert {
            background: #FCE8E6;
            color: #A12622;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-primary {
            background: #52765B;
            color: #FFFFFF;
        }

        .btn-primary:hover {
            background: #3F6048;
        }

        .btn-secondary {
            background: #EDF0E9;
            color: #34483B;
        }

        .btn-secondary:hover {
            background: #E1E6DC;
        }

        [hidden] {
            display: none !important;
        }

        footer {
            background: #E6EDE2;
            padding: 25px;
            text-align: center;
            color: #637365;
            font-size: 13px;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            header {
                align-items: flex-start;
                flex-direction: column;
            }

            nav {
                gap: 12px;
            }

            .page-heading h1 {
                font-size: 27px;
            }

            .form-card {
                padding: 22px 18px;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .form-actions .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <header>
        <a href="{{ route('home') }}" class="logo">NeighbourLink</a>

        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('community.index') }}">Community</a>
            <a href="{{ route('events.mine') }}">My Events</a>
        </nav>
    </header>

    <main class="container">
        <div class="page-heading">
            <h1>Add a Community Item 🌱</h1>
            <p>
                Give away, lend or sell useful items to people in your community.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert">
                <strong>Please check the following:</strong>

                <ul style="padding-left: 20px; margin-top: 8px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('community.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-card"
        >
            @csrf

            <div class="form-group">
                <label for="name">
                    Item Name <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. Study table, Bicycle, Books"
                    maxlength="255"
                    required
                >

                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">
                    Category <span class="required">*</span>
                </label>

                <select id="category" name="category" required>
                    <option value="">Select a category</option>

                    @foreach ([
                        'Furniture',
                        'Electronics',
                        'Books & Stationery',
                        'Clothing',
                        'Kitchen Items',
                        'Sports & Outdoor',
                        'Household Items',
                        'Food',
                        'Other'
                    ] as $category)
                        <option
                            value="{{ $category }}"
                            @selected(old('category') === $category)
                        >
                            {{ $category }}
                        </option>
                    @endforeach
                </select>

                @error('category')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">
                    Sharing Type <span class="required">*</span>
                </label>

                <select id="type" name="type" required>
                    <option value="">Select type</option>

                    <option
                        value="give_away"
                        @selected(old('type') === 'give_away')
                    >
                        Give Away — Free
                    </option>

                    <option
                        value="borrow"
                        @selected(old('type') === 'borrow')
                    >
                        Borrow — Lend to neighbours
                    </option>

                    <option
                        value="sell"
                        @selected(old('type') === 'sell')
                    >
                        Sell — Sell your item
                    </option>
                </select>

                @error('type')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div
                class="form-group"
                id="price-group"
                @if (old('type') !== 'sell') hidden @endif
            >
                <label for="price">
                    Price (RM) <span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price') }}"
                    placeholder="e.g. 25.00"
                    min="0.01"
                    max="99999999.99"
                    step="0.01"
                    @if (old('type') === 'sell') required @endif
                >

                <p class="help-text">
                    Enter the selling price in Malaysian Ringgit (RM).
                </p>

                @error('price')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">
                    Location <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="location"
                    name="location"
                    value="{{ old('location') }}"
                    placeholder="e.g. Taman Sri Jaya, Batu Pahat"
                    maxlength="255"
                    required
                >

                <p class="help-text">
                    Enter a general pickup location. Avoid sharing your full
                    home address publicly.
                </p>

                @error('location')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                    maxlength="5000"
                    placeholder="Describe the item's condition and details..."
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Item Image</label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                >

                <p class="help-text">
                    Optional. JPG, JPEG, PNG or WebP. Maximum 2 MB.
                </p>

                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <a
                    href="{{ route('community.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    + Add Item
                </button>
            </div>
        </form>
    </main>

    <footer>
        NeighbourLink — Building a stronger community, one share at a time.
    </footer>

    <script>
        const typeSelect = document.getElementById('type');
        const priceGroup = document.getElementById('price-group');
        const priceInput = document.getElementById('price');

        function togglePriceField() {
            const isSelling = typeSelect.value === 'sell';

            priceGroup.hidden = !isSelling;
            priceInput.required = isSelling;

            if (!isSelling) {
                priceInput.value = '';
            }
        }

        typeSelect.addEventListener('change', togglePriceField);
        togglePriceField();
    </script>
</body>
</html>