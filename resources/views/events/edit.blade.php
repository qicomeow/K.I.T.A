<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event | NeighbourLink</title>

    <style>
        :root {
            --green: #456B52;
            --dark-green: #304B39;
            --cream: #F7F5ED;
            --white: #FFFFFF;
            --text: #29372D;
            --muted: #788278;
            --border: #E3E7DE;
            --red: #B84040;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--text);
            font-family: Arial, sans-serif;
        }

        .back-link {
            display: inline-block;
            color: var(--green);
            font-weight: 700;
            text-decoration: none;
            margin-bottom: 20px;
        }
        
        .container {
            max-width: 720px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .form-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 30px;
        }

        h1 {
            margin-top: 0;
            font-size: 28px;
        }

        .subtitle {
            color: var(--muted);
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #D7DED5;
            border-radius: 8px;
            font: inherit;
            background: white;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: 2px solid #A8C5AC;
            border-color: var(--green);
        }

        .error {
            color: #B42318;
            font-size: 13px;
            margin-top: 7px;
        }

        .error-summary {
            background: #FBE3E3;
            color: #922E2E;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 26px;
        }

        .button {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 12px 18px;
            background: var(--green);
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .button:hover {
            background: var(--dark-green);
        }

        .button-secondary {
            background: #E8EDE5;
            color: var(--dark-green);
        }

        @media (max-width: 600px) {
            .form-card {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
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
            <h1>Edit Community Event</h1>

            <p class="subtitle">
                Update your event details below. Your changes will be saved
                and displayed on the homepage.
            </p>

            @if ($errors->any())
                <div class="error-summary">
                    <strong>Please correct the following errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('events.update', $event) }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Event Title *</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $event->title) }}"
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
                        @foreach ([
                            'Religious',
                            'Wedding',
                            'Volunteering',
                            'Community',
                            'Sports',
                            'Education',
                            'Other'
                        ] as $category)
                            <option
                                value="{{ $category }}"
                                @selected(old('category', $event->category) === $category)
                            >
                                {{ $category }}
                            </option>
                        @endforeach

                        @if (!in_array($event->category, [
                            'Religious',
                            'Wedding',
                            'Volunteering',
                            'Community',
                            'Sports',
                            'Education',
                            'Other'
                        ]))
                            <option
                                value="{{ $event->category }}"
                                selected
                            >
                                {{ $event->category }}
                            </option>
                        @endif
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
                        value="{{ old('location', $event->location) }}"
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
                    >{{ old('description', $event->description) }}</textarea>
                    @error('description')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date & Time *</label>
                    <input
                        type="datetime-local"
                        id="start_date"
                        name="start_date"
                        value="{{ old('start_date', $event->start_date?->format('Y-m-d\TH:i')) }}"
                        required
                    >
                    @error('start_date')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date">End Date & Time *</label>
                    <input
                        type="datetime-local"
                        id="end_date"
                        name="end_date"
                        value="{{ old('end_date', $event->end_date?->format('Y-m-d\TH:i')) }}"
                        required
                    >
                    @error('end_date')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="actions">
                    <button type="submit" class="button">
                        Save Changes
                    </button>

                    <a
                        href="{{ route('events.mine') }}"
                        class="button button-secondary"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>