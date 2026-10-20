<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Community Event — Neighbourhood</title>

    <style>
        :root {
            --green: #47785b;
            --dark-green: #294d38;
            --sage: #e5ecdc;
            --cream: #f8f8f1;
            --text: #304537;
            --muted: #788579;
            --border: #e6e9df;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--cream);
            color: var(--text);
            line-height: 1.6;
            padding: 35px 15px;
        }

        .container {
            max-width: 720px;
            margin: auto;
        }

        .back-link {
            display: inline-block;
            color: var(--green);
            font-weight: 700;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 32px;
        }

        .brand {
            color: var(--green);
            font-size: 14px;
            font-weight: 750;
            margin-bottom: 10px;
        }

        h1 {
            color: var(--dark-green);
            font-size: 30px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 650;
            font-size: 14px;
            margin-bottom: 7px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 12px;
            font: inherit;
            color: var(--text);
            background: white;
        }

        input:focus, select:focus, textarea:focus {
            outline: 2px solid var(--sage);
            border-color: var(--green);
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        .date-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .error {
            color: #b42318;
            font-size: 12px;
            margin-top: 5px;
        }

        .error-list {
            background: #fff0ee;
            color: #b42318;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 999px;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--green);
            color: white;
        }

        .btn-primary:hover {
            background: var(--dark-green);
        }

        .btn-light {
            background: var(--sage);
            color: var(--dark-green);
        }

        @media (max-width: 520px) {
            .form-card {
                padding: 22px;
            }

            .date-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>
    <main class="container">
        <a href="{{ route('events.mine') }}" class="back-link">
            ← Back to My Event
        </a>

        <div class="form-card">
            <div class="brand">🌿 NEIGHBOURHOOD</div>

            <h1>Create Community Event</h1>

            <p class="subtitle">
                Share an activity or announcement with your neighbours.
            </p>

            @if ($errors->any())
                <div class="error-list">
                    <strong>Please check the following:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('events.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Event title *</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="e.g. Gotong-Royong Taman"
                        maxlength="255"
                        required
                    >
                    @error('title')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Category *</label>
                    <select id="category" name="category" required>
                        <option value="">Choose a category</option>
                        <option value="Community" @selected(old('category') === 'Community')>Community</option>
                        <option value="Religious" @selected(old('category') === 'Religious')>Religious / Surau</option>
                        <option value="Wedding" @selected(old('category') === 'Wedding')>Wedding / Kenduri</option>
                        <option value="Volunteering" @selected(old('category') === 'Volunteering')>Volunteering</option>
                        <option value="Other" @selected(old('category') === 'Other')>Other</option>
                    </select>
                    @error('category')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="location">Location *</label>
                    <input
                        type="text"
                        id="location"
                        name="location"
                        value="{{ old('location') }}"
                        placeholder="e.g. Dewan Komuniti"
                        maxlength="255"
                        required
                    >
                    @error('location')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Tell your neighbours about this activity..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="date-grid">
                    <div class="form-group">
                        <label for="start_date">Start date & time *</label>
                        <input
                            type="datetime-local"
                            id="start_date"
                            name="start_date"
                            value="{{ old('start_date') }}"
                            required
                        >
                        @error('start_date')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="end_date">End date & time *</label>
                        <input
                            type="datetime-local"
                            id="end_date"
                            name="end_date"
                            value="{{ old('end_date') }}"
                            required
                        >
                        @error('end_date')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">
                        Publish Event 🌱
                    </button>

                    <a href="{{ route('events.mine') }}" class="btn btn-light">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>